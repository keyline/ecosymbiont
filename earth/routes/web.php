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
        Route::match(['get', 'post'], '/contact-us', 'App\Http\Controllers\FrontController@contactUs');
        Route::match(['get', 'post'], '/communities', 'App\Http\Controllers\FrontController@aboutUs');
        Route::match(['get', 'post'], '/communities/SchumacherWild', 'App\Http\Controllers\FrontController@schumacherWild');
        Route::match(['get', 'post'], '/communities/WestOakland', 'App\Http\Controllers\FrontController@westoakland');
        Route::match(['get', 'post'], '/communities/ACTChangemakers', 'App\Http\Controllers\FrontController@actchangemakers');
        Route::match(['get', 'post'], '/communities/EthosFellows', 'App\Http\Controllers\FrontController@ethosfellows');
        Route::match(['get', 'post'], '/page/{id}', 'App\Http\Controllers\FrontController@pageContent');
        Route::match(['get', 'post'], '/category/{id}', 'App\Http\Controllers\FrontController@category');
        Route::match(['get', 'post'], '/category/{categoryname}/{id}', 'App\Http\Controllers\FrontController@subcategory');
        Route::match(['get', 'post'], '/content/{categoryname}/{subcategoryname}/{id}', 'App\Http\Controllers\FrontController@newsContent');
        Route::match(['get', 'post'], '/signin', 'App\Http\Controllers\FrontController@signIn');
        Route::match(['get', 'post'], '/sign-in/{id}', 'App\Http\Controllers\FrontController@signIn');
        Route::match(['get', 'post'], '/signup', 'App\Http\Controllers\FrontController@signUp');
        Route::match(['get', 'post'], '/forgetpassword', 'App\Http\Controllers\FrontController@forgetPassword');
        Route::match(['get', 'post'], '/otpvalidation', 'App\Http\Controllers\FrontController@otpValidation');
        Route::match(['get', 'post'], '/resetpassword/{id}', 'App\Http\Controllers\FrontController@resetPassword');
        Route::match(['get', 'post'], '/submissions', 'App\Http\Controllers\FrontController@submissions');
        Route::match(['get', 'post'], '/contacts', 'App\Http\Controllers\FrontController@contacts');
        Route::match(['get', 'post'], '/fetch-search-suggestions', 'App\Http\Controllers\FrontController@fetch_search_suggestions');
        Route::match(['get', 'post'], '/search-result', 'App\Http\Controllers\FrontController@search_result');
        Route::match(['get', 'post'], '/search_result_load', 'App\Http\Controllers\FrontController@search_result_load');
    // before login
    // after login
        Route::group(['prefix' => 'user', 'middleware' => ['user']], function () {
            Route::get('signout', 'App\Http\Controllers\FrontController@signout');
            Route::get('dashboard', 'App\Http\Controllers\FrontController@dashboard');
            Route::match(['get', 'post'], '/my-profile', 'App\Http\Controllers\FrontController@myProfile');
            Route::match(['get', 'post'], '/change-password', 'App\Http\Controllers\FrontController@changePassword');
            Route::match(['get', 'post'], '/author-classification', 'App\Http\Controllers\FrontController@AuthorClassification');
            Route::match(['get', 'post'], '/add-author-classification', 'App\Http\Controllers\FrontController@addAuthorClassification');
            Route::match(['get', 'post'], '/update-author-classification/{id}', 'App\Http\Controllers\FrontController@updateAuthorClassification');
            Route::match(['get', 'post'], '/profiles', 'App\Http\Controllers\FrontController@profiles');
            Route::match(['get', 'post'], '/add-profile', 'App\Http\Controllers\FrontController@addProfile');
            Route::match(['get', 'post'], '/update-profile/{id}', 'App\Http\Controllers\FrontController@updateProfile');        
            Route::match(['get', 'post'], '/article-list/{id}', 'App\Http\Controllers\FrontController@articleList');
            Route::match(['get', 'post'], '/view_details/{id}', 'App\Http\Controllers\FrontController@viewarticle');
            Route::get('my-articles', 'App\Http\Controllers\FrontController@myArticle');
            Route::post('my-articles', 'App\Http\Controllers\FrontController@myArticle');
            Route::match(['get', 'post'], '/submit-new-article', 'App\Http\Controllers\FrontController@submitNewArticle');
        });
    // after login
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
        Route::match(['get','post'], "test-email", "UserController@testEmail");
        /* setting */
        /* submitted articles */
        // Route::get('article/list', 'ArticlesController@list');
        Route::get('article/{id}', 'ArticlesController@list');
        Route::match(['get', 'post'], 'article/add', 'ArticlesController@add');
        Route::match(['get', 'post'], 'article/edit/{id}', 'ArticlesController@edit');
        Route::match(['get', 'post'], 'article/view_details/{id}', 'ArticlesController@viewDetails');
        Route::get('article/delete/{id}', 'ArticlesController@delete');
        Route::get('article/change-status/{id}', 'ArticlesController@change_status');
        Route::match(['get', 'post'], 'article/change_status_accept/{id}', 'ArticlesController@change_status_accept');
        Route::match(['get', 'post'], 'article/change_status_reject/{id}', 'ArticlesController@change_status_reject');
        Route::get('article/generate-nelp-form/{id}', 'ArticlesController@generate_nelp_form');
        /* submitted articles */
        
            /* parent category */
             Route::get('news_category/list', 'NewsCategoryController@list');
             Route::match(['get', 'post'], 'news_category/add', 'NewsCategoryController@add');
             Route::match(['get', 'post'], 'news_category/edit/{id}', 'NewsCategoryController@edit');
             Route::get('news_category/delete/{id}', 'NewsCategoryController@delete');
             Route::get('news_category/change-status/{id}', 'NewsCategoryController@change_status');
             Route::get('news_category/change-archieve-status/{id}', 'NewsCategoryController@change_archieve_status');
            /* end parent category */
            /*sub category */
                 Route::get('news_subcategory/list', 'NewsSubCategoryController@list');
                 Route::match(['get', 'post'], 'news_subcategory/add', 'NewsSubCategoryController@add');
                 Route::match(['get', 'post'], 'news_subcategory/edit/{id}', 'NewsSubCategoryController@edit');
                 Route::get('news_subcategory/delete/{id}', 'NewsSubCategoryController@delete');
                 Route::get('news_subcategory/change-status/{id}', 'NewsSubCategoryController@change_status');
                 Route::get('news_subcategory/change-archieve-status/{id}', 'NewsSubCategoryController@change_archieve_status');
            /* end sub category */
            /*news content */
             Route::get('news_content/list', 'NewsContentController@list');
             Route::match(['get', 'post'], 'news_content/add', 'NewsContentController@add');
             Route::match(['get', 'post'], 'news_content/edit/{id}', 'NewsContentController@edit');
             Route::match(['get', 'post'], 'news_content/import/{id}', 'NewsContentController@import');
             Route::get('news_content/delete/{id}', 'NewsContentController@delete');
             Route::get('news_content/change-status/{id}', 'NewsContentController@change_status');
             Route::get('news_content/change-archieve-status/{id}', 'NewsContentController@change_archieve_status');
             Route::get('news_content/get-subcategories/{parent_id}', 'NewsContentController@getSubcategories'); // AJAX route
             Route::get('news_content_image/list', 'NewsContentController@list_image');
             Route::match(['get', 'post'], 'news_content_image/add_image', 'NewsContentController@add_image');
             Route::match(['get', 'post'], 'news_content_image/edit_image/{id}', 'NewsContentController@edit_image');
             Route::get('news_content_image/delete_image/{id}', 'NewsContentController@delete_image');
             Route::get('news_content_image/change-status-image/{id}', 'NewsContentController@change_status_image');
            /* end news content */
            /* newsletter */
                /* subscriber */
                Route::get('subscriber/list', 'SubscriberController@list');
                Route::match(['get', 'post'], 'subscriber/add', 'SubscriberController@add');
                Route::match(['get', 'post'], 'subscriber/edit/{id}', 'SubscriberController@edit');
                Route::get('subscriber/delete/{id}', 'SubscriberController@delete');
                Route::get('subscriber/change-status/{id}', 'SubscriberController@change_status');
                Route::get('subscriber/send/{id}', 'SubscriberController@send');
                Route::post('subscriber/get-user', 'SubscriberController@getUser');
                /* subscriber */
                /* newsletter */
                    Route::get('newsletter/list', 'NewsletterController@list');
                    Route::match(['get', 'post'], 'newsletter/add', 'NewsletterController@add');
                    Route::match(['get', 'post'], 'newsletter/edit/{id}', 'NewsletterController@edit');
                    Route::get('newsletter/delete/{id}', 'NewsletterController@delete');
                    Route::get('newsletter/change-status/{id}', 'NewsletterController@change_status');
                    Route::get('newsletter/send/{id}', 'NewsletterController@send');
                    Route::post('newsletter/get-user', 'NewsletterController@getUser');
                /* newsletter */
            /* newsletter */
            /* expertise_area */
             Route::get('expertise_area/list', 'ExpertiseAreaController@list');
             Route::match(['get', 'post'], 'expertise_area/add', 'ExpertiseAreaController@add');
             Route::match(['get', 'post'], 'expertise_area/edit/{id}', 'ExpertiseAreaController@edit');
             Route::get('expertise_area/delete/{id}', 'ExpertiseAreaController@delete');
             Route::get('expertise_area/change-status/{id}', 'ExpertiseAreaController@change_status');
             Route::get('expertise_area/change-archieve-status/{id}', 'ExpertiseAreaController@change_archieve_status');
             /* expertise_area */
             /* ecosystem_affiliation */
             Route::get('ecosystem_affiliation/list', 'EcosystemAffiliationController@list');
             Route::match(['get', 'post'], 'ecosystem_affiliation/add', 'EcosystemAffiliationController@add');
             Route::match(['get', 'post'], 'ecosystem_affiliation/edit/{id}', 'EcosystemAffiliationController@edit');
             Route::get('ecosystem_affiliation/delete/{id}', 'EcosystemAffiliationController@delete');
             Route::get('ecosystem_affiliation/change-status/{id}', 'EcosystemAffiliationController@change_status');
             Route::get('ecosystem_affiliation/change-archieve-status/{id}', 'EcosystemAffiliationController@change_archieve_status');
             /* ecosystem_affiliation */
             /* pronoun */
             Route::get('pronoun/list', 'PronounController@list');
             Route::match(['get', 'post'], 'pronoun/add', 'PronounController@add');
             Route::match(['get', 'post'], 'pronoun/edit/{id}', 'PronounController@edit');
             Route::get('pronoun/delete/{id}', 'PronounController@delete');
             Route::get('pronoun/change-status/{id}', 'PronounController@change_status');
             Route::get('pronoun/change-archieve-status/{id}', 'PronounController@change_archieve_status');
             /* pronoun */
             /* Section Ert */
             Route::get('section_ert/list', 'SectionErtController@list');
             Route::match(['get', 'post'], 'section_ert/add', 'SectionErtController@add');
             Route::match(['get', 'post'], 'section_ert/edit/{id}', 'SectionErtController@edit');
             Route::get('section_ert/delete/{id}', 'SectionErtController@delete');
             Route::get('section_ert/change-status/{id}', 'SectionErtController@change_status');
             Route::get('section_ert/change-archieve-status/{id}', 'SectionErtController@change_archieve_status');
             /* Section Ert */
             /* Submission Type */
             Route::get('submission_type/list', 'SubmissionTypeController@list');
             Route::match(['get', 'post'], 'submission_type/add', 'SubmissionTypeController@add');
             Route::match(['get', 'post'], 'submission_type/edit/{id}', 'SubmissionTypeController@edit');
             Route::get('submission_type/delete/{id}', 'SubmissionTypeController@delete');
             Route::get('submission_type/change-status/{id}', 'SubmissionTypeController@change_status');
             Route::get('submission_type/change-archieve-status/{id}', 'SubmissionTypeController@change_archieve_status');
             /* Submission Type */
              /* title */
              Route::get('title/list', 'TitleController@list');
              Route::match(['get', 'post'], 'title/add', 'TitleController@add');
              Route::match(['get', 'post'], 'title/edit/{id}', 'TitleController@edit');
              Route::get('title/delete/{id}', 'TitleController@delete');
              Route::get('title/change-status/{id}', 'TitleController@change_status');
              Route::get('title/change-archieve-status/{id}', 'TitleController@change_archieve_status');
              /* title */
              /* country */
              Route::get('country/list', 'CountryController@list');
              Route::match(['get', 'post'], 'country/add', 'CountryController@add');
              Route::match(['get', 'post'], 'country/edit/{id}', 'CountryController@edit');
              Route::get('country/delete/{id}', 'CountryController@delete');
              Route::get('country/change-status/{id}', 'CountryController@change_status');
              Route::get('country/change-archieve-status/{id}', 'CountryController@change_archieve_status');
              /* country */
              /* role */
              Route::get('role/list', 'RoleController@list');
              Route::match(['get', 'post'], 'role/add', 'RoleController@add');
              Route::match(['get', 'post'], 'role/edit/{id}', 'RoleController@edit');
              Route::get('role/delete/{id}', 'RoleController@delete');
              Route::get('role/change-status/{id}', 'RoleController@change_status');
              Route::get('role/change-archieve-status/{id}', 'RoleController@change_archieve_status');
              /* role */
              /* content_creaters */
              Route::get('content_creaters/list', 'ContentCreatersController@list');
               Route::match(['get', 'post'], 'content_creaters/add', 'ContentCreatersController@add');
               Route::match(['get', 'post'], 'content_creaters/edit/{id}', 'ContentCreatersController@edit');
               Route::get('content_creaters/delete/{id}', 'ContentCreatersController@delete');
               Route::get('content_creaters/change-status/{id}', 'ContentCreatersController@change_status');
               Route::get('content_creaters/change-archieve-status/{id}', 'ContentCreatersController@change_archieve_status');
               /* content_creaters */
               /* readers */
              Route::get('readers/list', 'ReadersController@list');
              Route::match(['get', 'post'], 'readers/add', 'ReadersController@add');
              Route::match(['get', 'post'], 'readers/edit/{id}', 'ReadersController@edit');
              Route::get('readers/delete/{id}', 'ReadersController@delete');
              Route::get('readers/change-status/{id}', 'ReadersController@change_status');
              Route::get('readers/change-archieve-status/{id}', 'ReadersController@change_archieve_status');
              /* readers */
               /* editors */
               Route::get('editors/list', 'EditorsController@list');
               Route::match(['get', 'post'], 'editors/add', 'EditorsController@add');
               Route::match(['get', 'post'], 'editors/edit/{id}', 'EditorsController@edit');
               Route::get('editors/delete/{id}', 'EditorsController@delete');
               Route::get('editors/change-status/{id}', 'EditorsController@change_status');
               Route::get('editors/change-archieve-status/{id}', 'EditorsController@change_archieve_status');
               /* editors */
               // page
               Route::get('page/list', 'PageController@list');
               Route::match(['get', 'post'], 'page/add', 'PageController@add');
               Route::match(['get', 'post'], 'page/edit/{id}', 'PageController@edit');
               Route::get('page/delete/{id}', 'PageController@delete');
               Route::get('page/change-status/{id}', 'PageController@change_status');
                // page
                // seo
               Route::get('seo/list', 'SeoController@list');
               Route::match(['get', 'post'], 'seo/add', 'SeoController@add');
               Route::match(['get', 'post'], 'seo/edit/{id}', 'SeoController@edit');
               Route::get('seo/delete/{id}', 'SeoController@delete');
               Route::get('seo/change-status/{id}', 'SeoController@change_status');
                // seo
                //enquiry
                Route::get('enquiry/list', 'EnquiryController@list');
                Route::get('enquiry/view-details/{id}', 'EnquiryController@details');
                Route::get('enquiry/delete/{id}', 'EnquiryController@delete');
                //enquiry
        });
    });
/* Admin Panel */
