<?php

use App\Http\Controllers\Api\AppHomePageController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MerchantController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\SubscribeToPlanController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get("/plans",[SubscribeToPlanController::class,"showPlans"]);
    Route::get("/userPlan",[SubscribeToPlanController::class,"showUserPlan"]);
    // Route::put("/plan",[SubscribeToPlanController::class,"update"]);

    Route::get("/search",[MerchantController::class,"search"]);
    Route::get("/merchant/{merchant}",[MerchantController::class,"show"]);
    Route::get("/bestmerchants",[MerchantController::class,"bestMerchants"]);
    Route::get("/merchantOffers/{merchant}",[MerchantController::class,"merchantOffers"]);
    Route::get("/MerchantsByClosestDistance",[MerchantController::class,"MerchantsByClosestDistance"]);

    Route::get("/MerchantCategory",[CategoryController::class,"MerchantCategory"]);
    Route::get("/MerchantSubCategory/{id}",[CategoryController::class,"MerchantSubCategory"]);
    Route::get("/ProductCategory",[CategoryController::class,"ProductCategory"]);
    Route::get("/filter/{id}",[CategoryController::class,"filter"]);
    Route::get("/getMerchantsOfSubCategory/{id}",[CategoryController::class,"getMerchantsOfSubCategory"]);

    Route::get("/ListOfUsedOffers",[OfferController::class,"ListOfUsedOffers"]);
    Route::post("/SaveOffer",[OfferController::class,"SaveOffer"]);
    Route::post("/RemoveFromSavedOffers",[OfferController::class,"RemoveFromSavedOffers"]);
    Route::get("/ListOfSavedOffers/{id}",[OfferController::class,"ListOfSavedOffers"]);
    Route::get("/savings",[OfferController::class,"savings"]);
    Route::post("/generatePinForOffer",[OfferController::class,"generatePinForOffer"]);

    Route::get("/AccountInfo",  [UserController::class,"AccountInfo"]);
    Route::put("/EditAccountInfo",  [UserController::class,"EditAccountInfo"]);
    
    Route::get("/home-sections",[AppHomePageController::class,"sections"]);

    Route::post("/logout",[UserController::class,"logout"]);
});

Route::get("/test",function (){
    return User::all();
});

Route::get("/guest-sections",[AppHomePageController::class,"guestSections"]);
Route::get("/countries",[UserController::class,"Countries"]);
Route::post("/login",[UserController::class,"login"]);
Route::post("/signup", [UserController::class,"signup"]);
Route::post("/forgetPassword",  [UserController::class,"forgetPassword"]);
