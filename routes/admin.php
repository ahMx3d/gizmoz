<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// ADMIN ROUTES FILE HAS A PREFIX OF 'admin'

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath'
        ]
    ],
    function () {

        ############################# START AUTHENTICATION ROUTES #################
        Route::group(
            [
                'namespace' => 'Admin',
                'middleware' => 'auth:admin',
                'prefix' => 'admin'
            ],
            function () {

                // AUTHENTICATED ADMIN'S DASHBOARD
                Route::get(
                    '/',
                    'DashboardController@index'
                )->name('admin.dashboard');

                ###################### START SETTINGS ROUTES ####################
                Route::group(
                    [
                        'prefix' => 'settings'
                    ],
                    function () {
                        // EDIT SHIPPING METHODS
                        Route::get(
                            'shipping-methods/{type}',
                            'SettingsController@editShippingMethods'
                        )->name('edit.shipping.methods');

                        // UPDATE SHIPPING METHODS
                        Route::put(
                            'shipping-methods/{id}',
                            'SettingsController@updateShippingMethods'
                        )->name('update.shipping.methods');
                    }
                );
                ###################### END SETTINGS ROUTES ######################

            }
        );
        ####################### END AUTHENTICATION ROUTES #######################

        ############################## START GUEST ROUTES #######################
        Route::group(
            [
                'namespace' => 'Admin',
                'middleware' => 'guest:admin',
                'prefix' => 'admin'
            ],
            function () {

                // ADMIN'S LOGIN FORM VIEW
                Route::get(
                    'login',
                    'LoginController@index'
                )->name('admin.login');

                // ADMIN'S LOGIN FORM SUBMITTING
                Route::post(
                    'login',
                    'LoginController@login'
                )->name('post.admin.login');
            }
        );
        ############################# END GUEST ROUTES ##########################

    }
);
