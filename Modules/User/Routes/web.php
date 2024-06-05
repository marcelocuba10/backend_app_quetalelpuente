<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\QrCodeController;

Route::prefix('user')->group(function () {

    /** Dashboard */
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function () {

        /*** Social Auth Routes ***/
        Route::get('/auth/facebook/redirect', 'Auth\SocialAuthController@redirectFbToProvider');
        Route::get('/auth/facebook/callback', 'Auth\SocialAuthController@handleFbProviderCallback');
        Route::get('/auth/google/redirect', 'Auth\SocialAuthController@redirectGoogleToProvider');
        Route::get('/auth/google/callback', 'Auth\SocialAuthController@handleGoogleProviderCallback');

        /*** Login Routes ***/
        Route::get('/login', 'Auth\LoginController@show');
        Route::post('/login', 'Auth\LoginController@login');

        /*** Register Routes ***/
        Route::get('/register', 'Auth\RegisterController@show');
        Route::post('/register', 'Auth\RegisterController@register');

        /*** Recovery Routes ***/
        Route::get('/recovery-options', 'Auth\ForgotPasswordController@showRecoveryOptionsForm');
        Route::get('/forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm');
        Route::post('/forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm');
        Route::get('/reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm');
        Route::post('/reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm');

        /*** Bancard Routes ***/
        Route::group(['prefix' => 'bancard'], function () {
            Route::post('/prod/payments/confirm', 'BancardController@singleBuyConfirm');
        });
    });

    Route::group(['middleware' => ['auth:web']], function () {

        /** Dashboard */
        Route::get('/dashboard', 'HomeController@index');
        Route::get('/logout', 'Auth\LogoutController@perform');

        /*** Webcams Routes ***/
        Route::group(['prefix' => 'webcams'], function () {
            Route::get('/', 'WebcamsController@index');
            Route::get('/create', 'WebcamsController@create');
            Route::post('/create', 'WebcamsController@store');
            Route::get('/show/{id}', 'WebcamsController@show');
            Route::get('/edit/{id}', 'WebcamsController@edit');
            Route::put('/update/{id}', 'WebcamsController@update');
            Route::delete('/delete/{id}', 'WebcamsController@destroy');
            Route::get('/search', 'WebcamsController@search');
        });

        /*** User Routes ***/
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index');
            Route::get('/show/{id}', 'UserController@show');
            Route::get('/profile/{id}', 'UserController@showProfile');
            Route::get('/edit/profile/{id}', 'UserController@editProfile');
            Route::put('/update/profile/{id}', 'UserController@updateProfile');
            Route::get('/search', 'UserController@search');
            Route::post('/profile/update-photo', 'UserController@updatePhotoProfile');
            /*** News Cards Bancard */
            Route::get('/payment_methods/new_card/', 'BancardController@newCard');
            Route::get('/payment_methods/new_card/confirm', 'BancardController@getNewCardConfirmation');
            /*** Delete Card Bancard */
            Route::delete('/payment_methods/delete/card/{cardId}', 'BancardController@deleteCard');
        });

        /*** ACL Routes ***/
        Route::group(['prefix' => 'ACL'], function () {
            Route::group(['prefix' => 'roles'], function () {
                Route::get('/', 'ACL\RolesController@index');
                Route::get('/create', 'ACL\RolesController@create');
                Route::post('/create', 'ACL\RolesController@store');
                Route::get('/show/{id}', 'ACL\RolesController@show');
                Route::get('/edit/{id}', 'ACL\RolesController@edit');
                Route::put('/update/{id}', 'ACL\RolesController@update');
                Route::delete('/delete/{id}', 'ACL\RolesController@destroy');
                Route::get('/search', 'ACL\RolesController@search');
            });

            Route::group(['prefix' => 'permissions'], function () {
                Route::get('/', 'ACL\PermissionsController@index');
                Route::any('/get', 'ACL\PermissionsController@getPermissions');
                Route::get('/create', 'ACL\PermissionsController@create');
                Route::post('/create', 'ACL\PermissionsController@store');
                Route::get('/{id}/show', 'ACL\PermissionsController@show');
                Route::get('/edit/{id}', 'ACL\PermissionsController@edit');
                Route::put('/update/{id}', 'ACL\PermissionsController@update');
                Route::delete('/{id}/delete', 'ACL\PermissionsController@destroy');
                Route::get('/search', 'ACL\PermissionsController@search');
            });
        });
    });
});
