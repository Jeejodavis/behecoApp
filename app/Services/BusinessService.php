<?php

namespace App\Services;

use App\Models\City;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SocialMedia;
use App\Models\Keywords;
use App\Models\BusinessKeywords;
use App\Models\UserBusiness;
use Illuminate\Http\Request;
use App\Models\BusinessReview;
use App\Models\BusinessReviewPhotos;
use App\Models\BusinessPhotos;
use App\Models\BusinessOffers;
use App\Models\BusinessQuestions;
use App\Models\BusinessSocialMedia;
use App\Models\BusinessHeadlines;
use Illuminate\Support\Facades\Storage;

use File;


class BusinessService {

	public function details($business)
	{
		$businessId = base64_decode($business);
		$detail = UserBusiness::where('id', $businessId)->active()->select('id', 'user_id', 'business_name', 'category_id', 'building', 'street', 'area', 'city_id', 'state', 'landmark', 'pincode', 'year_of_establishment', 'name_of_founder', 'office_number', 'email_id', 'website', 'timing', 'timing_value', 'about', 'profile_photo', 'cover_photo')->first();
		$similarBusiness = UserBusiness::select('id', 'business_name', 'category_id', 'city_id', 'state', 'profile_photo')->where('category_id', $detail->category_id)->where('id', '!=', $detail->id)->limit(6)->get()->map(function($similar) {
			return [
				'id' => $similar->id,
				'business_name' => $similar->business_name,
				'profile_photo' => $similar->profile_photo,
				'category' => $similar->category->category_name,
				'rating' => $similar->ratingAvg[0]->rating_avg ?? 0,
				'city' => $similar->city->city_name,
				'state' => $similar->stateData->state_name,
			];
		});
		$headlines = $detail->headlines->map(function($headline) {
			return [
				'content' => $headline->content,
				'headline_name' => $headline->headlineData->headline_name
			];
		});
		return [
			'detail' => $detail,
			'category' => $detail->category->category_name,
			'city' => $detail->city->city_name,
			'state' => $detail->stateData->state_name,
			'photos' => $detail->photos()->limit(18)->offset(0)->get(),
			'photoCount' => $detail->photos->count(),
			'offers' => $detail->offers,
			'headlines' => $headlines,
			'rating' => $detail->rating($detail->id),
			'reviews' => $this->reviews($detail->id),
			'questions' => $detail->questions()->limit(10)->offset(0)->get(),
			'questionCount' => $detail->questions->count(),
			'similarBusiness' =>$similarBusiness
		];
	}

	public function reviews($businessId, $limit = 10, $offset = 0)
	{
		$data = BusinessReview::where('business_id', $businessId)
    	->join('beheco_users', 'beheco_users.id', 'beheco_business_review.user_id')
    	->leftjoin('beheco_city', 'beheco_city.id', 'beheco_users.city_id')
    	->leftjoin('beheco_state', 'beheco_state.id', 'beheco_users.state_id')
    	->select('rating', 'remarks', 'beheco_users.id as user_id', 'first_name', 'last_name', 'profile_img', 'city_name', 'state_name')
    	->where('remarks', '<>', '')
    	->orderBy('beheco_business_review.id', 'desc')
    	->limit($limit)->offset($offset)->get();
		return $data;
	}

	public function photos($businessId, $limit = 10, $offset = 0)
	{
		return BusinessPhotos::where('business_id', $businessId)->limit($limit)->offset($offset)->get();
	}

	public function questions($businessId, $limit = 10, $offset = 0)
	{
		return BusinessQuestions::where('business_id', $businessId)
		->join('beheco_users', 'beheco_users.id', 'beheco_business_questions.user_id')
    		->select('beheco_business_questions.id as ques_id', 'question', 'answer', 'answered_by', 'first_name', 'last_name')
    		->orderBy('beheco_business_questions.id', 'desc')
    		->limit($limit)->offset($offset)->get();
	}

