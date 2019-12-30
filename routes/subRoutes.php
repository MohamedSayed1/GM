<?php

/**
 *  Route Subscribe && Payment
 */
// auth

Route::group(['middleware' => ['CheckAuth']], function () {
    Route::namespace('Admin\Sub')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin\Sub" Namespace


        Route::prefix('dashboard/admin')->group(function () {


            Route::get('/travels/subscribe/index/{id?}', 'SubscribeControllers@index');
            //Route::post('/travels/subscribe/index/search', 'SubscribeControllers@searchIndex');
            //Route::get('/travels/subscribe/index/search', 'SubscribeControllers@index');
            Route::get('/travels/subscribe/gettravel/{id?}', 'SubscribeControllers@getTravelByTravelID');
            Route::post('/travels/subscribe/add', 'SubscribeControllers@addNewSub');


            // payment
            Route::get('/travels/subscribe/payment/{travel?}/{partner?}', 'PayMentControllers@addView');
            Route::post('/travels/subscribe/payment', 'PayMentControllers@addProcess');
            Route::post('/travels/subscribe/payment/partner/report', 'PayMentControllers@getReports');
            Route::get('/travels/subscribe/payment/partner/report', 'PayMentControllers@addView');

            Route::get('/travels/subscribe/reports/{id?}', 'PayMentControllers@getSubReport');

            Route::get('/travels/partner/get-all/subscribe/reports/{id?}', 'PayMentControllers@getAllPartSub');

            // cashing Route
            Route::get('travels/subscribe/expenses', 'CashingController@view');
            Route::get('travels/subscribe/expenses/get/details/{tavel_id}/{partner_id}', 'CashingController@getPartnerWithCash');
            Route::post('travels/subscribe/expenses/add/new/payment', 'CashingController@addprocess');


        }); // end Prefix route

    }); // end name spaces Route


});