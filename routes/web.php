<?php

use App\Http\Controllers\Admin\ScrollNoticeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
/* Front Panel */
// before login
Route::match(['get', 'post'], '/', 'App\Http\Controllers\FrontController@home');
Route::match(['get', 'post'], '/archieve', 'App\Http\Controllers\FrontController@archieve');
Route::match(['get', 'post'], '/submit-manuscript', 'App\Http\Controllers\FrontController@submitManuscript');

Route::match(['get', 'post'], '/about', 'App\Http\Controllers\FrontController@about');
Route::match(['get', 'post'], '/author-guideline', 'App\Http\Controllers\FrontController@authorGuideline');
Route::match(['get', 'post'], '/editorial-board ', 'App\Http\Controllers\FrontController@editorialBoard');
Route::match(['get', 'post'], '/advisory-board ', 'App\Http\Controllers\FrontController@advisoryBoard');
// before login
/* Front Panel */
/* Admin Panel */
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get', 'post'], '/', 'UserController@login');
    Route::match(['get', 'post'], '/forgot-password', 'UserController@forgotPassword');
    Route::match(['get', 'post'], '/validateOtp/{id}', 'UserController@validateOtp');
    Route::match(['get', 'post'], '/resendOtp/{id}', 'UserController@resendOtp');
    Route::match(['get', 'post'], '/changePassword/{id}', 'UserController@changePassword');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'UserController@dashboard');
        Route::get('logout', 'UserController@logout');
        Route::get('email-logs', 'UserController@emailLogs');
        Route::match(['get', 'post'], '/email-logs/details/{email}', 'UserController@emailLogsDetails');
        Route::get('login-logs', 'UserController@loginLogs');

        /* setting */
        Route::get('settings', 'UserController@settings');
        Route::post('profile-settings', 'UserController@profile_settings');
        Route::post('general-settings', 'UserController@general_settings');
        Route::post('change-password', 'UserController@change_password');
        Route::post('email-settings', 'UserController@email_settings');
        Route::post('email-template', 'UserController@email_template');
        Route::post('sms-settings', 'UserController@sms_settings');
        Route::post('footer-settings', 'UserController@footer_settings');
        Route::post('seo-settings', 'UserController@seo_settings');
        Route::post('payment-settings', 'UserController@payment_settings');
        Route::post('signature-settings', 'UserController@signature_settings');
        /* setting */
        /* submitted articles */
        Route::get('article/list', 'ArticlesController@list');
        Route::match(['get', 'post'], 'article/add', 'ArticlesController@add');
        Route::match(['get', 'post'], 'article/edit/{id}', 'ArticlesController@edit');
        Route::get('article/delete/{id}', 'ArticlesController@delete');
        Route::get('article/change-status/{id}', 'ArticlesController@change_status');
        Route::match(['get', 'post'], 'article/change_status_accept/{id}', 'ArticlesController@change_status_accept');
        Route::match(['get', 'post'], 'article/change_status_reject/{id}', 'ArticlesController@change_status_reject');
        /* submitted articles */
        
         /* category */
         Route::get('news_category/list', 'NewsCategoryController@list');
         Route::match(['get', 'post'], 'news_category/add', 'NewsCategoryController@add');
         Route::match(['get', 'post'], 'news_category/edit/{id}', 'NewsCategoryController@edit');
         Route::get('news_category/delete/{id}', 'NewsCategoryController@delete');
         Route::get('news_category/change-status/{id}', 'NewsCategoryController@change_status');
         Route::get('news_category/change-archieve-status/{id}', 'NewsCategoryController@change_archieve_status');
         /* category */
         /* subscribers */
         Route::get('subscribers/list', 'SubscribersController@list');
        //  Route::match(['get', 'post'], 'subscribers/add', 'SubscribersController@add');
        //  Route::match(['get', 'post'], 'subscribers/edit/{id}', 'SubscribersController@edit');
         Route::get('subscribers/delete/{id}', 'SubscribersController@delete');
         Route::get('subscribers/change-status/{id}', 'SubscribersController@change_status');
         Route::get('subscribers/change-archieve-status/{id}', 'SubscribersController@change_archieve_status');
         /* subscribers */
          /* users */
          Route::get('users/list', 'UsersController@list');
          //  Route::match(['get', 'post'], 'subscribers/add', 'UsersController@add');
          //  Route::match(['get', 'post'], 'subscribers/edit/{id}', 'UsersController@edit');
           Route::get('users/delete/{id}', 'UsersController@delete');
           Route::get('users/change-status/{id}', 'UsersController@change_status');
           Route::get('users/change-archieve-status/{id}', 'UsersController@change_archieve_status');
           /* users */
        /* manuscript */
        Route::get('manuscript/list', 'ManuscriptController@list');
        Route::get('manuscript/delete/{id}', 'ManuscriptController@delete');
        Route::get('manuscript/change-status/{id}/{id2}', 'ManuscriptController@change_status');
        /* manuscript */

        /* Scroll Notice */
        Route::resource('scroll-notice', ScrollNoticeController::class);
        Route::post('scroll-notice/store', 'ScrollNoticeController@store');
        /* Scroll Notice */
    });
});
/* Admin Panel */
