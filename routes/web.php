<?php

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


/// Login ///

Route::get('/', 'LoginControllers@viewLogin');
Route::post('login', 'LoginControllers@processLogin');
Route::get('login', 'LoginControllers@viewLogin');
Route::get('logout', 'LoginControllers@logout');
Route::get('testtest', 'test@add');


/// end login///


Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace


    Route::get('dashboard/admin', function () {
        return view('admin.index');
    });

    // users
    Route::get('dashboard/admin/users', 'adminUsersController@viewUser');
    Route::get('dashboard/admin/users/add', 'adminUsersController@addView');
    Route::post('dashboard/admin/users/add', 'adminUsersController@processAdd');
    Route::get('dashboard/admin/users/updated/{id}', 'adminUsersController@updatedView');
    Route::post('dashboard/admin/users/updated', 'adminUsersController@updatedProcess');
    Route::get('dashboard/admin/users/updated/password/{id}', 'adminUsersController@updatedPassView');
    Route::post('dashboard/admin/users/updated/password', 'adminUsersController@updatedPassProcess');

    // partner

    Route::get('dashboard/admin/partner/view', 'adminPartnerControllers@viewPartner');
    Route::get('dashboard/admin/partner/view/add', 'adminPartnerControllers@addPartner');
    Route::post('dashboard/admin/partner/view/add', 'adminPartnerControllers@processAdd');
    // updated
    Route::get('dashboard/admin/partner/view/updated/{id}', 'adminPartnerControllers@updated');
    Route::post('dashboard/admin/partner/view/updated', 'adminPartnerControllers@UpdatedProcess');

    // Outlay << مصاريف الشركه >>

    Route::get('dashboard/admin/outlay/view', 'AdminOutlayController@index');

    // add

    Route::post('dashboard/admin/outlay/view/add', 'AdminOutlayController@addProcess');
    // get by date
    Route::post('dashboard/admin/outlay/view/search', 'AdminOutlayController@SeacherDate');
    // del
    Route::get('dashboard/admin/outlay/view/del/{id}', 'AdminOutlayController@Deleted');
    //updated
    Route::get('dashboard/admin/outlay/view/updated/{id}', 'AdminOutlayController@updated');
    Route::post('dashboard/admin/outlay/view/updated', 'AdminOutlayController@updatedProcess');

    // to Sceur ( errors 500 )
    Route::get('dashboard/admin/outlay/view/add', 'AdminOutlayController@index');
    Route::get('dashboard/admin/outlay/view/search', 'AdminOutlayController@searchCostTravel');


});