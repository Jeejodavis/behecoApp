<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBusiness;
use App\Services\BusinessService;
use App\Services\HomeService;

class BusinessController extends Controller
{
    protected $businessService, $homeService;

    public function __construct()
    {
        $this->businessService = new BusinessService();
        $this->homeService = new HomeService();
    }

    function details($business)
	{
		$data = $this->businessService->details($business);
		$categories = $this->homeService->categories();
        $data['categories'] = $categories;
    	return view('detailpage', $data);
	}

	function reviews($businessId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->businessService->reviews($businessId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function photos($businessId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->businessService->photos($businessId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function questions($businessId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->businessService->questions($businessId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function addReview(Request $request)
	{
		$result = $this->businessService->addReview($request);
    	echo json_encode(['status' => 'success']);
	}

	function addQuestion(Request $request)
	{
		$result = $this->businessService->addQuestion($request);
    	echo json_encode(['status' => 'success']);
	}

	function submitAnswer(Request $request)
	{
		$result = $this->businessService->submitAnswer($request);
    	echo json_encode(['status' => 'success']);
	}

	function addBusiness()
	{
		$data = $this->businessService->basicDetails();
    	return view('new-business', $data);
	}

	function addBusinessBasic(Request $request)
	{
		$result = $this->businessService->addBusinessBasic($request);
		echo json_encode(['status' => 'success', 'id' => $result]);
	}

	function addBusinessPhotos(Request $request)
	{
		$result = $this->businessService->addBusinessPhotos($request);
		echo json_encode(['status' => 'success']);
	}

	function addBusinessLocation(Request $request)
	{
		$result = $this->businessService->addBusinessLocation($request);
		echo json_encode(['status' => 'success']);	
	}

	function addBusinessKeywords(Request $request)
	{
		$result = $this->businessService->addBusinessKeywords($request);
		echo json_encode(['status' => 'success']);		
	}

	function updateBusinessInfo(Request $request)
	{
		$result = $this->businessService->updateBusinessInfo($request);
		echo json_encode(['status' => 'success']);
	}

	function updatePageContent(Request $request)
	{
		$result = $this->businessService->updatePageContent($request);
		echo json_encode(['status' => 'success']);
	}

	function updateBusinessOffer(Request $request)
	{
		$result = $this->businessService->updateBusinessOffer($request);
		echo json_encode(['status' => 'success']);
	}

    function offers()
    {
        $data = $this->businessService->offers();
        return view('offers', $data);
    }

    function offersList(Request $request)
    {
    	$data = $this->businessService->offersList($request);
		echo json_encode(['status' => 'success', 'data' => $data]);
    }
}
