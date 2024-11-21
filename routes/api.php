<?php

use Illuminate\Support\Facades\Route;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;

Route::group(['namespace' => 'Api\V1', 'prefix' => 'V1'], function () {

    Route::post('login', 'GuestController@login');
    Route::post('signup', 'GuestController@signup');
    Route::post('forgot_password', 'GuestController@forgot_password');
    Route::get('content/{type}', 'GuestController@content');
    Route::post('forgot_password', 'GuestController@forgot_password');
    Route::post('check_ability', 'GuestController@check_ability');
    Route::post('version_checker', 'GuestController@version_checker');
    Route::get('getVehicle', 'GuestController@getVehicle')->name('getVehicle');


    //Apis Here
    Route::group(['middleware' => 'ApiTokenChecker'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('getProfile', 'UserController@getProfile');
            Route::get('logout', 'UserController@logout');
        });
    });

    // New route for sending email
    Route::post('send-email', 'MailController@sendEmail')->name('send-email');
   

});


