<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function () {
    
    //Cookies
    Route::post('accept_cookies', 'Main_Controller@acceptCookies');

    //Auth Routes
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::post('auth/register', 'Auth\AuthController@postRegister');

    //Main Routes
    Route::get('/', 'Main_Controller@mainView');

    //Story Routes
    Route::post('post_story', 'Stories_Controller@newStory');
    Route::post('post_images', 'Stories_Controller@newImages');
    Route::post('get_story', 'Stories_Controller@getStory');
    Route::post('edit_story', 'Stories_Controller@editStory');
    Route::post('edit_story2', 'Stories_Controller@editStory2');
    Route::post('delete_image', 'Stories_Controller@deleteImage');
    Route::post('delete_story', 'Stories_Controller@deleteStory');
    Route::post('change_story_lang', 'Stories_Controller@changeLang');
    Route::post('more_image', 'Stories_Controller@moreImage');
    
    //Videos Routes
    Route::post('upload_video', 'Videos_Controller@uploadVideo');
    Route::post('delete_video', 'Videos_Controller@deletelVideo');
    
    //Test Routes
    Route::get('test', function(){
        return view('layouts.test');
    });

    //Email Routes
    Route::post('send_email', 'Email_Controller@sendMail');
});
