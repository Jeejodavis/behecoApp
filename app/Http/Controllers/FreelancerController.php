<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFreelancers;
use App\Services\FreelancerService;
use App\Services\HomeService;

class FreelancerController extends Controller
{
    protected $freelancerService, $homeService;

    public function __construct()
    {
        $this->freelancerService = new FreelancerService();
        $this->homeService = new HomeService();
    }

    function details($freelancer)
	{
		$data = $this->freelancerService->details($freelancer);
		$categories = $this->homeService->categories();
        $data['categories'] = $categories;
    	return view('detailpage', $data);
	}

	function reviews($freelancerId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->freelancerService->reviews($freelancerId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function photos($freelancerId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->freelancerService->photos($freelancerId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function questions($freelancerId, Request $request)
	{
		$limit = $request->limit;
		$offset = $request->offset;
		$data = $this->freelancerService->questions($freelancerId, $limit, $offset);
    	echo json_encode(['status' => 'success', 'data' => $data]);
	}

	function addReview(Request $request)
	{
		$result = $this->freelancerService->addReview($request);
    	echo json_encode(['status' => 'success']);
	}

	function addQuestion(Request $request)
	{
		$result = $this->freelancerService->addQuestion($request);
    	echo json_encode(['status' => 'success']);
	}

	function submitAnswer(Request $request)
	{
		$result = $this->freelancerService->submitAnswer($request);
    	echo json_encode(['status' => 'success']);
	}

	function addFreelancer()
	{
		$data = $this->freelancerService->basicDetails();
    	return view('new-freelancer', $data);
	}

	function addFreelancerBasic(Request $request)
	{
		$result = $this->freelancerService->addFreelancerBasic($request);
		echo json_encode(['status' => 'success', 'id' => $result]);
	}

	function addFreelancerPhotos(Request $request)
	{
		$result = $this->freelancerService->addFreelancerPhotos($request);
		echo json_encode(['status' => 'success']);
	}

	function addFreelancerLocation(Request $request)
	{
		$result = $this->freelancerService->addFreelancerLocation($request);
		echo json_encode(['status' => 'success']);	
	}

	function addFreelancerKeywords(Request $request)
	{
		$result = $this->freelancerService->addFreelancerKeywords($request);
		echo json_encode(['status' => 'success']);		
	}

	function updateFreelancerInfo(Request $request)
	{
		$result = $this->freelancerService->updateFreelancerInfo($request);
		echo json_encode(['status' => 'success']);
	}

	function updatePageContent(Request $request)
	{
		$result = $this->freelancerService->updatePageContent($request);
		echo json_encode(['status' => 'success']);
	}

	function updateFreelancerOffer(Request $request)
	{
		$result = $this->freelancerService->updateFreelancerOffer($request);
		echo json_encode(['status' => 'success']);
	}

    function offers()
    {
        $data = $this->freelancerService->offers();
        return view('offers', $data);
    }

    function offersList(Request $request)
    {
    	$data = $this->freelancerService->offersList($request);
		echo json_encode(['status' => 'success', 'data' => $data]);
    }

    function submitSavedItem(Request $request)
    {
    	$data = $this->freelancerService->submitSavedItem($request);
		echo json_encode(['status' => 'success']);	
    }

    function freelancerDetails($freelancerId)
    {
    	$data = $this->freelancerService->details($freelancerId);
		$categories = $this->homeService->categories();
        $data['categories'] = $categories;
    	return view('freelancerdetail', $data);
    }
}
