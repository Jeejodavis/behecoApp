<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;

class homeController extends Controller
{
	protected $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    function index()
    {
    	$data = $this->homeService->home();
    	return view('home', $data);
    }

    function careers()
    {
        $categories = $this->homeService->categories();
        $data = ['categories' => $categories];
        return view('career', $data);
    }

    function help()
    {
        $categories = $this->homeService->categories();
        $data = ['categories' => $categories];
        return view('help', $data);
    }

    function contact()
    {
        $categories = $this->homeService->categories();
        $data = ['categories' => $categories];
        return view('contact', $data);
    }

    function faq()
    {
        $categories = $this->homeService->categories();
        $data = ['categories' => $categories];
        return view('faq', $data);
    }

    function terms()
    {
        $categories = $this->homeService->categories();
        $data = ['categories' => $categories];
        return view('terms', $data);
    }

    function subcategory(Category $category)
    {
        $data = $this->homeService->subcategory($category);
        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    function getSubcategory($category)
    {
        $data = $this->homeService->getSubcategory($category);
        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    function stateCountry(City $city)
    {
        $data = $this->homeService->stateCountry($city);
        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    function searchResults(Request $request)
    {
    	$data = $this->homeService->searchResults($request);
    	return view('search-results', $data);
    }

    function businessList(Request $request)
    {
        $city = $request->city;
        $keyword = $request->keyword;
        $cityfilter = $request->cityfilter;
        $categoryfilter = $request->categoryfilter;
        $subcategoryfilter = $request->subcategoryfilter;
        $limit = $request->limit ?? 12;
        $offset = $request->offset ?? 0;
        $data = $this->homeService->businessList($city, $keyword, $cityfilter, $categoryfilter, $subcategoryfilter, $limit, $offset);
        echo json_encode(['status' => 'success', 'data' => $data]);
    }
}
