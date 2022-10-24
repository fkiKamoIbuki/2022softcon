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
Route::get('spot/index','App\Http\Controllers\SpotController@index')->name('spot.index');
Route::post('spot/index','App\Http\Controllers\SpotController@post')->name('spot.index');
Route::get('spot/gallery','App\Http\Controllers\SpotController@gallery')->name('spot.gallery');
Route::post('spot/gallery','App\Http\Controllers\SpotController@postgallery')->name('spot.gallery');
Route::get('spot/posts','App\Http\Controllers\SpotController@posts')->name('spot.posts');
Route::post('spot/posts','App\Http\Controllers\SpotController@postposts')->name('spot.posts');
Route::get('spot/addposts','App\Http\Controllers\SpotController@addposts')->name('spot.addposts');
Route::post('spot/addposts','App\Http\Controllers\SpotController@postaddposts')->name('spot.addposts');
Route::get('spot/signup',['uses' => 'App\Http\Controllers\SpotController@getSignup','as' => 'spot.signup']);
Route::post('spot/signup',['uses' => 'App\Http\Controllers\SpotController@postSignup','as' => 'spot.signup']);
Route::get('spot/signin',['uses' => 'App\Http\Controllers\SpotController@getSignin','as' => 'spot.signin']);
Route::post('spot/signin',['uses' => 'App\Http\Controllers\SpotController@postSignin','as' => 'spot.signin']);
Route::get('spot/logout',['uses' => 'App\Http\Controllers\SpotController@getLogout','as' => 'spot.logout']);
Route::get('spot/viewvideo',['uses' => 'App\Http\Controllers\SpotController@viewvideo','as' => 'spot.viewvideo']);
Route::get('spot/video',['uses' => 'App\Http\Controllers\SpotController@video','as' => 'spot.video']);
Route::post('spot/video',['uses' => 'App\Http\Controllers\SpotController@postvideo','as' => 'spot.video']);
Route::get('spot/tamesi',['uses' => 'App\Http\Controllers\SpotController@tamesi','as' => 'spot.tamesi']);
// Route::post('spot/tamesi',['uses' => 'App\Http\Controllers\SpotController@posttamesi','as' => 'spot.tamesi']);
Route::get('spot/', function () {return redirect('spot/index');});
// Route::group(['middleware' => 'auth'],function(){
//     Route::get('spot/logout',['uses' => 'App\Http\Controllers\SpotController@getLogout','as' => 'spot.logout']);
//     Route::get('spot/index','App\Http\Controllers\SpotController@index')->name('spot.index');
//     Route::post('spot/index','App\Http\Controllers\SpotController@post')->name('spot.index');
//     Route::get('spot/gallery','App\Http\Controllers\SpotController@gallery')->name('spot.gallery');
//     Route::post('spot/gallery','App\Http\Controllers\SpotController@postgallery')->name('spot.gallery');
// });
Route::group(['middleware' => 'guest'], function(){

    //登録
    Route::get('spot/signup',['uses' => 'App\Http\Controllers\SpotController@getSignup','as' => 'spot.signup']);
    Route::post('spot/signup',['uses' => 'App\Http\Controllers\SpotController@postSignup','as' => 'spot.signup']);
    //ログイン
    Route::get('spot/signin',['uses' => 'App\Http\Controllers\SpotController@getSignin','as' => 'spot.signin']);
    Route::post('spot/signin',['uses' => 'App\Http\Controllers\SpotController@postSignin','as' => 'spot.signin']);
});

Route::get('spot/boot','App\Http\Controllers\SpotController@boot')->name('spot.boot');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('spot/support','App\Http\Controllers\SpotController@support')->name('spot.support');