	public function addReview(Request $request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$rating = $request->rating_value;
		$remarks = $request->remarks;
		$image = $request->file('photo');
		$filename = '';
		if (!empty($image)) {
			// $request->validate([
   //          	'photo.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
   //      	]);
			$filename = $this->uploadReviewPhoto($businessId, $image);
		}
		$businessReview = BusinessReview::updateOrCreate(['business_id' => $businessId, 'user_id' => $userId], ['rating' => $rating, 'remarks' => $remarks, 'created_at' => date('Y-m-d H:i:s')]);
		if (!empty($filename)) {
			BusinessReviewPhotos::updateOrCreate(['review_id' => $businessReview->id], ['photo' => $filename, 'created_at' => date('Y-m-d H:i:s')]);
		}
		return true;

	}

	public function uploadReviewPhoto($businessId, $photo)
	{
		$path = public_path().'/images/business/'.$businessId.'/review_photos';
		$ext = $photo->extension();
		$filename = time().'.'.$ext;
		if (!file_exists($path)) {
		    mkdir($path, 0777, true);
		}
		$photo->move($path, $filename);
		return $filename;
	}

	public function addQuestion(Request $request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$question = $request->question;
		$businessQues = BusinessQuestions::create(['business_id' => $businessId, 'user_id' => $userId, 'question' => $question, 'created_at' => date('Y-m-d H:i:s')]);
		return true;

	}

	public function submitAnswer($request)
	{
		$userId = auth()->user()->id;
		$quesId = $request->ques_id;
		$answer = $request->answer;
		BusinessQuestions::where('id', $quesId)->update(['answered_by' => $userId, 'answer' => $answer, 'updated_at' => date('Y-m-d H:i:s')]);
		return true;
	}

	public function basicDetails()
	{
		return [
			'cities' => City::select('id', 'city_name')->get(),
			'categories' => Category::active()->select('id', 'category_name')->get(),
			'social_medias' => SocialMedia::active()->select('id', 'sm_name')->get(),
			'keywords' => Keywords::select('id', 'keyword_name')->get()
		];
	}

	public function addBusinessBasic(Request $request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$aData = [
			'user_id' => $userId,
			'business_name' => $request->businessName,
			'category_id' => $request->category,
			'subcategory_id' => $request->subcategory,
			'year_of_establishment' => $request->yearOfEstablish,
			'name_of_founder' => $request->nameOfFounder,
			'building' => $request->building,
			'street' => $request->street,
			'area' => $request->area,
			'city_id' => $request->city,
			'landmark' => $request->landmark,
			'pincode' => $request->pincode,
			'country' => $request->country,
			'state' => $request->state,
			'office_number' => implode(',', $request->officeNum),
			'tollfree_number' => implode(',', $request->tollfreeNum),
			'whatsapp_number' => implode(',', $request->whatsappNum),
			'mobile_number' => implode(',', $request->mobileNum),
			'email_id' => implode(',', $request->email),
			'website' => implode(',', $request->website)
		];
		$socialMedia = array_filter($request->sm);
		$socialMediaUrl = $request->smUrl;
		if ($businessId == 0) {
			$aData['created_by'] = $userId;
			$aData['created_at'] = date('Y-m-d H:i:s');
			$businessId = UserBusiness::create($aData)->id;
		} else {
			$aData['updated_by'] = $userId;
			$aData['updated_at'] = date('Y-m-d H:i:s');
			UserBusiness::where('id', $businessId)->update($aData);
		}
		$this->insertSocialMedia($businessId, $socialMedia, $socialMediaUrl);
		return $businessId;

	}

	public function addBusinessPhotos(Request $request)
	{
		$businessId = $request->businessId;
		$coverPhoto = $request->file('fileselect-cover');
		$profilePhoto = $request->file('fileselect');
		$photos = $request->file('fileImage');
		$photoCount = count($photos);
		$coverName = $profileName = '';
		$this->deleteBusinessPhotos($businessId);
		if (!empty($coverPhoto)) {
			$coverName = $this->uploadBusinessPhoto($businessId, $coverPhoto, 'cover', 1);
		}
		if (!empty($profilePhoto)) {
			$profileName = $this->uploadBusinessPhoto($businessId, $profilePhoto, 'profile', 2);
		}
		if ($photoCount > 0) {
			$photoFiles = [];
			for ($i = 0; $i < $photoCount; $i++) {
				$filename = $this->uploadBusinessPhoto($businessId, $photos[$i], 'photo', $i);
				$photoFiles[] = ['business_id' => $businessId, 'photo' => $filename, 'created_at' => date('Y-m-d H:i:s')];
			}
			BusinessPhotos::insert($photoFiles);
		}
		UserBusiness::where('id', $businessId)->update(['profile_photo' => $profileName, 'cover_photo' => $coverName]);
		return true;
	}

