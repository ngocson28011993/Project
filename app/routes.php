<?php

Route::get('/', array('as' => 'homepage', 'uses' => 'HomeController@index'));

/**
 * UnAuthenticated group
 */
Route::group(array('before' => 'guest'), function() {
    Route::group(array('before' => 'csrf'), function() {
        Route::post('/login', array('as' => 'login-submit', 'uses' => 'UsersController@doLogin'));
    });

    Route::get('/login', array('as' => 'login', 'uses' => 'UsersController@login'));
});

/**
 * Authenticated group
 */
Route::group(array('before' => 'auth'), function() {
    Route::group(array('before' => 'csrf'), function() {

    });

    Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
});


/********************************************************
 *                      Admin area
 ********************************************************/

Route::group(array('prefix' => 'admin'), function() {

    Route::group(array('before' => 'csrf'), function () {
        Route::post('/login', array('as' => 'admin.adUser.doLogin', 'uses' => 'AdUsersController@doLogin'));
    });
    Route::get('/login', array('as' => 'admin.adUser.login', 'uses' => 'AdUsersController@login'));


    Route::group(array('before' => 'auth.admin'), function () {

        Route::resource('dashboard', 'AdDashboardController');
        Route::resource('adUser', 'AdUsersController');
        Route::resource('adRole', 'AdRolesController');
        Route::resource('adFile', 'AdFileUploadController');
        Route::resource('adPost', 'AdPostController');

        Route::get('/logout', array('as' => 'admin.adUser.logout', 'uses' => 'AdUsersController@logout'));
        Route::get('/adRole/{adRole}/delete', array('as' => 'admin.adRole.delete', 'uses' => 'AdRolesController@destroy'));
        Route::get('/adUser/{adUser}/delete', array('as' => 'admin.adUser.delete', 'uses' => 'AdUsersController@destroy'));
    });

});
