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
    return view('welcome');
});

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['is_send'])->group(function () {
        Route::post('/save_comment', 'HomeController@saveComment')->name('save_comment');
    });
    Route::get('/manager', 'HomeController@manager')->name('manager');
    Route::get('/client', 'HomeController@client')->name('client');
    Route::get('/comment/{comment}', 'CommentController@comment')->name('comment');
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/update_status_comment/{comment}', 'CommentController@updateStatusComment')->name('update_status_comment');
    });
});
