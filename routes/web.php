<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\FreelancerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('careers', [homeController::class, 'careers']);
Route::get('help', [homeController::class, 'help']);
Route::get('contact', [homeController::class, 'contact']);
Route::get('faq', [homeController::class, 'faq']);
Route::get('terms', [homeController::class, 'terms']);

// Auth::routes();

//Login with google
Route::get('redirect', [AuthController::class, 'redirect']);
Route::get('callback', [AuthController::class, 'callback']);

//Manula login
Route::post('signUp', [AuthController::class, 'signUp']);
Route::post('signIn', [AuthController::class, 'signIn']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('profile', [userController::class, 'profile'])->middleware('auth');
Route::post('updateProfile', [userController::class, 'updateProfile'])->middleware('auth');
Route::post('uploadUserProfilePhoto', [userController::class, 'uploadUserProfilePhoto'])->middleware('auth');
Route:: post('uploadUserCoverPhoto', [userController::class, 'uploadUserCoverPhoto'])->middleware('auth');


Route::get('subcategory/{category?}', [homeController::class, 'subcategory']);
Route::get('stateCountry/{city?}', [homeController::class, 'stateCountry']);
Route::get('search-results', [homeController::class, 'searchResults']);
Route::get('businessList', [homeController::class, 'businessList']);
Route::get('getSubcategory/{category}', [homeController::class, 'getSubcategory']);

Route::get('detail/{id}', [BusinessController::class, 'details']);
Route::get('reviews/{id}', [BusinessController::class, 'reviews']);
Route::get('photos/{id}', [BusinessController::class, 'photos']);
Route::get('questions/{id}', [BusinessController::class, 'questions']);

Route::get('freelancer/{id}', [FreelancerController::class, 'freelancerDetails']);
Route::get('freelancer-reviews/{id}', [FreelancerController::class, 'reviews']);
Route::get('freelancer-photos/{id}', [FreelancerController::class, 'photos']);
Route::get('freelancer-questions/{id}', [FreelancerController::class, 'questions']);


Route::get('offers', [BusinessController::class, 'offers']);
Route::get('offersList', [BusinessController::class, 'offersList']);


Route::middleware(['auth'])->group(function () {

	Route::post('addReview', [BusinessController::class, 'addReview']);
	Route::post('addQuestion', [BusinessController::class, 'addQuestion']);
	Route::post('submitAnswer', [BusinessController::class, 'submitAnswer']);


	Route::get('new-business', [BusinessController::class, 'addBusiness']);
	Route::post('addBusinessBasic', [BusinessController::class, 'addBusinessBasic']);
	Route::post('addBusinessPhotos', [BusinessController::class, 'addBusinessPhotos']);
	Route::post('addBusinessLocation', [BusinessController::class, 'addBusinessLocation']);
	Route::post('addBusinessKeywords', [BusinessController::class, 'addBusinessKeywords']);
	Route::post('updateBusinessInfo', [BusinessController::class, 'updateBusinessInfo']);
	Route::post('updateBusinesspageContent', [BusinessController::class, 'updatePageContent']);
	Route::post('updateBusinessOffer', [BusinessController::class, 'updateBusinessOffer']);
	Route::post('submitSavedItem', [BusinessController::class, 'submitSavedItem']);


	Route::post('addFreelancerReview', [FreelancerController::class, 'addReview']);
	Route::post('addFreelancerQuestion', [FreelancerController::class, 'addQuestion']);
	Route::post('freelancerSubmitAnswer', [FreelancerController::class, 'submitAnswer']);

	Route::get('new-freelancer', [FreelancerController::class, 'addFreelancer']);
	Route::post('addFreelancerBasic', [FreelancerController::class, 'addFreelancerBasic']);
	Route::post('addFreelancerPhotos', [FreelancerController::class, 'addFreelancerPhotos']);
	Route::post('addFreelancerLocation', [FreelancerController::class, 'addFreelancerLocation']);
	Route::post('addFreelancerKeywords', [FreelancerController::class, 'addFreelancerKeywords']);
	Route::post('updateFreelancerInfo', [FreelancerController::class, 'updateFreelancerInfo']);
	Route::post('updateFreelancerpageContent', [FreelancerController::class, 'updatePageContent']);
	Route::post('updateFreelancerOffer', [FreelancerController::class, 'updateFreelancerOffer']);
});
