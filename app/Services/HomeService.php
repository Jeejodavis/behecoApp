<?php

namespace App\Services;

use App\Models\City;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\UserBusiness;
use App\Models\UserFreelancers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class HomeService {


	public function home()
	{
		$cities = City::select('id', 'city_name')->get();
		$categories = $this->categories();
		$featuredBusiness = $this->featuredBusiness();
		$freelancers = $this->suggestedFreelancers();
		return [
			'cities' => $cities,
			'categories' => $categories,
			'featuredBusiness' => $featuredBusiness,
			'freelancers' => $freelancers
		];
	}

	public function categories()
	{
		return Category::active()->select('id', 'category_name', 'icon')->get();
	}

	public function featuredBusiness()
	{
		return UserBusiness::select('id', 'business_name', 'category_id', 'city_id', 'state', 'profile_photo')->where('is_paid', 'Y')->limit(8)->get()->map(function($featured) {
			return [
				'id' => $featured->id,
				'business_name' => $featured->business_name,
				'profile_photo' => $featured->profile_photo,
				'category' => $featured->category->category_name,
				'rating' => $featured->ratingAvg[0]->rating_avg ?? 0,
				'city' => $featured->city->city_name,
				'state' => $featured->stateData->state_name,
			];
		});
	}

	public function suggestedFreelancers()
	{
		return UserFreelancers::select('id', 'freelancer_name', 'category_id', 'city_id', 'state', 'profile_photo', 'cover_photo')->limit(8)->get()->map(function($suggested) {
			return [
				'id' => $suggested->id,
				'freelancer_name' => $suggested->freelancer_name,
				'profile_photo' => $suggested->profile_photo,
				'cover_photo' => $suggested->cover_photo,
				'category' => $suggested->category->category_name,
				'rating' => $suggested->ratingAvg[0]->rating_avg ?? 0,
				'city' => $suggested->city->city_name,
				'state' => $suggested->stateData->state_name,
			];
		});
	}

	public function subcategory(Category $category)
	{
		$subcategories = $category->subcategory;
		return $subcategories;
	}

	public function stateCountry(City $city)
	{
		$state = $city->state;
		$country = $state->country;
		return ['state' => $state, 'country' => $country];
	}

	public function searchResults(Request $request)
	{
		$city = !empty($request->city) ? base64_decode($request->city) : 0;
		$keyword = $request->keyword;
		$category = !empty($request->category) ? base64_decode($request->category) : '';
		$subcategory = !empty($request->subcategory) ? base64_decode($request->subcategory) : '';
		$cities = City::select('id', 'city_name')->withCount('userBusiness')->get();
		$categories = Category::active()->select('id', 'category_name')->withCount('userBusiness')->get();
		$subcategories = Subcategory::active()->select('id', 'subcategory_name')->withCount('userBusiness')->get();
		$business = $this->businessList($city, $keyword, '', $category, $subcategory);
		$businessCount = $this->businessCount($city, $keyword);
		$relatedSearches = [];
		if (isset($business[0])) {
			$relatedSearches = Subcategory::where('category_id', $business[0]['category_id'])->active()->select('id', 'subcategory_name')->get();
		}
		
		return [
			'selected_city' => !empty($city) ? $city : 0,
			'selected_keyword' => $keyword,
			'cities' => $cities,
			'categories' => $categories,
			'subcategories' => $subcategories,
			'businesses' => $business,
			'businessCount' => $businessCount,
			'relatedSearches' => $relatedSearches
		];
	}

	public function businessList($city, $keyword, $cityfilter = '', $categoryfilter = '', $subcategoryfilter = '', $limit = 12, $offset = 0)
	{

		if (!empty($city)) {
			$cityfilter = !empty($cityfilter) ? ($cityfilter . ',' . $city) : $city;
		}
		$businessList = UserBusiness::active()->select('beheco_user_business.id', 'business_name', 'category_id', 'city_id', 'state', 'profile_photo', DB::raw("'business' as type"));

		$freelancerList = UserFreelancers::active()->select('beheco_user_freelancers.id', 'freelancer_name as business_name', 'category_id', 'city_id', 'state', 'profile_photo', DB::raw("'freelancer' as type"));
		if (!empty($keyword)) {

			$businessList = $businessList->join('beheco_business_keywords', 'beheco_business_keywords.business_id', 'beheco_user_business.id');
			$businessList = $businessList->join('beheco_keywords', 'beheco_keywords.id', 'beheco_business_keywords.keyword_id');
			// $businessList = $businessList->where("beheco_keywords.keyword_name", 'iLIKE', '%'.strtoupper($keyword).'%');
			$businessList = $businessList->whereRaw('UPPER(`beheco_keywords`.`keyword_name`) LIKE \'%'. strtoupper($keyword).'%\'');

			$freelancerList = $freelancerList->join('beheco_freelancer_keywords', 'beheco_freelancer_keywords.freelancer_id', 'beheco_user_freelancers.id');
			$freelancerList = $freelancerList->join('beheco_keywords', 'beheco_keywords.id', 'beheco_freelancer_keywords.keyword_id');
			// $freelancerList = $freelancerList->where("beheco_keywords.keyword_name", 'iLIKE', '%'.strtoupper($keyword).'%');
			$freelancerList = $freelancerList->whereRaw('UPPER(`beheco_keywords`.`keyword_name`) LIKE \'%'. strtoupper($keyword).'%\'');
		}
		if (!empty($cityfilter) || !empty($categoryfilter) || !empty($subcategoryfilter)) {
			if (!empty($cityfilter)) {
				$businessList = $businessList->whereIn('city_id', explode(',', $cityfilter));

				$freelancerList = $freelancerList->whereIn('city_id', explode(',', $cityfilter));
			}
			if (!empty($categoryfilter)) {
				$businessList = $businessList->whereIn('category_id', explode(',', $categoryfilter));

				$freelancerList = $freelancerList->whereIn('category_id', explode(',', $categoryfilter));
			}
			if (!empty($subcategoryfilter)) {
				$businessList = $businessList->whereIn('subcategory_id', explode(',', $subcategoryfilter));

				$freelancerList = $freelancerList->whereIn('subcategory_id', explode(',', $subcategoryfilter));
			}
		}
		$businessList = $businessList->limit($limit)->offset($offset);

		$freelancerList = $freelancerList->limit($limit)->offset($offset);

		$listData = $businessList->union($freelancerList)->get()->map(function($business) {
			return [
				'id' => $business->id,
				'business_name' => $business->business_name,
				'type' => $business->type,
				'category_id' => $business->category_id,
				'category' => $business->category->category_name,
				'rating' => $business->rating($business->id),
				'city' => $business->city->city_name,
				'state' => $business->stateData->state_name,
				'profile_photo' => $business->profile_photo
			];
		});
		return $listData;
	}

	public function businessCount($city, $keyword)
	{
		$count =  UserBusiness::active();
		if (!empty($city)) {
			$count = $count->where('city_id', $city);
		}
		// if (!empty($keyword)) {
		// 	$count = $count->where('city_id', $keyword);
		// }
		$count = $count->count();
		return $count;
	}

	public function getSubcategory($category)
	{
		return Subcategory::where('category_id', $category)->active()->select('id', 'subcategory_name')->withCount('userBusiness')->get();
	}

}