<?php

/**
 *  Route Subscribe && Payment
 */
Route::namespace('Admin\Sub')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin\Sub" Namespace


    Route::prefix('dashboard/admin')->group(function () {


        Route::get('/travels/subscribe/index', 'SubscribeControllers@index');
        Route::get('/travels/subscribe/gettravel/{id?}', 'SubscribeControllers@getTravelByTravelID');
        Route::post('/travels/subscribe/add', 'SubscribeControllers@addNewSub');


    }); // end Prefix route

}); // end name spaces Route