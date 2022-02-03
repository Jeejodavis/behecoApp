<?php

namespace App\Services;

use App\Models\City;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SocialMedia;
use App\Models\Keywords;
use App\Models\FreelancerKeywords;
use App\Models\UserFreelancers;
use Illuminate\Http\Request;
use App\Models\FreelancerReview;
use App\Models\FreelancerReviewPhotos;
use App\Models\FreelancerPhotos;
use App\Models\FreelancerOffers;
use App\Models\FreelancerQuestions;
use App\Models\FreelancerSocialMedia;
use App\Models\FreelancerHeadlines;
use App\Models\UserSavedItems;
use Illuminate\Support\Facades\Storage;

use File;


class FreelancerService {

	public function details($freelancer)
	{
		$freelancerId = base64_decode($freelancer);
		$detail = UserFreelancers::where('id', $freelancerId)->active()->select('id', 'user_id', 'freelancer_name', 'category_id', 'street', 'area', 'city_id', 'state', 'landmark', 'pincode', 'office_number', 'email_id', 'website', 'timing', 'timing_value', 'about', 'profile_photo', 'cover_photo')->first();
		$similarFreelancer = UserFreelancers::select('id', 'freelancer_name', 'category_id', 'city_id', 'state', 'profile_photo')->where('category_id', $detail->category_id)->where('id', '!=', $detail->id)->limit(6)->get()->map(function($similar) {
			return [
				'id' => $similar->id,
				'freelancer_name' => $similar->freelancer_name,
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
			'social_medias' => $detail->socialMedia()->with('socialMediaData')->get()->toArray(),
			'photos' => $detail->photos()->limit(18)->offset(0)->get(),
			'photoCount' => $detail->photos->count(),
			'offers' => $detail->offers,
			'headlines' => $headlines,
			'rating' => $detail->rating($detail->id),
			'reviews' => $this->reviews($detail->id),
			'questions' => $detail->questions()->limit(10)->offset(0)->get(),
			'questionCount' => $detail->questions->count(),
			'similarfreelancer' =>$similarFreelancer
		];
	}

	public function reviews($freelancerId, $limit = 10, $offset = 0)
	{
		$data = FreelancerReview::where('freelancer_id', $freelancerId)
    	->join('beheco_users', 'beheco_users.id', 'beheco_freelancer_review.user_id')
    	->leftjoin('beheco_city', 'beheco_city.id', 'beheco_users.city_id')
    	->leftjoin('beheco_state', 'beheco_state.id', 'beheco_users.state_id')
    	->select('rating', 'remarks', 'beheco_users.id as user_id', 'first_name', 'last_name', 'profile_img', 'city_name', 'state_name')
    	->where('remarks', '<>', '')
    	->orderBy('beheco_freelancer_review.id', 'desc')
    	->limit($limit)->offset($offset)->get();
		return $data;
	}

	public function photos($freelancerId, $limit = 10, $offset = 0)
	{
		return FreelancerPhotos::where('freelancer_id', $freelancerId)->limit($limit)->offset($offset)->get();
	}

	public function questions($freelancerId, $limit = 10, $offset = 0)
	{
		return FreelancerQuestions::where('freelancer_id', $freelancerId)
		->join('beheco_users', 'beheco_users.id', 'beheco_freelancer_questions.user_id')
    		->select('beheco_freelancer_questions.id as ques_id', 'question', 'answer', 'answered_by', 'first_name', 'last_name')
    		->orderBy('beheco_freelancer_questions.id', 'desc')
    		->limit($limit)->offset($offset)->get();
	}

	public function addReview(Request $request)
	{
		$userId = auth()->user()->id;
		$freelancerId = $request->freelancer_id;
		$rating = $request->rating_value;
		$remarks = $request->remarks;
		$image = $request->file('photo');
		$filename = '';
		if (!empty($image)) {
			// $request->validate([
   //          	'photo.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
   //      	]);
			$filename = $this->uploadReviewPhoto($freelancerId, $image);
		}
		$FreelancerReview = FreelancerReview::updateOrCreate(['freelancer_id' => $freelancerId, 'user_id' => $userId], ['rating' => $rating, 'remarks' => $remarks, 'created_at' => date('Y-m-d H:i:s')]);
		if (!empty($filename)) {
			FreelancerReviewPhotos::updateOrCreate(['review_id' => $FreelancerReview->id], ['photo' => $filename, 'created_at' => date('Y-m-d H:i:s')]);
		}
		return true;

	}

	public function uploadReviewPhoto($freelancerId, $photo)
	{
		$path = public_path().'/images/freelancer/'.$freelancerId.'/review_photos';
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
		$freelancerId = $request->freelancer_id;
		$question = $request->question;
		$freelancerQues = FreelancerQuestions::create(['freelancer_id' => $freelancerId, 'user_id' => $userId, 'question' => $question, 'created_at' => date('Y-m-d H:i:s')]);
		return true;

	}

	public function submitAnswer($request)
	{
		$userId = auth()->user()->id;
		$quesId = $request->ques_id;
		$answer = $request->answer;
		FreelancerQuestions::where('id', $quesId)->update(['answered_by' => $userId, 'answer' => $answer, 'updated_at' => date('Y-m-d H:i:s')]);
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

	public function addFreelancerBasic(Request $request)
	{
		$userId = auth()->user()->id;
		$freelancerId = $request->freelancer_id;
		$aData = [
			'user_id' => $userId,
			'freelancer_name' => $request->freelancerName,
			'category_id' => $request->category,
			'subcategory_id' => $request->subcategory,
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
		if ($freelancerId == 0) {
			$aData['created_by'] = $userId;
			$aData['created_at'] = date('Y-m-d H:i:s');
			$freelancerId = UserFreelancers::create($aData)->id;
		} else {
			$aData['updated_by'] = $userId;
			$aData['updated_at'] = date('Y-m-d H:i:s');
			UserFreelancers::where('id', $freelancerId)->update($aData);
		}
		$this->insertSocialMedia($freelancerId, $socialMedia, $socialMediaUrl);
		return $freelancerId;

	}

	public function addFreelancerPhotos(Request $request)
	{
		$freelancerId = $request->freelancerId;
		$photos = $request->file('fileImage');
		$photoCount = !empty($photos) ? count($photos) : 0;
		$coverName = $profileName = '';
		$this->deleteFreelancerPhotos($freelancerId);
		$coverName = $this->uploadCoverProfilePhoto($freelancerId, $request->coverImgData, 1);
		$profileName = $this->uploadCoverProfilePhoto($freelancerId, $request->profileImgData, 2);
		if ($photoCount > 0) {
			$photoFiles = [];
			for ($i = 0; $i < $photoCount; $i++) {
				$filename = $this->uploadFreelancerPhoto($freelancerId, $photos[$i], 'photo', $i);
				$photoFiles[] = ['freelancer_id' => $freelancerId, 'photo' => $filename, 'created_at' => date('Y-m-d H:i:s')];
			}
			FreelancerPhotos::insert($photoFiles);
		}
		UserFreelancers::where('id', $freelancerId)->update(['profile_photo' => $profileName, 'cover_photo' => $coverName]);
		return true;
	}

	public function uploadCoverProfilePhoto($freelancerId, $baseString, $inc)
	{
		$fileName = '';
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
            $fileName = time(). $inc .'.'.$type;
            $path = public_path().'/images/freelancer/'.$freelancerId.'/';
	        if (!file_exists($path)) {
	            mkdir($path, 0777, true);
	        }
            file_put_contents($path . $fileName, $data);
        }
        return $fileName;
	}

	public function uploadFreelancerPhoto($freelancerId, $photo, $type, $inc)
	{
		if ($type == 'photo')
			$path = public_path().'/images/freelancer/'.$freelancerId.'/photos';
		else 
			$path = public_path().'/images/freelancer/'.$freelancerId;
		$ext = $photo->extension();
		$filename = time(). $inc .'.'.$ext;
		if (!file_exists($path)) {
		    mkdir($path, 0777, true);
		}
		$photo->move($path, $filename);
		return $filename;
	}

	public function deleteFreelancerPhotos($freelancerId)
	{
		$profilePhotos = UserFreelancers::where('id', $freelancerId)->select('profile_photo', 'cover_photo')->first();
		$filePath = public_path().'/images/freelancer/'.$freelancerId.'/';
		if (!empty($profilePhotos->profile_photo) && file_exists($filePath.$profilePhotos->profile_photo))
			unlink($filePath.$profilePhotos->profile_photo);

		if (!empty($profilePhotos->cover_photo) && file_exists($filePath.$profilePhotos->cover_photo))
			unlink($filePath.$profilePhotos->cover_photo);

		$photos = FreelancerPhotos::where('freelancer_id', $freelancerId)->select('photo')->get();
		if (!empty($photos)) {
			foreach ($photos as $pkey => $value) {
				if (file_exists($filePath.'photos/'.$value->photo))
					unlink($filePath.'photos/'.$value->photo);
			}
			FreelancerPhotos::where('freelancer_id', $freelancerId)->delete();
		}
	}

	public function addFreelancerLocation(Request $request)
	{
		$freelancerId = $request->freelancer_id;
		$lattitude = $request->lattitude;
		$longitude = $request->longitude;
		if (!empty($freelancerId)) {
			UserFreelancers::where('id', $freelancerId)->update(['location_lattitude' => $lattitude, 'location_longitude' => $longitude]);
		}
		return true;
	}

	public function addFreelancerKeywords(Request $request)
	{
		$freelancerId = $request->freelancer_id;
		$keywords = $request->keywords;
		$this->insertKeywords($freelancerId, $keywords);
		return true;
	}

	public function updateFreelancerInfo(Request $request)
	{
		$userId = auth()->user()->id;
		$freelancerId = $request->freelancer_id;
		$aData = [
			'freelancer_name' => $request->freelancerName,
			'category_id' => $request->category,
			'subcategory_id' => $request->subcategory,
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
		UserFreelancers::where('id', $freelancerId)->update($aData);

		$socialMedia = array_filter($request->sm);
		$socialMediaUrl = $request->smUrl;
		$this->insertSocialMedia($freelancerId, $socialMedia, $socialMediaUrl);
		
		$keywords = $request->keywords;
		$this->insertKeywords($freelancerId, $keywords);
		return true;

	}

	public function insertSocialMedia($freelancerId, $socialMedia, $socialMediaUrl)
	{
		$busSm = FreelancerSocialMedia::where('freelancer_id', $freelancerId)->get()->toArray();
		$sm = !empty($busSm) ? array_column($busSm, 'social_media') : [];
		$smDiff = !empty($socialMedia) ? array_diff($sm, $socialMedia) : [];
		if (!empty($smDiff)) {
			FreelancerSocialMedia::whereIn('id', $smDiff)->delete();
		}
		if (!empty($socialMedia)) {
			foreach ($socialMedia as $sKey => $sm) {
				if (!empty($socialMediaUrl[$sKey]))
					FreelancerSocialMedia::updateOrCreate(['freelancer_id' => $freelancerId, 'social_media' => $sm], ['url' => $socialMediaUrl[$sKey]]);
			}
		}
	}

	public function insertKeywords($freelancerId, $keywords)
	{
		$busKey = FreelancerKeywords::where('freelancer_id', $freelancerId)->get()->toArray();
		$keys = !empty($busKey) ? array_column($busKey, 'keyword_id') : [];
		$keysDiff = !empty($keywords) ? array_diff($keys, $keywords) : [];
		if (!empty($keysDiff)) {
			FreelancerKeywords::whereIn('id', $keysDiff)->delete();
		}
		if (!empty($keywords)) {
			$keywordData = [];
			$addKeys = array_diff($keywords, $keys);
			foreach ($addKeys as $kKey => $value) {
				$keywordData[] = ['freelancer_id' => $freelancerId, 'keyword_id' =>$value];
			}
			FreelancerKeywords::insert($keywordData);
		}
	}

	public function updatePageContent($request)
	{
		$userId = auth()->user()->id;
		$freelancerId = $request->freelancer_id;
		$aData = [
			'about' => $request->about,
			'timing' => $request->timing,
			'timing_value' =>$request->timingValue
		];
		UserFreelancers::where('id', $freelancerId)->update($aData);

		$headline = array_filter($request->headline);
		$headlineContent = $request->headlineContent;
		$this->insertHeadlines($freelancerId, $headline, $headlineContent);
	}

	public function insertHeadlines($freelancerId, $headline, $headlineContent)
	{
		$busHead = FreelancerHeadlines::where('freelancer_id', $freelancerId)->get()->toArray();
		$head = !empty($busHead) ? array_column($busHead, 'headline') : [];
		$headDiff = !empty($headline) ? array_diff($head, $headline) : [];
		if (!empty($headDiff)) {
			FreelancerHeadlines::whereIn('id', $headDiff)->delete();
		}
		if (!empty($headline)) {
			foreach ($headline as $sKey => $hl) {
				if (!empty($headlineContent[$sKey]))
					FreelancerHeadlines::updateOrInsert(['freelancer_id' => $freelancerId, 'headline' => $hl], ['content' => $headlineContent[$sKey]]);
			}
		}
	}

	public function updateFreelancerOffer($request)
	{
		$userId = auth()->user()->id;
		$freelancerId = $request->freelancer_id;
		$image = $request->file('imgae');
		$aData = [
			'heading' => $request->offer_heading,
			'offer_amount' => $request->offer_amount,
			'location' => $request->offer_location,
			'description' => $request->offer_description,
		];
		if (!empty($image)) {
			$imageName = $this->uploadFreelancerOfferImage($freelancerId, $image);
			$aData['offer_image'] = $imageName;
		}
		FreelancerOffers::updateOrInsert(['freelancer_id' => $freelancerId], $aData);
	}

	public function uploadFreelancerOfferImage($freelancerId, $image)
	{
		$path = public_path().'/images/freelancer/'.$freelancerId.'/offer/';
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
			'offers' => FreelancerOffers::orderBy('id', 'desc')->with(['freelancer' => function ($query) {
        		$query->select('id', 'freelancer_name');
    			}])->get()
		];
	}

	public function offersList(Request $request)
	{
		$city = $request->cityfilter;
		$category = $request->categoryfilter;
		$offerList = FreelancerOffers::orderBy('beheco_freelancer_offers.id', 'desc')
			->join('beheco_user_freelancer', 'beheco_user_freelancer.id', 'beheco_freelancer_offers.freelancer_id');
		if (!empty($city)) 
			$offerList = $offerList->whereIn('beheco_user_freelancer.city_id', explode(',', $city));
		if (!empty($category)) 
			$offerList = $offerList->where('beheco_user_freelancer.category_id', $category);
        $offerList = $offerList->select('beheco_freelancer_offers.*', 'beheco_user_freelancer.freelancer_name')->get();
        return $offerList;
	}

	public function submitSavedItem(Request $request)
	{
		if ($request->type == 'add') {
			$aData = [
				'user_id' => auth()->user()->id,
				'freelancer_id' => $request->freelancerId,
				'created_at' => date('Y-m-d H:i:s')
			];

			UserSavedItems::updateOrCreate(['user_id' => auth()->user()->id, 'freelancer_id' => $request->freelancerId], ['created_at' => date('Y-m-d H:i:s')]);
		} else {
			UserSavedItems::where('user_id', auth()->user()->id)->where('freelancer_id', $request->freelancerId)->delete();
		}
		return true;
	}

}