<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserService;
use App\Services\HomeService;

class userController extends Controller
{
    protected $userService, $homeService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->homeService = new HomeService();
    }

    public function profile()
    {
    	$data = $this->userService->profileData();
        $categories = $this->homeService->categories();
        $data['categories'] = $categories;
    	return view('profile', $data);
    }

    public function updateProfile(Request $request)
    {
    	$data = $this->userService->updateProfile($request);
    	echo json_encode(['status' => 'success']);
    }

    public function uploadUserProfilePhoto(Request $request)
    {
        $result = $this->userService->uploadUserProfilePhoto($request);
        echo json_encode(['status' => 'success']);
    }

    public function uploadUserCoverPhoto(Request $request)
    {
        $result = $this->userService->uploadUserCoverPhoto($request);
        echo json_encode(['status' => 'success']);
    }
}
