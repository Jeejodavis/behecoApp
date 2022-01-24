<?php

namespace App\Services;

use App\Models\City;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\UserBusiness;
use Illuminate\Http\Request;


class HomeService {


	public function home()
	{
		$cities = City::select('id', 'city_name')->get();
		$categories = $this->categories();
		$featuredBusiness = $this->featuredBusiness();
		return [
			'cities' => $cities,
			'categories' => $categories,
			'featuredBusiness' => $featuredBusiness
		];
	}

	public function categories()
	{
		return Category::active()->select('id', 'category_name', 'icon')->get();
	}

	public function featuredBusiness()
	{
		return UserBusiness::select('id', 'business_name', 'category_id', 'city_id', 'state', 'profile_photo')->where('is_paid', 'Y')->get()->map(function($featured) {
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
		$list = UserBusiness::active()->select('beheco_user_business.id', 'business_name', 'category_id', 'city_id', 'state', 'profile_photo');
		if (!empty($keyword)) {
			$list = $list->join('beheco_business_keywords', 'beheco_business_keywords.business_id', 'beheco_user_business.id');
			$list = $list->join('beheco_keywords', 'beheco_keywords.id', 'beheco_business_keywords.keyword_id');
			// $list = $list->where("beheco_keywords.keyword_name", 'iLIKE', '%'.strtoupper($keyword).'%');
			$list = $list->whereRaw('UPPER(`beheco_keywords`.`keyword_name`) LIKE \'%'. strtoupper($keyword).'%\'');
		}
		if (!empty($city)) {
			$cityfilter = !empty($cityfilter) ? ($cityfilter . ',' . $city) : $city;
		}
		if (!empty($cityfilter) || !empty($categoryfilter) || !empty($subcategoryfilter)) {
			if (!empty($cityfilter)) 
				$list = $list->whereIn('city_id', explode(',', $cityfilter));
			if (!empty($categoryfilter)) 
				$list = $list->whereIn('category_id', explode(',', $categoryfilter));
			if (!empty($subcategoryfilter)) 
				$list = $list->whereIn('subcategory_id', explode(',', $subcategoryfilter));
		}
		$listData = $list->limit($limit)->offset($offset)->get()->map(function($business) {
			return [
				'id' => $business->id,
				'business_name' => $business->business_name,
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