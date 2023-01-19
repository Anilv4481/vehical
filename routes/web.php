<?php

use App\Http\Controllers\Admin\AdminErrorPageController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\Admin\SubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('admin.dashboard');
});
// Route::get('/admin', function () {
//     return redirect('/admin/dashboard');
// });
Auth::routes(['register' => false]);
// Route::get('/test', 'TestController@test');
// Route::controller(TestController::class)->group(function () {
//     //
// });
Route::get('/admin/test', 'TestController@test');



Route::group(['middleware' => ['optimizeImages'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
    });
    Route::controller(AdminErrorPageController::class)->group(function () {
        Route::get('/404', 'pageNotFound')->name('notfound');
        Route::get('/500', 'serverError')->name('server_error');
    });
    Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/test', 'test')->name('test');
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('dashboard-counts', 'dashboardCountsData')->name('dashboard-counts');
        });

        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('change-password', 'changePassword')->name('change_password');
            Route::put('change-password/{user}', 'updatePassword')->name('update.password');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);



        Route::controller(UserController::class)->group(function () {
            Route::get('/update_language/{user}/{language}', 'updateLanguage')->name('users.update_language');
            Route::get('/users/status/{id}/{status}', 'status')->name('users.status');
            Route::get('/users/rating/{id}', 'rating')->name('users.rating');
            Route::get('/users/{id}/{approve}', 'approve')->name('users.approve');
            Route::get('/users/phoneapprove/{id}/{phoneapprove}', 'phoneapprove')->name('users.phoneapprove');
            Route::get('/users/emailapprove/{id}/{emailapprove}', 'emailapprove')->name('users.emailapprove');
            // Route::get('/users/consultant/', 'consultant')->name('users.consultant');
            Route::post('/users/download', 'export')->name('users.download');
        });
        Route::resource('/users', UserController::class);

        Route::controller(ConsultantController::class)->group(function () {
            Route::get('/consultants/{id}/{status}', 'status')->name('consultants.status');


        });
        Route::resource('/consultants', ConsultantController::class);


        Route::controller(AdvisorieController::class)->group(function () {
            Route::get('/advisorys/status/{id}/{status}', 'status')->name('advisorys.status');
        });


        Route::resource('/advisorys', AdvisorieController::class);


        Route::controller(SetAvailablityController::class)->group(function () {
            Route::get('/battles/status/{id}/{status}', 'status')->name('battles.status');
            Route::get('/battles/{id}/', 'index')->name('battles.index');
        });
        Route::resource('/battles', SetAvailablityController::class);



        // categorys

        Route::controller(CategoryController::class)->group(function ()
        {
            Route::get('/categorys/status/{id}/{status}', 'status')->name('categorys.status');
            Route::get('/categorys/destroy/{cat_id}/', 'destroy')->name('categorys.destroy');
        });
        Route::resource('/categorys', CategoryController::class);

        //subcategorys
        Route::controller(SubController::class)->group(function () {
            Route::get('/subcategorys/status/{id}/{status}', 'status')->name('subcategorys.status');
            Route::get('/subcategorys/destroy/{sub_id}/', 'destroy')->name('subcategorys.destroy');
        });
        Route::resource('/subcategorys', SubController::class);

        // vehical shop

        Route::controller(VehicalShopController::class)->group(function () {
            Route::get('/vehicalshops/status/{id}/{status}', 'status')->name('vehicalshops.status');
            Route::get('/vehicalshops/destroy/{id}/', 'destroy')->name('vehicalshops.destroy');
        });
        Route::resource('/vehicalshops',VehicalShopController::class);




        // Car & Bike Details

        Route::controller(CarBikeDetailsController::class)->group(function () {
            Route::get('/carbikedetails/status/{id}/{status}', 'status')->name('carbikedetails.status');
            Route::get('/carbikedetails/destroy/{id}/', 'destroy')->name('carbikedetails.destroy');
        });
        Route::resource('/carbikedetails',CarBikeDetailsController::class);

        // Request For Care

        Route::controller(RquestForCareController::class)->group(function () {
            Route::get('/carerequests/status/{id}/{status}', 'status')->name('carerequests.status');
            Route::get('/carerequests/destroy/{id}/', 'destroy')->name('carerequests.destroy');
        });
        Route::resource('/carerequests',RquestForCareController::class);


        // vehical shop registartion

        Route::controller(VehicalShopRegistrationController::class)->group(function () {
            Route::get('/shopregistrations/status/{id}/{status}', 'status')->name('shopregistrations.status');
            Route::get('/shopregistrations/destroy/{id}/', 'destroy')->name('shopregistrations.destroy');
        });
        Route::resource('/shopregistrations',VehicalShopRegistrationController::class);



        // vehical service

        Route::controller(VehicalServiceController::class)->group(function () {
            Route::get('/vehicalservices/status/{id}/{status}', 'status')->name('vehicalservices.status');
            Route::get('/vehicalservices/destroy/{id}/', 'destroy')->name('vehicalservices.destroy');
        });
        Route::resource('/vehicalservices',VehicalServiceController::class);

        // vehical service worker

        Route::controller(VehicalServiceworkerController::class)->group(function () {
            Route::get('/serviceworkers/status/{id}/{status}', 'status')->name('serviceworkers.status');
            Route::get('/serviceworkers/destroy/{id}/', 'destroy')->name('serviceworkers.destroy');
        });
        Route::resource('/serviceworkers',VehicalServiceworkerController::class);


        //Setting manager
        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings/general', 'edit_general')->name('settings.edit_general');
            Route::post('/settings/general', 'update_general')->name('settings.update_general');
        });


        // Customer registartion

        Route::controller(CustomerRegistrationController::class)->group(function () {
            Route::get('/customerregistration/status/{id}/{status}', 'status')->name('customerregistration.status');
            Route::get('/customerregistration/destroy/{id}/', 'destroy')->name('customerregistration.destroy');
        });
        Route::resource('/customerregistration',CustomerRegistrationController::class);
    });
});
