<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\General\NotificationController;
use Illuminate\Support\Facades\Mail;
use App\Services\EmailService;
use App\ {User,Thread,UserQuote};
use App\QuoteByTransporter;


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

// URL Mapping to Home Page
Route::get('/example', function () {
    return view('mail.General.reset_account_password'); // This will call the 'example.blade.php' file in the resources/views folder
});
Route::get('/car-delivery', 'Front\GuestController@index')->name('car_delivery');
Route::get('/car-transport', 'Front\GuestController@index')->name('car_transport');
Route::get('/car-transport-quote', 'Front\GuestController@index')->name('car_transport_quote');
Route::get('/vehicle-transport', 'Front\GuestController@index')->name('vehicle_transport');

Route::get("clear-cache", "General\GeneralController@ClearCache");

Route::group(['as' => 'front.'], function () {
    Route::group(['middleware' => 'guest:web', 'namespace' => 'Front'], function () {
        Route::get('login', 'GuestController@login')->name('login');
        Route::post('login', 'GuestController@loginPost')->name('login_post');
        Route::get('forgot-password', 'GuestController@forgotPassword')->name('forgot_password');
        Route::post('forgot-password', 'GuestController@forgotPasswordPost')->name('web_forgot_password');
        Route::get('forgot-password/{token}', 'GuestController@webForgotPassword')->name('web_password_upadte');
        Route::post('update-password', 'GuestController@updatePasswordPost')->name('guest_update_password');
    });

    Route::get('/', 'Front\GuestController@index')->name('home');
    Route::get('get-quote', 'Front\QuotesController@quoteSteps')->name('quote_steps');
    Route::post('set-location', 'Front\QuotesController@setLocation')->name('set_location');
    Route::post('quote-save', 'Front\QuotesController@quoteSave')->name('quote_save');
    Route::post('quote-detail-save', 'Front\QuotesController@quoteDetailSave')->name('quote_detail_save');
    Route::get('privacy-policy', 'Front\GuestController@privacyPolicy')->name('privacy_policy');
    Route::get('term-condition', 'Front\GuestController@termCondition')->name('term_condition');
    Route::get('faq', 'Front\GuestController@faq')->name('faq');
    Route::get('contact', 'Front\GuestController@contact')->name('contact');
    Route::post('inquiry', 'Front\GuestController@inquiry')->name('inquiry');
    Route::get('unsubscribe', 'Front\GuestController@unsubscribe')->name('unsubscribe');

    Route::group(['middleware' => ['auth:web',  'Is_CustomerPanel'], 'namespace' => 'Front'], function () {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::post('update-quote-image', 'DashboardController@updateQuoteImage')->name('update_quote_image');
        Route::get('past-deliveries', 'DashboardController@pastDeliveries')->name('past_deliveries');
        Route::get('account', 'DashboardController@account')->name('account');
        Route::post('profile', 'DashboardController@profile')->name('profile');
        Route::post('update-profile-image', 'DashboardController@updateProfileImage')->name('update_profile_image');
        Route::post('update-email-preference', 'DashboardController@updateEmailPreference')->name('update_email_preference');
        Route::post('mark-as-complete-quote', 'DashboardController@markAsCompleteQuote')->name('mark_as_complete_quote');
        Route::post('save-feedback-quote', 'DashboardController@saveFeedbackQuote')->name('save_feedback_quote');
        Route::get('feedback-view/{id}', 'DashboardController@feedbackView')->name('feedback_view');
        Route::get('feedback_listing/{id}', 'DashboardController@feedback_listing')->name('feedback_listing');
        Route::get('user-deposit/{id}', 'DashboardController@userDeposit')->name('user_deposit');
        Route::get('quotes/{id}', 'DashboardController@quotes')->name('quotes');
        Route::get('quotes/delete/{id}', 'DashboardController@quotesDelete')->name('quote_delete');
        Route::get('booking-confirm/{id?}', 'DashboardController@bookingConfirm')->name('booking_confirm_page');
        Route::get('messages', 'DashboardController@messages')->name('messages');
        Route::get('leave-feedback/{id?}', 'DashboardController@leaveFeedback')->name('leave_feedback');
        Route::get('checkout/{id}', 'PaymentController@checkout')->name('checkout');
        Route::post('/process-payment', 'PaymentController@processPayment')->name('process_payment');
        Route::get('payment-confirm', 'PaymentController@paymentConfirm')->name('payment_confirm');
        Route::post('quote-change-status', 'QuotesController@quoteChangeStatus')->name('quote_change_status');
        Route::post('notification-status', 'DashboardController@notificationStatus')->name('notification_status');
        Route::get('download-vat-receipt', 'DashboardController@downloadVatReceipt')->name('download_vat_receipt');
        Route::get('/message/history/{id}', 'MessageController@getChatHistory')->name('message.history');
        Route::post('/message/store/{id}', 'MessageController@store')->name('message.store');
        Route::get('message/chat_list', 'MessageController@getChatList')->name('message.chat_list');
        Route::post('quote/message/send_message', 'MessageController@QuoteSendMessage')->name('message.quote_send_message');
        Route::get('/quotemessage/history/{id}', 'MessageController@getQuoteChatHistory')->name('message.quote_history');
    });
    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('/logout', 'General\GeneralController@logout')->name('logout');
    });
    Route::get('/user_availability_checker', 'General\GeneralController@user_availability_checker')->name('user_availability_checker');
    Route::get('availability_checker', 'General\GeneralController@availability_checker')->name('availability_checker');
    Route::get('forgot_password/{token}', 'General\GeneralController@forgot_password_view')->name('forgot_password_view');
    Route::post('forgot_password', 'General\GeneralController@forgot_password_post')->name('forgot_password_post');
    Route::post('update-password', 'General\GeneralController@adminUpdatePassword')->name('admin_update_password');
    Route::get('check-old-password', 'General\GeneralController@check_old_password')->name('check_old_password');
    Route::get('check-new-password', 'General\GeneralController@check_new_password')->name('check_new_password');

    Route::group(['middleware' => ['auth:web'], 'namespace' => 'General'], function () {
        Route::get('notifications', 'NotificationController@index')->name('notifications.index');
        Route::get('notifications/{notification}', 'NotificationController@show')->name('notifications.show');
    });
});

// Route::get('admin/login-as-transporter/{transporterId}', 'Admin\LoginController@loginAsTransporter')->name('admin.loginAsTransporter');
Route::middleware('auth:admin')->group(function () {
    Route::get('admin/login-as-transporter/{transporterId}', 'Admin\LoginController@loginAsTransporter')->name('admin.loginAsTransporter');
});

Route::get('/send-email', [EmailController::class, 'sendTestEmail']);
Route::post('/send-otp',[App\Http\Controllers\Front\QuotesController::class,'sendOtp'])->name('sendOtp');
Route::post('/verify-otp',[App\Http\Controllers\Front\QuotesController::class,'verifyOtp'])->name('verifyOtp');


Route::get("/new/template/check",function(){
    $maildata['user'] = User::where('id',"1104")->first();
    $maildata['thread'] = Thread::where('id', '1707')->first();
    $maildata['message'] = "hello how are you ahfkadfkj sdfhsdfhsod shsi gsf gsiof iosf g";
    $maildata['from_page'] = 'quotes_admin';
    $maildata['quotes'] =  UserQuote::where('id', 717)->first();
    $maildata['quote_id'] = 21;
    $maildata['type'] = 'user';
    return view('mail.General.new-message-received', ['data' => $maildata, 'thread_id' =>1707]);
});