<?php

use Illuminate\Support\Facades\Route;

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

Route::post('test/t2','link@api');


Route::get('/', function () {return view('hehe.index');});
Route::get('map/map', function () {return view('map_country');});
Route::get('home', function () {return view('landing.masterclass');});
Route::get('login', function () {return view('hehe.login');});
Route::get('Forgot', function () {return view('landing.Forgot');});
Route::get('contact', function () {return view('landing.contact');});
Route::get('CreateNewPassword', function () {return view('landing.CreateNewPassword');});
Route::get('register', function () {return view('hehe.signup');})->name('register');
Route::post('registerNewUser', 'link@registerNewUser');
Route::post('checkLogin', 'link@checkLogin');
Route::get('test', function () {return view('testing');});
Route::get('logout', 'link@logout');
//Route::post('testPay', 'test@testPayments');
Route::get('checkLogout', 'settings@checkLogout');
Route::get('fetchLinksDataForTable', 'link@fetchLinksDataForTable');
Route::get('/{link}','link@pickRoute');
Route::get('admin/login',function (){return view('admin.requirePassword');});
Route::post('AdminLogin','settings@login');
Route::post('sendOriginalLink', 'link@sendOriginalLink');
Route::get('secure/require-otp', function (){return view('user.reqOTP');});
Route::post('user/reqOTPforsecureLinkSinglePageOtpIDpassUrlRequest', 'link@reqOTPforsecureLinkSinglePageOtpIDpassUrlRequest');

Route::get('host/{hostName}/{pageName}','hosting@returnHostingMain');

//-------------------------------api
Route::get('link-short-developers-api/get-my-host-link','apiControl@linkShortDevelopersApi');
//Route::get('link-short-developers-api-custom/get-my-host-link','link@linkShortDevelopersApiCustom');
Route::post('link-short-developers-api-custom/get-my-host-link','apiControl@linkShortDevelopersApiCustom');
//---------------------------------

Route::get('file/{link}','hosting@findImgByVirtualLink');

Route::get('stats-of-link-clicks-and-visits/{link}',function ($link){
    return view('stats',['link'=>$link]);
});
Route::post('send_link_name_for_fetch_stats','settings@get_data_for_allover_stats_for_clicks');
Route::post('send_link_name_to_set_date_ip','settings@send_link_name_to_set_date_ip');
Route::post('send_link_name_to_set_device_detection','settings@send_link_name_to_set_device_detection');
Route::post('set_up_world_map','settings@set_up_world_map');


Route::group(['middleware'=>['customLogin']],function (){

    Route::get('user/profile', function () {return view('user.profile');});
    Route::get('user/links', function () {return view('user.links');});
    Route::get('user/api&Developers', function () {return view('user.api');});
//    Route::post('sendOriginalLink', 'link@sendOriginalLink');
    Route::post('addLinkByShiftingLinkFromLogin', 'link@addLinkByShiftingLinkFromLogin');
    Route::post('checkifExistuserCustomLink', 'link@checkifExistuserCustomLink');
    Route::post('user/editLinkDataBySecureId', 'link@editLinkDataBySecureId');
    Route::post('user/fetchSpecficRowDataintoTxtField', 'link@fetchSpecficRowDataintoTxtField');
    Route::post('user/advanceSettingForMyLinkForm', 'link@advanceSettingForMyLinkForm');
    Route::post('user/fetchDataFroAdvanceSecurityControl', 'link@fetchDataFroAdvanceSecurityControl');
    Route::post('user/checkMYhostForHosting', 'hosting@checkMYhostForHosting');
    Route::post('user/saveMyNewHostingProject', 'hosting@saveMyNewHostingProject');
    Route::get('user/getAllMyHostingProjects', 'hosting@getAllMyHostingProjects');
    Route::get('user/hosting',function (){return view('user.hosting');});
    Route::get('user/hosting/{name}','hosting@returnViewForAdvanceHosting');
    Route::post('user/getAlldataIfSelectChangeForHostingADV', 'hosting@getAlldataIfSelectChangeForHostingADV');
    Route::post('user/ToSaveAllTextAndNameOfHostADV', 'hosting@ToSaveAllTextAndNameOfHostADV');
    Route::post('user/uploadFilePicVidForADVHOST/{data}', 'hosting@uploadFilePicVidForADVHOST')->name('uploadFilePicVidForADVHOST');
    Route::post('user/deleteMYEntireHOSTADVProject', 'hosting@deleteMYEntireHOSTADVProject');
    Route::get('user/generateToken', 'link@generateToken');
    Route::get('user/templates', function (){return view('user.templates');});
    Route::post('user/liveMyProjectPHP', 'hosting@liveMyProjectPHP');
    Route::post('user/GetliveMyProjectPHP', 'hosting@GetliveMyProjectPHP');
    Route::post('user/RateMyTemplate', 'hosting@RateMyTemplate');
    Route::post('user/zipMe', 'hosting@zipMe');
    Route::post('user/addNewPageToMyADVHost', 'hosting@addNewPageToMyADVHost');
    Route::post('user/deletePagePageFromMyADVHost', 'hosting@deletePagePageFromMyADVHost');
    Route::post('user/addHostingPageLinkToLinkManager', 'hosting@addHostingPageLinkToLinkManager');
    Route::post('user/deleteMyPersonalLinkFromLinkManager', 'link@deleteMyPersonalLinkFromLinkManager');
    Route::post('user/starMyLink', 'link@starMyLink');
    Route::get('user/file-manager', function(){return view('user.treeview');})->name('file-manager');
    Route::get('user/hosting/{name}/file-manager', 'hosting@returnTreeView');

});
Route::group(['middleware'=>['adminLogin']],function (){

    Route::get('admin/Settings',function (){
        return view('admin.settings');
    });
    Route::post('admin/settingsFormData','settings@settingsFormData');
});


