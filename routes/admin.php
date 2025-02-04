<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest:admin', 'namespace' => 'General'], function () {
    Route::post('login', 'GeneralController@login')->name('login_post');
    Route::get('login', 'GeneralController@Panel_Login')->name('login');
    Route::get('forgot_password', 'GeneralController@Panel_Pass_Forget')->name('forgot_password');
    Route::post('forgot_password', 'GeneralController@ForgetPassword')->name('forgot_password_post');
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::group(['middleware' => 'Is_Admin'], function () {
        Route::get('/', 'General\GeneralController@Admin_dashboard')->name('dashboard');
        Route::get('/totalusers', 'General\GeneralController@totalusers')->name('totalusers');
        Route::get('/profile', 'General\GeneralController@get_profile')->name('profile');
        Route::post('/profile', 'General\GeneralController@post_profile')->name('post_profile');
        Route::get('/update_password', 'General\GeneralController@get_update_password')->name('get_update_password');
        Route::post('/update_password', 'General\GeneralController@update_password')->name('update_password');
        Route::get('/site_settings', 'General\GeneralController@get_site_settings')->name('get_site_settings');
        Route::post('/site_settings', 'General\GeneralController@site_settings')->name('site_settings');
        Route::get('/smtp_settings', 'General\GeneralController@get_smtp_settings')->name('get_smtp_settings');
        Route::post('/smtp_settings', 'General\GeneralController@smtp_settings')->name('smtp_settings');
        Route::get('/email_template', 'General\EmailtemplateController@showForm')->name('email_template');
        Route::get('/seo_settings', 'General\GeneralController@get_seo_settings')->name('get_seo_settings');
        Route::post('/seo_settings', 'General\GeneralController@seo_settings')->name('seo_settings');
        Route::get('/get_email_template', 'General\EmailtemplateController@getEmailTemplate')->name('getEmailTemplate');

        Route::put('/update_email_templates/{id}', 'General\EmailtemplateController@update_email_template')->name('update_email_template');

        Route::get('/send_test_email', 'General\EmailtemplateController@sendtestEmailTemplate')->name('sendtestEmailTemplate');

        Route::group(['namespace' => 'Admin'], function () {
            //        User Module
            Route::get('user/listing', 'UsersController@listing')->name('user.listing');
            Route::get('user/status_update/{id}', 'UsersController@status_update')->name('user.status_update');
            Route::get('user/pending_list/{id}', 'UsersController@pending_list')->name('user.pending_list');
            Route::get('user/ongoing_list/{id}', 'UsersController@ongoing_list')->name('user.ongoing_list');
            Route::get('user/approved_list/{id}', 'UsersController@approved_list')->name('user.approved_list');
            Route::get('user/completed_list/{id}', 'UsersController@completed_list')->name('user.completed_list');
            Route::get('user/cancelled_list/{id}', 'UsersController@cancelled_list')->name('user.cancelled_list');
            Route::get('user/details/{user_id}/{id?}', 'UsersController@details')->name('user.details');
            Route::get('user/vehicle_details_list/{id}', 'UsersController@vehicle_details_list')->name('user.vehicle_details_list');
            Route::resource('user', 'UsersController');


            //        Car Transporter Module
            Route::get('carTransporter/listing', 'CarTransportersController@listing')->name('carTransporter.listing');
            Route::get('carTransporter/status_update/{id}', 'CarTransportersController@status_update')->name('carTransporter.status_update');
            Route::get('carTransporter/events_list/{id}', 'CarTransportersController@events_list')->name('carTransporter.events_list');
            Route::get('carTransporter/freinds_list/{id}', 'CarTransportersController@freinds_list')->name('carTransporter.freinds_list');
            Route::get('carTransporter/pendingview', 'CarTransportersController@pendingView')->name('carTransporter.pendingview');
            Route::get('carTransporter/pendinglisting', 'CarTransportersController@pendingListing')->name('carTransporter.pendinglisting');
            Route::get('carTransporter/approvedview', 'CarTransportersController@approvedView')->name('carTransporter.approvedview');
            Route::get('carTransporter/approvedlisting', 'CarTransportersController@approvedListing')->name('carTransporter.approvedlisting');
            Route::post('carTransporter/status', 'CarTransportersController@status')->name('carTransporter.status');
            Route::get('carTransporter/view', 'CarTransportersController@view')->name('carTransporter.view');
            Route::get('carTransporter/review', 'CarTransportersController@review')->name('carTransporter.review');
            Route::get('carTransporter/review_data', 'CarTransportersController@review_data')->name('carTransporter.review_data');
            Route::post('carTransporter/review_data', 'CarTransportersController@review_data_save')->name('carTransporter.review_data_save');
            Route::post('carTransporter/custom_jobCompleted', 'CarTransportersController@custom_jobCompleted')->name('carTransporter.custom_jobCompleted');
            Route::get('carTransporter/review_show/{id}', 'CarTransportersController@review_show')->name('carTransporter.review_show');
            Route::get('carTransporter/review_show_data/{id}', 'CarTransportersController@review_show_data')->name('carTransporter.review_show_data');
            Route::post('carTransporter/review_show', 'CarTransportersController@review_data_update')->name('carTransporter.review_data_update');
            Route::post('carTransporter/update_job_completed', 'CarTransportersController@update_job_completed')
            ->name('carTransporter.update_job_completed');



            Route::resource('carTransporter', 'CarTransportersController');

            Route::post('carTransporter/t_status', 'CarTransportersController@t_status')->name('carTransporter.t_status');

            //        Content Module
            Route::resource('content', 'ContentController')->except(['show', 'create', 'store', 'destroy']);
            Route::get('content/listing', 'ContentController@listing')->name('content.listing');

            //         FAQ Module
            Route::get('faqs/listing', 'FaqsController@listing')->name('faqs.listing');
            Route::get('faqs/status_update/{id}', 'FaqsController@status_update')->name('faqs.status_update');
            Route::resource('faqs', 'FaqsController');

            Route::get('categories/listing', 'CategoryController@listing')->name('categories.listing');
            Route::get('categories/status_update/{id}', 'CategoryController@status_update')->name('categories.status_update');
            Route::resource('categories', 'CategoryController');

            Route::get('transactionHistory/listing', 'TransactionHistoryController@listing')->name('transactionHistory.listing');
            Route::resource('transactionHistory', 'TransactionHistoryController');
            // Route::get('events/listing', 'EventController@listing')->name('events.listing');
            // Route::get('events/status_update/{id}', 'EventController@status_update')->name('events.status_update');
            // Route::get('events/images_delete/{id}', 'EventController@delete_images')->name('events.delete_images');
            // Route::get('events/particiapnt_list/{id}', 'EventController@particiapnt_list')->name('events.particiapnt_list');
            // Route::resource('events', 'EventController');

        });

Route::get('/logout', 'General\GeneralController@admin_logout')->name('logout');
});

 Route::group(['middleware' => ['auth:admin'], 'namespace' => 'General'], function () {
        Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
        Route::get('/notifications/{notification}', 'NotificationController@show')->name('notifications.show');
    });

});
