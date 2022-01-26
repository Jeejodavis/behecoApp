<?php
namespace App\Services;

use App\Models\User;
use App\Models\UserBusiness;
use App\Models\UserSavedItems;
use App\Models\UserNotifications;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SocialMedia;
use App\Models\Keywords;
use App\Models\Headlines;
use App\Models\BusinessKeywords;

class UserService {


	public function profileData()
	{
		if (!empty(auth()->user()->id)) {
			$masterData = $this->masterData();
			$userData = User::active()->where('id', auth()->user()->id)->select('id', 'first_name', 'last_name', 'gender', 'dob', 'email', 'contact_no', 'profile_img', 'banner_img')->first();
			$businesses = $this->businessDetails();
			$savedItems = $this->savedItems();
			$notifications = $this->notifications();
			return ['masterData' => $masterData, 'profileInfo' => $userData, 'businesses' => $businesses, 'savedItems' => $savedItems, 'notifications' => $notifications];
		} else {
			return [];
		}
	}

	public function masterData()
	{
		return [
			'cities' => City::select('id', 'city_name')->get(),
			'categories' => Category::active()->select('id', 'category_name')->get(),
			'social_medias' => SocialMedia::active()->select('id', 'sm_name')->get(),
			'keywords' => Keywords::select('id', 'keyword_name')->get(),
			'headlines' => Headlines::active()->select('id', 'headline_name')->get()
		];
	}

	public function businessDetails()
	{
		return UserBusiness::active()->where('user_id', auth()->user()->id)->orderBy('id')->get()->map(function($business) {
			return [
				'id' =>$business->id,
				'user_id' =>$business->user_id,
				'business_name' =>$business->business_name,
				'category_id' =>$business->category_id,
				'subcategory_id' =>$business->subcategory_id,
				'year_of_establishment' =>$business->year_of_establishment,
				'name_of_founder' =>$business->name_of_founder,
				'building' =>$business->building,
				'street' =>$business->street,
				'area' =>$business->area,
				'landmark' =>$business->landmark,
				'pincode' =>$business->pincode,
				'city_id' =>$business->city_id,
				'country' =>$business->countryData,
				'state' =>$business->stateData,
				'office_number' =>$business->office_number,
				'tollfree_number' =>$business->tollfree_number,
				'whatsapp_number' =>$business->whatsapp_number,
				'mobile_number' =>$business->mobile_number,
				'email_id' =>$business->email_id,
				'website' =>$business->website,
				'location_lattitude' =>$business->location_lattitude,
				'location_longitude' =>$business->location_longitude,
				'profile_photo' =>$business->profile_photo,
				'cover_photo' =>$business->cover_photo,
				'about' =>$business->about,
				'timing' =>$business->timing,
				'timing_value' =>$business->timing_value,
				'social_media' =>$business->socialMedia,
				'keywords' => $business->keywords->toArray(),
				'headlines' => $business->headlines,
				'offers' => $business->offers,
				'subcategories' => Subcategory::active()->where('category_id', $business->category_id)->get()
			];
		});
	}

	public function savedItems()
	{
		return UserBusiness::join('beheco_user_saved_items', 'beheco_user_saved_items.business_id', 'beheco_user_business.id')
			->where('beheco_user_saved_items.user_id', auth()->user()->id)
			->where('beheco_user_business.status', 'active')
			->get()->map(function($business) {
			return [
				'id' => $business->business_id,
				'business_name' => $business->business_name,
				'category_id' => $business->category_id,
				'category' => $business->category->category_name,
				'rating' => $business->rating($business->business_id),
				'city' => $business->city->city_name,
				'state' => $business->stateData->state_name,
				'profile_photo' => $business->profile_photo
			];
			});
	}

	public function notifications()
	{
		return UserNotifications::where('user_id', auth()->user()->id)->get();
	}

	public function updateProfile(Request $request)
	{
		$aData = [
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'gender' => $request->gender,
			'dob' => $request->dob,
			'contact_no' => $request->contact_no,
		];
		User::where('id', auth()->user()->id)->update($aData);
		return true;
	}

	public function uploadUserProfilePhoto(Request $request)
	{
		$baseString = $request->imageBase;
		$userId = auth()->user()->id;
		if (preg_match('/^data:image\/(\w+);base64,/', $baseString, $type)) {

            $data = substr($baseString, strpos($baseString, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            // if (!in_array($type, [ 'jpg', 'jpeg', 'png' ])) {
            //     $responce['status'] = 'invalid';
            //     return $responce;
            // }

            $data = base64_decode($data);

            // if ($data === false) {
            //    $responce['status'] = 'fail';
            //    return $responce;
            // }
            $fileName = time().'.'.$type;
            $path = public_path().'/images/user/'.$userId.'/profile/';
	        if (!file_exists($path)) {
	            mkdir($path, 0777, true);
	        }
            if(file_put_contents($path . $fileName, $data)) {
            	user::where('id', $userId)->update(['profile_img' => $fileName]);
            	auth()->user()->profile_img = $fileName;
            }
        }
        return true;
	}

	public function uploadUserCoverPhoto(Request $request)
	{
		$baseString = $request->imageBase;
		$userId = auth()->user()->id;
		if (preg_match('/^data:image\/(\w+);base64,/', $baseString, $type)) {

            $data = substr($baseString, strpos($baseString, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            // if (!in_array($type, [ 'jpg', 'jpeg', 'png' ])) {
            //     $responce['status'] = 'invalid';
            //     return $responce;
            // }

            $data = base64_decode($data);

            // if ($data === false) {
            //    $responce['status'] = 'fail';
            //    return $responce;
            // }
            $fileName = time().'.'.$type;
            $path = public_path().'/images/user/'.$userId.'/profile/';
	        if (!file_exists($path)) {
	            mkdir($path, 0777, true);
	        }
            if(file_put_contents($path . $fileName, $data)) {
            	user::where('id', $userId)->update(['banner_img' => $fileName]);
            }
        }
        return true;
	}

}