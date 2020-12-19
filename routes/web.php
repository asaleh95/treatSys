<?php

use Illuminate\Support\Facades\Route;



Route::get('/dash/{any}', function () {
    return view('dash');
})->where('any', '.*');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
