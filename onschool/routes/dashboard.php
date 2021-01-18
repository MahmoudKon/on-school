<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('PAGINATE_NUMBERT', 5);

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function () {

    Route::get('login', 'LoginController@viewLogin')->name('viewLogin');

    Route::post('login', 'LoginController@login')->name('login');

    Route::post('logout', 'LoginController@logout')->name('logout');

});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin'], 'as'=>'dashboard.'], function () {
        // Route::get('translate/{action}', 'TranslateController@translate')->name('translate');
        Route::post('translate', 'TranslateController@translate')->name('translate');
        Route::get('/', 'HomeController@index')->name('home');

        // BEGIN ROUTES USERS MODEL
        Route::group(['prefix' => 'users'], function () {
            Route::group(['prefix' => 'trashed'], function () {
                // ROUTE TO DELETE THE USERS [ FORCE DELETE || HARD DELETE ]
                Route::post('delete', 'UsersController@delete')->name('users.trashed.delete');
                // ROUTE TO RESTORE THE TRASHED USERS
                Route::post('restore', 'UsersController@restore')->name('users.trashed.restore');
            }); // END OF [ TRASHED ] PREFIX
            // ROUTE TO SHOW THE TRASHED USERS
            Route::get('trashed', 'UsersController@trashed')->name('users.trashed');
            // ROUTE TO DESTROY THE USERS [ SOFT DELETE ]
            Route::post('destroy', 'UsersController@destroy')->name('users.destroy');
            // ROUTE TO EXPORT FILES
            Route::get('export/{file}', 'UsersController@export')->name('users.export');
            // ROUTE TO LOAD THE FORM PAGE
            Route::get('import', 'UsersController@getImport')->name('users.import');
            // ROUTE TO Import FILES
            Route::post('import', 'UsersController@import')->name('users.import');
            // ROUTE TO AUTOCOMPLETE
            Route::get('autocomplete', 'UsersController@autoComplete')->name('users.autocomplete');
        }); // END OF [ USERS ] PREFIX
        // ALL ROUTES [ INDEX, CREATE, STORE, EDIT, UPDATE, SHOW ]
        Route::resource('users', 'UsersController')->except(['destroy']);
        // END ROUTES USERS MODE
        Route::resource('admins', 'AdminsController');

        Route::resource('test', 'TestController');
    }); // END OF 'DASHBOARD' PREFIX
});
