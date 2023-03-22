<?php

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
    return view('index');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/diabetes', function () {
    return view('diabetes');
});

Route::get('/aboutWebsite', function () {
    return view('aboutWebsite');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/clinicianAccount', function () {
    return view('clinicianAccount');
});

Route::get('/clinicianDashboard', function () {
    return view('clinicianDashboard');
});

Route::get('/clinicianManage', function () {
    return view('clinicianManage');
});

Route::get('/clinicianSupportMessage', function () {
    return view('clinicianSupportMessage');
});