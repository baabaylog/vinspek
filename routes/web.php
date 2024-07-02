<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return redirect('/');
});

Route::controller(FrontendController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/inspection/{plain_id}', 'inspection')->name('inspection');
    Route::get('/about', 'about')->name('about');

    Route::post('/create-order', 'create_order')->name('create_order');
    Route::post('/get-car-info', 'car_info')->name('car_info');
});