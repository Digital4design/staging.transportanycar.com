<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Transporter Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'transporter.'], function () {
    Route::group(['middleware' => 'guest:transporter', 'namespace' => 'Transporter'], function () {
        Route::get('login', 'GuestController@login')->name('login');
        Route::post('login', 'GuestController@loginPost')->name('login_post');
        Route::get('signup', 'GuestController@signup')->name('signup');
        Route::post('signup', 'GuestController@signupPost')->name('signup_post');
        Route::get('forgot-password', 'GuestController@forgotPassword')->name('forgot_password');
        Route::post('forgot-password', 'GuestController@forgotPasswordPost')->name('forgot_password');
        Route::get('forgot-password/{token}', 'GuestController@transForgotPassword')->name('trans_password_upadte');
        Route::post('update-password', 'GuestController@updatePasswordPost')->name('trans_update_password');
    });

    Route::get('/', 'Transporter\GuestController@index')->name('home');
    Route::group(['middleware' => ['auth:transporter',  'Is_TransporterPanel'], 'namespace' => 'Transporter'], function () {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::get('total_earning', 'DashboardController@TotalEarning')->name('total_earning');
        Route::get('total_analytics', 'DashboardController@TotalAnalytics')->name('total_analytics');
        Route::get('profile', 'DashboardController@profile')->name('profile');
        Route::post('profile-post', 'DashboardController@profilePost')->name('profile_post');
        Route::get('messages', 'DashboardController@messages')->name('messages');
        Route::get('feedback', 'DashboardController@feedback')->name('feedback');
        // Route::get('current-jobs', 'DashboardController@currentJobs')->name('current_jobs');
        Route::get('current-jobs/{id?}', 'DashboardController@currentJobs')->name('current_jobs');
        Route::get('new-jobs', 'DashboardController@newJobs')->name('new_jobs');
        Route::get('new-jobs-new', 'DashboardController@newJobsNew')->name('new_jobs_new');
        Route::post('submit-offer', 'DashboardController@submitOffer')->name('submit_offer');
        Route::post('update-profile-image', 'DashboardController@updateProfileImage')->name('update_profile_image');
        Route::post('update-profile-docs', 'DashboardController@updateProfileDocs')->name('update_profile_docs');
        Route::post('update-email-preference', 'DashboardController@updateEmailPreference')->name('update_email_preference');
        Route::post('help_and_support', 'DashboardController@help_and_support')->name('help_and_support');
        Route::get('find_job', 'DashboardController@find_job')->name('find_job');
        Route::get('my_job', 'DashboardController@my_job')->name('my_job');
        Route::get('feedback_listing', 'DashboardController@feedback_listing')->name('feedback_listing');

        //Messages
        Route::get('/message/history/{id}', 'MessageController@getChatHistory')->name('message.history');
        Route::post('/message/store/{id}', 'MessageController@store')->name('message.store');
        Route::get('message/chat_list', 'MessageController@getChatList')->name('message.chat_list');
        Route::post('quote/message/send_message', 'MessageController@QuoteSendMessage')->name('message.quote_send_message');
        Route::get('/quotemessage/history/{id}', 'MessageController@getQuoteChatHistory')->name('message.quote_history');


        Route::post('edit-quote-amount', 'DashboardController@editQuoteAmount')->name('edit_quote_amount');
        Route::post('quote-change-status', 'DashboardController@quoteChangeStatus')->name('quote_change_status');
        Route::post('notification-status', 'DashboardController@notificationStatus')->name('notification_status');

        // d4d developer - k
        Route::get('/watchlist/index', 'WatchlistController@watchlistIndex')->name('watchlist.index');
        Route::post('/watchlist/store', 'WatchlistController@watchlistStore')->name('watchlist.store');
        Route::post('/watchlist/remove', 'WatchlistController@watchlistRemove')->name('watchlist.remove');
        // end d4d developer - k
         // D4dDeveoper-r 
         Route::post('save/search','DashboardController@savesearch')->name('save.search');
         Route::get('save/search','DashboardController@savesearchview')->name('view.save.search');
         Route::post('save/search/delete','DashboardController@savesearchdlt')->name('delete.save.search');
         // end
    });

    Route::group(['middleware' => ['auth:transporter']], function () {
        Route::get('/logout', 'General\GeneralController@transporter_logout')->name('logout');
    });

    Route::group(['middleware' => ['auth:transporter'], 'namespace' => 'General'], function () {
        Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
        Route::get('/notifications/{notification}', 'NotificationController@show')->name('notifications.show');
    });
});
