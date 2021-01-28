<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers')->group(function () {
    Route::post('login', 'UserController@login')->name('login-user');
    Route::post('signup', 'UserController@store')->name('register-user');
    Route::post('forget-password', 'UserController@forgetPassword')->name('forget-password');
    Route::post('reset-password', 'UserController@resetPassword')->name('reset-password');
    Route::post('code', 'UserController@code')->name('code');
    Route::post('contact-us', 'ContactUsController@store')->name('contactUs');
    Route::post('admin/login', 'AdminController@login')->name('admin-login');
    Route::get('countries', 'CountryController@all');
    Route::get('positions', 'CountryController@all');

    Route::prefix('users')->group(function (){
        Route::prefix('hospitals')->group(function () {
            Route::get('/', 'HospitalController@index');
        });
        Route::prefix('doctors')->group(function () {
            Route::get('/', 'DoctorController@index');
        });
        Route::prefix('rays')->group(function () {
            Route::get('/', 'RayController@index');
        });
        Route::prefix('labs')->group(function () {
            Route::get('/', 'LabController@index');
        });
        Route::prefix('pharmacy')->group(function () {
            Route::get('/', 'PharmacyController@index');
        });
    });

    Route::middleware('auth:api')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/{user}', 'UserController@show');
            Route::put('/{user}', 'UserController@update');
        });

        Route::prefix('users')->group(function (){
            Route::post('/like-doctor', 'UserController@likeDoctor');
            Route::post('/like-hospital', 'UserController@likeHospital');
            Route::post('/like-lab', 'UserController@likeLab');
            Route::post('/like-ray', 'UserController@likeRay');
            Route::post('/like-pharmacy', 'UserController@likePharmacy');
            Route::post('/dislike-doctor', 'UserController@dislikeDoctor');
            Route::post('/dislike-hospital', 'UserController@dislikeHospital');
            Route::post('/dislike-lab', 'UserController@dislikeLab');
            Route::post('/dislike-ray', 'UserController@dislikeRay');
            Route::post('/dislike-pharmacy', 'UserController@dislikePharmacy');
            Route::post('logout', 'UserController@logout')->name('logout-user');
            Route::prefix('hospitals')->group(function () {
                Route::get('/{hospital}', 'HospitalController@show');
            });
            Route::prefix('doctors')->group(function () {
                Route::get('/{doctor}', 'DoctorController@show');
            });
            Route::prefix('rays')->group(function () {
                Route::get('/{ray}', 'RayController@show');
            });
            Route::prefix('labs')->group(function () {
                Route::get('/{lab}', 'LabController@show');
            });
            Route::prefix('pharmacy')->group(function () {
                Route::get('/{pharmacy}', 'PharmacyController@show');
            });
        });
    });

    Route::middleware('auth:admin')->group(function () {
        Route::prefix('admins')->group(function () {
            Route::resource('doctors', 'DoctorController');
            Route::resource('hospitals', 'HospitalController');
            Route::resource('labs', 'LabController');
            Route::resource('pharmacies', 'PharmacyController');
            Route::resource('rays', 'RayController');
            Route::resource('users', 'UserController');
            Route::get('contactus', 'ContactUsController@index');
            Route::delete('contactus/{contactus}', 'ContactUsController@destroy');
        });
    });
});
