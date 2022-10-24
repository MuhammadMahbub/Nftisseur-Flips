<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\DiscordController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SocialurlController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PricingListController;
use App\Http\Controllers\ZikzakImageController;
use App\Http\Controllers\ColorSettingController;
use App\Http\Controllers\ImageConvertController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\GeneralSettingController;

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


Route::group(['middleware' => 'visitor_log'], function(){
    // Route::get('/', function () {
    //     return redirect('login');
    // });
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');
});

Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return back();
})->name('locale');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard');

Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('users/list', [AdminController::class, 'userList'])->name('users.index');
    Route::get('users/{id}/destroy', [AdminController::class, 'userDestroy'])->name('users.destroy');

    Route::resource('banner', BannerController::class);

    Route::resource('imageconvert', ImageConvertController::class);
    Route::resource('convert', ConvertController::class);
    Route::get('convert/images/index', [ConvertController::class,'convertimage_index'])->name('convertimage_index');
    Route::post('convert/images/create', [ConvertController::class,'convertimage_create'])->name('convertimage_create');
    Route::put('convert/images/update/{id}', [ConvertController::class,'convertimage_update'])->name('convertimage_update');
    Route::delete('convert/images/destroy/{id}', [ConvertController::class,'convertimage_destroy'])->name('convertimage_destroy');
    Route::get('convert/list/item/index', [ConvertController::class,'convertlistitem_index'])->name('convertlistitem_index');
    Route::post('convert/list/item/create', [ConvertController::class,'convertlistitem_create'])->name('convertlistitem_create');
    Route::put('convert/list/item/update/{id}', [ConvertController::class,'convertlistitem_update'])->name('convertlistitem_update');
    Route::delete('convert/list/item/destroy/{id}', [ConvertController::class,'convertlistitem_destroy'])->name('convertlistitem_destroy');
    Route::post('convert/list/single/delete', [ConvertController::class, 'convert_list_single_delete'])->name('convert_list_single_delete');
    Route::post('convert/list/multi/delete', [ConvertController::class, 'convert_list_multi_delete'])->name('convert_list_multi_delete');
    Route::post('convertitem/search/by/date', [ConvertController::class, 'date_wise_search_convertitem'])->name('date_wise_search_convertitem');
    Route::post('date/wise/clear/convertitem', [ConvertController::class, 'date_wise_clear_convertitem'])->name('date_wise_clear_convertitem');
    Route::post('search/wise/convertitem', [ConvertController::class, 'search_wise_convertitem'])->name('search_wise_convertitem');
    Route::post('convertimage/search/by/date', [ConvertController::class, 'date_wise_search_convertimage'])->name('date_wise_search_convertimage');
    Route::post('date/wise/clear/convertimage', [ConvertController::class, 'date_wise_clear_convertimage'])->name('date_wise_clear_convertimage');
    Route::post('search/wise/convertimage', [ConvertController::class, 'search_wise_convertimage'])->name('search_wise_convertimage');

    Route::resource('service', ServiceController::class);
    Route::get('services/banner', [ServiceController::class,'service_banner'])->name('service_banner');
    Route::put('services/banner/update/{id}', [ServiceController::class,'service_banner_update'])->name('service_banner_update');
    Route::post('services/multi/delete/', [ServiceController::class,'service_multi_delete'])->name('service_multi_delete');
    Route::post('services/single/delete/', [ServiceController::class,'service_single_delete'])->name('service_single_delete');
    Route::post('service/search/by/date', [ServiceController::class, 'date_wise_search_service'])->name('date_wise_search_service');
    Route::post('date/wise/clear/service', [ServiceController::class, 'date_wise_clear_service'])->name('date_wise_clear_service');
    Route::post('search/wise/service', [FAQController::class, 'search_wise_service'])->name('search_wise_service');

    Route::resource('title', TitleController::class);

    Route::resource('discord', DiscordController::class);
    Route::post('discord/search/by/date', [DiscordController::class, 'date_wise_search_discord'])->name('date_wise_search_discord');
    Route::post('date/wise/clear/discord', [DiscordController::class, 'date_wise_clear_discord'])->name('date_wise_clear_discord');
    Route::post('search/wise/discord', [DiscordController::class, 'search_wise_discord'])->name('search_wise_discord');
    Route::post('discord/multi/delete/', [DiscordController::class,'discord_multi_delete'])->name('discord_multi_delete');
    Route::post('discord/single/delete/', [DiscordController::class,'discord_single_delete'])->name('discord_single_delete');

    Route::resource('zikzak', ZikzakImageController::class);

    Route::resource('faq', FAQController::class);
    Route::post('faq/multi/delete', [FAQController::class, 'faq_multi_delete'])->name('faq_multi_delete');
    Route::post('faq/single/delete', [FAQController::class, 'faq_single_delete'])->name('faq_single_delete');
    Route::post('faq/search/by/date', [FAQController::class, 'date_wise_search_faq'])->name('date_wise_search_faq');
    Route::post('date/wise/clear/faq', [FAQController::class, 'date_wise_clear_faq'])->name('date_wise_clear_faq');
    Route::post('search/wise/faq', [FAQController::class, 'search_wise_faq'])->name('search_wise_faq');

    Route::resource('pricing', PricingController::class);
    Route::resource('pricinglist', PricingListController::class);
    Route::post('pricing/multi/delete', [PricingController::class, 'pricing_multi_delete'])->name('pricing_multi_delete');
    Route::post('pricing/single/delete', [PricingController::class, 'pricing_single_delete'])->name('pricing_single_delete');
    Route::post('pricing/search/by/date', [PricingController::class, 'date_wise_search_pricing'])->name('date_wise_search_pricing');
    Route::post('date/wise/clear/pricing', [PricingController::class, 'date_wise_clear_pricing'])->name('date_wise_clear_pricing');
    Route::post('search/wise/pricing', [PricingController::class, 'search_wise_pricing'])->name('search_wise_pricing');
    Route::post('search/wise/pricinglist', [PricingListController::class, 'search_wise_pricinglist'])->name('search_wise_pricinglist');


    Route::resource('generalSettings', GeneralSettingController::class);

    Route::resource('colorSettings', ColorSettingController::class);

    Route::resource('socialurls', SocialurlController::class);

    Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');
    Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');

});

    Route::resource('contacts', ContactController::class);

    Route::resource('subscribers', SubscriberController::class);
    Route::post('subscribers/stripe-payment', [StripeController::class ,'payment'])->name('stripe.payment');
