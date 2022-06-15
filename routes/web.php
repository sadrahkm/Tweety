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
Route::redirect('/', '/login');

Route::middleware('auth')->group(function () {
    Route::get('explore', 'ExploreController')->name('explore');
    Route::post('/tweets', 'TweetsController@store')->name('tweet.store');
    Route::delete('/tweets/{tweet}/delete', 'TweetsController@destroy')->name('tweet.delete');
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store')->name('like');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy')->name('dislike');
    Route::post('profile/{user}/follows', 'FollowsController@store')->name('follow');
    Route::get('profile/{user}/edit', 'ProfileController@edit')->name('edit')->middleware('can:edit,user');
    Route::patch('profile/{user}', 'ProfileController@update')->middleware('can:edit,user');
    Route::get('profile/{user}', 'ProfileController@show')->name('profile');
    Route::get('notifications','NotificationsController@index')->name('notifications');
});
Auth::routes();
