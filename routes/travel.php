<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 08/03/2019
 * Time: 05:06 ص
 */

Route::group(['middleware' => ['CheckAuth']], function () {
Route::namespace('Admin')->group(function () {
//Travel table
//Route::get('dashboard/admin/travel/add','AdminTravelController@addTravel');
Route::post('dashboard/admin/travel/add','AdminTravelController@processAddTravel');
Route::get('dashboard/admin/travel/add','AdminTravelController@getTravels');
Route::get('dashboard/admin/travel/update/{id}','AdminTravelController@updateTravel');
Route::post('dashboard/admin/travel/update','AdminTravelController@processUpdateTravel');

Route::get('dashboard/admin/travel/delete/{id}','AdminTravelController@deleteTravel');
Route::get('dashboard/admin/travels/all','AdminTravelController@getTravels');

Route::get('getTravelById/{id}','AdminTravelController@getTravelById');
Route::get('count','AdminTravelController@count');
Route::get('deleteTravel/{id}','AdminTravelController@deleteTravel');
Route::get('updateActive/{id}/{status}','AdminTravelController@updateActive');

//subscribe table
    /**
Route::get('dashboard/admin/subscribe/add','adminSubscribeController@AddSubscribe');
Route::post('dashboard/admin/subscribe/add','adminSubscribeController@processAddSubscribe');
Route::get('dashboard/admin/subscribe/all','adminSubscribeController@getAllSubscribes');
Route::get('getSubscribeById/{id}','adminSubscribeController@getSubscribeById');
**/
});

});

