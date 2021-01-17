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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        Route::get('/', function () {
            return view('welcome');
        });
        
        Auth::routes();
        
        Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Backend'], function () {
            
        
            Route::get('/home', 'HomeController@index')->name('home');
            
            Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard.index');
            
            
            //ROUTE USERS 
            Route::resource('users', 'UsersController')->except('show');
             
            Route::post('/users/update', 'UsersController@update')->name('update.user');
            
            Route::get('/users/delete/{id}', 'UsersController@destroy')->name('delete.user');
            
            Route::get('/user/search/', 'UsersController@rows')->name('users.rows');
            
            Route::get('/users/multidelete', 'UsersController@multidelete')->name('multidelete');
            
            
            
             //ROUTE CATEGORIES 
             Route::resource('categories', 'CategoriesController')->except('show');
             
             Route::post('/categories/update', 'CategoriesController@update')->name('update.category');
             
             Route::get('/categories/delete/{id}', 'CategoriesController@destroy')->name('delete.category');
             
             Route::get('/category/search/', 'CategoriesController@rows')->name('categories.rows');
             
             Route::get('/categories/multidelete', 'CategoriesController@multidelete')->name('multidelete.categories');
        });        

});