	public function uploadBusinessPhoto($businessId, $photo, $type, $inc)
	{
		if ($type == 'photo')
			$path = public_path().'/images/business/'.$businessId.'/photos';
		else 
			$path = public_path().'/images/business/'.$businessId;
		$ext = $photo->extension();
		$filename = time(). $inc .'.'.$ext;
		if (!file_exists($path)) {
		    mkdir($path, 0777, true);
		}
		$photo->move($path, $filename);
		return $filename;
	}

	public function deleteBusinessPhotos($businessId)
	{
		$profilePhotos = UserBusiness::where('id', $businessId)->select('profile_photo', 'cover_photo')->first();
		if (!empty($profilePhotos->profile_photo))
			unlink(public_path().'/images/business/'.$businessId.'/'.$profilePhotos->profile_photo);

		if (!empty($profilePhotos->cover_photo))
			unlink(public_path().'/images/business/'.$businessId.'/'.$profilePhotos->cover_photo);

		$photos = BusinessPhotos::where('business_id', $businessId)->select('photo')->get();
		if (!empty($photos)) {
			foreach ($photos as $pkey => $value) {
				unlink(public_path().'/images/business/'.$businessId.'/photos/'.$value->photo);
			}
			BusinessPhotos::where('business_id', $businessId)->delete();
		}
	}

	public function addBusinessLocation(Request $request)
	{
		$businessId = $request->business_id;
		$lattitude = $request->lattitude;
		$longitude = $request->longitude;
		if (!empty($businessId)) {
			UserBusiness::where('id', $businessId)->update(['location_lattitude' => $lattitude, 'location_longitude' => $longitude]);
		}
		return true;
	}

	public function addBusinessKeywords(Request $request)
	{
		$businessId = $request->business_id;
		$keywords = $request->keywords;
		$this->insertKeywords($businessId, $keywords);
		return true;
	}

	public function updateBusinessInfo(Request $request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$aData = [
			'business_name' => $request->businessName,
			'category_id' => $request->category,
			'subcategory_id' => $request->subcategory,
			'year_of_establishment' => $request->yearOfEstablish,
			'name_of_founder' => $request->nameOfFounder,
			'building' => $request->building,
			'street' => $request->street,
			'area' => $request->area,
			'city_id' => $request->city,
			'landmark' => $request->landmark,
			'pincode' => $request->pincode,
			'country' => $request->country,
			'state' => $request->state,
			'office_number' => implode(',', $request->officeNum),
			'tollfree_number' => implode(',', $request->tollfreeNum),
			'whatsapp_number' => implode(',', $request->whatsappNum),
			'mobile_number' => implode(',', $request->mobileNum),
			'email_id' => implode(',', $request->email),
			'website' => implode(',', $request->website),
			'location_lattitude' => $request->lattitude,
			'location_longitude' => $request->longitude,
			'updated_by' => $userId,
			'updated_at' => date('Y-m-d H:i:s')
		];
		UserBusiness::where('id', $businessId)->update($aData);

		$socialMedia = array_filter($request->sm);
		$socialMediaUrl = $request->smUrl;
		$this->insertSocialMedia($businessId, $socialMedia, $socialMediaUrl);
		
		$keywords = $request->keywords;
		$this->insertKeywords($businessId, $keywords);
		return true;

	}

	public function insertSocialMedia($businessId, $socialMedia, $socialMediaUrl)
	{
		$busSm = BusinessSocialMedia::where('business_id', $businessId)->get()->toArray();
		$sm = !empty($busSm) ? array_column($busSm, 'social_media') : [];
		$smDiff = !empty($socialMedia) ? array_diff($sm, $socialMedia) : [];
		if (!empty($smDiff)) {
			BusinessSocialMedia::whereIn('id', $smDiff)->delete();
		}
		if (!empty($socialMedia)) {
			foreach ($socialMedia as $sKey => $sm) {
				if (!empty($socialMediaUrl[$sKey]))
					BusinessSocialMedia::updateOrCreate(['business_id' => $businessId, 'social_media' => $sm], ['url' => $socialMediaUrl[$sKey]]);
			}
		}
	}

