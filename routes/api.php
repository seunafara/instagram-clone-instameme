<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['photo' => 'API\PhotoController']); // deals with everything uploading and viewing photos
//Route::get('/photo/{id}', 'API\PhotoController@likePhoto');


Route::apiResources(['user' => 'API\UserController']);
Route::get('getuser', 'API\UserController@getUser'); // get current user data
Route::get('countposts', 'API\UserController@countPosts'); // count current user posts
Route::get('showposts', 'API\UserController@showPosts'); // show current user posts in profile
Route::put('profile', 'API\UserController@updateProfile'); // update user profile information