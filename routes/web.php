<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AnalyticController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CustomerFeedbackController;
use App\Http\Controllers\Admin\MediaAssetsImagesController;
use App\Http\Controllers\Admin\MerchantCategoryController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\MerchantSubCategoryController;
use App\Http\Controllers\Website\MerchantController as WebsiteMerchantController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OfferTypeController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestForEditController;
use App\Http\Controllers\Admin\ReturnPolicyController;
use App\Http\Controllers\Admin\RulesOfUseController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserOfferController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Website\FaqController;
use App\Http\Controllers\Website\NewsroomController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Website\UploadCV;
use App\Models\Analytic;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::get('/', function () {
    return view('Website/welcome', ['countries' => \App\Models\Country::all(),]);
})->name('home.index');

Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/becomePartner', [HomeController::class, 'becomePartner'])->name('becomePartner');

Route::get('locale/{locale}', [Controller::class, 'setLanguage']);

Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/newsRoom', [HomeController::class, 'newsRoom'])->name('newsRoom');
Route::get('/newsRoomPost/{id}', [HomeController::class, 'newsRoomPost'])->name('newsRoomPost');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/contactUs', [HomeController::class, 'contactUs'])->name('contactUs');

// Route::get('/watchVideo',[HomeController::class,'watchVideo'])->name('watchVideo');
Route::get('/mediaAssets', [HomeController::class, 'mediaAssets'])->name('mediaAssets');
Route::get('/rulesOfUse', [HomeController::class, 'rulesOfUse'])->name('rulesOfUse');
Route::get('/FAQs', [HomeController::class, 'FAQs'])->name('FAQs');

Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/returnPolicy', [HomeController::class, 'returnPolicy'])->name('returnPolicy');

Route::resource('becomePartner', WebsiteMerchantController::class)->only(['store']);
Route::resource('contactUs', ContactUsController::class)->only(['store']);

Route::post('upload', [UploadCV::class, 'upload'])->name('upload');

Route::get('/download', function () {
    return response()->download(public_path('logo\bowi-logo.png'), 'bowiLogo.jpeg');
})->name('download');


Route::get('/home', function () {
    return redirect("/users");
})->name('home');





Route::middleware(["auth","admin"])->group(function () {

    Route::get('/welcome', function () {
        return view('app-view.welcome');
    });



    Route::resource("/users", UserController::class);

    Route::resource("/merchants", MerchantController::class);

    Route::get('/show-admin-view-merchant/{merchant_id}',[UserController::class,'showAdminViewMerchant'])->name('show-admin-view-merchant');

    Route::get('admin-view', [MerchantController::class, 'adminView'])->name('admin-view');

    Route::get('/my-merchant/{id}/edit', [MerchantController::class, 'edit'])->name('my-merchant.edit');

    Route::resource("/categories", MerchantCategoryController::class);
    Route::resource("/sub-categories", MerchantSubCategoryController::class);

    Route::resource("/offers", OfferController::class);


    Route::get('/merchant-offers/{merchant_id}', [OfferController::class, 'merchantsOffer'])->name('merchants.merchant-offers.index');

    Route::get('/merchant-offers/{merchant_id}/users-offers', [UserOfferController::class, 'userOffers'])->name('merchants.user-offers.index');

    // Route::get('/users/customer-feedback', function () {
    //     return view('users.customer-feedback.index');
    // })->name('users.customer-feedback.index');

    Route::resource("/users-customer-feedback", CustomerFeedbackController::class);

    Route::resource("/analytics", AnalyticController::class);
    Route::get("/analytics1", [AnalyticController::class ,'index1'])->name('UAnalytics');
    Route::get("/analytics2", [AnalyticController::class ,'index2'])->name('OAnalytics');
    Route::get("/analytics3", [AnalyticController::class ,'index3'])->name('MAnalytics');


    Route::resource("/system_analytics/table", TableController::class);

    Route::resource("/about-us", AboutUsController::class);
    Route::resource("/news", NewsroomController::class);
    Route::resource("/contact-us", ContactUsController::class);

    Route::resource("/media-assets", MediaAssetsImagesController::class);
    Route::resource("/rules-of-use", RulesOfUseController::class);
    Route::resource("/faqs", FaqController::class);

    Route::resource("/term", TermsController::class);
    Route::resource("/privacy-policies", PrivacyPolicyController::class);
    Route::resource("/return-policies", ReturnPolicyController::class);
    Route::resource("/countries", CountryController::class);

    Route::resource("/homesection", HomeSectionController::class);

    Route::resource("/request-for-edit", RequestForEditController::class);

});

Route::middleware("auth")->group(function () {

    Route::get('/dashboard',[\App\Http\Controllers\Auth\LoginController::class, 'redirectTo'])->name('dashboard');

    Route::get("/my-merchant-info", [MerchantController::class,'merchantinfo'])->name('info.merchants');
    Route::get('/edit-info/{id}',[MerchantController::class, 'edit'])->name('edit.info.merchants');
    Route::put('/update-info/{id}',[MerchantController::class, 'update'])->name('my-merchant.update');

    //merchant create offer
    Route::get('/my-merchant-offers/create', [OfferController::class, 'create'])->name('my-merchant-offers.create');
    Route::post('/my-merchant-offers', [OfferController::class, 'store'])->name('my-merchant-offers.store');

    Route::get("/sales", [OfferController::class,'sales'])->name('merchant.sales');

    Route::get("/oldOffers", [OfferController::class,'oldOffers'])->name('merchant.old-offers');

    Route::resource("/my-products", ProductController::class);

    Route::resource("/my-offers", OfferController::class);

    Route::resource("/request-for-edit", RequestForEditController::class);

    Route::get("/redeem-code", [UserOfferController::class, 'redeemCodePage'])->name('redeem-code');

    Route::get("/subscription", [MerchantController::class,'subscription'])->name('subscription');
    // Route::post("/redeemCode", [UserOfferController::class,'redeemCode'])->name('redeemCode');

    Route::get("/merchant-analytics/table", [AnalyticController::class, 'merchantstatictable'])->name('merchant.analytics.table');

    Route::resource("/merchant-branches",BranchController::class);

    Route::get('/merchant-analytics', [AnalyticController::class, 'merchantstatic'])->name('merchant.analytics');
    Route::get('/merchant-analytics1', [AnalyticController::class, 'merchantstatic1'])->name('merchant.analytics1');
    Route::get('/merchant-analytics2', [AnalyticController::class, 'merchantstatic2'])->name('merchant.analytics2');

    Route::get('/index', function () {
        return view('admin_dashboard.new_index.index');
    });
});

//Auth::routes();