	public function insertKeywords($businessId, $keywords)
	{
		$busKey = BusinessKeywords::where('business_id', $businessId)->get()->toArray();
		$keys = !empty($busKey) ? array_column($busKey, 'keyword_id') : [];
		$keysDiff = !empty($keywords) ? array_diff($keys, $keywords) : [];
		if (!empty($keysDiff)) {
			BusinessKeywords::whereIn('id', $keysDiff)->delete();
		}
		if (!empty($keywords)) {
			$keywordData = [];
			$addKeys = array_diff($keywords, $keys);
			foreach ($addKeys as $kKey => $value) {
				$keywordData[] = ['business_id' => $businessId, 'keyword_id' =>$value];
			}
			BusinessKeywords::insert($keywordData);
		}
	}

	public function updatePageContent($request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$aData = [
			'about' => $request->about,
			'timing' => $request->timing,
			'timing_value' =>$request->timingValue
		];
		UserBusiness::where('id', $businessId)->update($aData);

		$headline = array_filter($request->headline);
		$headlineContent = $request->headlineContent;
		$this->insertHeadlines($businessId, $headline, $headlineContent);
	}

	public function insertHeadlines($businessId, $headline, $headlineContent)
	{
		$busHead = BusinessHeadlines::where('business_id', $businessId)->get()->toArray();
		$head = !empty($busHead) ? array_column($busHead, 'headline') : [];
		$headDiff = !empty($headline) ? array_diff($head, $headline) : [];
		if (!empty($headDiff)) {
			BusinessHeadlines::whereIn('id', $headDiff)->delete();
		}
		if (!empty($headline)) {
			foreach ($headline as $sKey => $hl) {
				if (!empty($headlineContent[$sKey]))
					BusinessHeadlines::updateOrInsert(['business_id' => $businessId, 'headline' => $hl], ['content' => $headlineContent[$sKey]]);
			}
		}
	}

	public function updateBusinessOffer($request)
	{
		$userId = auth()->user()->id;
		$businessId = $request->business_id;
		$image = $request->file('imgae');
		$aData = [
			'heading' => $request->offer_heading,
			'location' => $request->offer_location,
			'description' => $request->offer_description,
		];
		if (!empty($image)) {
			$imageName = $this->uploadBusinessOfferImage($businessId, $image);
			$aData['offer_image'] = $imageName;
		}
		BusinessOffers::updateOrInsert(['business_id' => $businessId], $aData);
	}

	public function uploadBusinessOfferImage($businessId, $image)
	{
		$path = public_path().'/images/business/'.$businessId.'/offer/';
		$ext = $image->extension();
		$filename = time().'.'.$ext;
		if (!file_exists($path)) {
		    mkdir($path, 0777, true);
		}
		$image->move($path, $filename);
		return $filename;
	}

	public function offers()
	{
		return [
			'cities' => City::select('id', 'city_name')->get()->map(function($city) {
				return [
					'id' => $city->id, 
					'city_name' => $city->city_name,
					'offer_count' => $city->offers->count()
				];
			}),
			'categories' => Category::active()->select('id', 'category_name')->get()
			->map(function($category) {
				return (object) [
					'id' => $category->id, 
					'category_name' => $category->category_name,
					'offer_count' => $category->offers->count()
				];
			}),
			'offers' => BusinessOffers::orderBy('id', 'desc')->with(['business' => function ($query) {
        		$query->select('id', 'business_name');
    			}])->get()
		];
	}

	public function offersList(Request $request)
	{
		$city = $request->cityfilter;
		$category = $request->categoryfilter;
		$offerList = BusinessOffers::orderBy('beheco_business_offers.id', 'desc')
			->join('beheco_user_business', 'beheco_user_business.id', 'beheco_business_offers.business_id');
		if (!empty($city)) 
			$offerList = $offerList->whereIn('beheco_user_business.city_id', explode(',', $city));
		if (!empty($category)) 
			$offerList = $offerList->where('beheco_user_business.category_id', $category);
        $offerList = $offerList->select('beheco_business_offers.*', 'beheco_user_business.business_name')->get();
        return $offerList;
	}

}