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


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/', 'WelcomeController@welcome');
Route::get('/index', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'HomeController@sendContactForm');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', "Admin\LoginController@showLoginForm")->name('admin-login');
    Route::post('/login', "Admin\LoginController@authenticate");
    Route::get('/logout', "Admin\LoginController@logout")->name('admin-logout');

    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/pages','AdminController@getPages'); 
    Route::get('/pages/{id}','AdminController@getPage'); 
    Route::get('/settings','AdminController@getSetting'); 
    Route::post('/settings','SettingController@updateSetting'); 
    Route::post('/pages/{id}','PageController@updatePage'); 
    Route::post('/pages/index/{id}','PageController@updateIndexStatus');
});
