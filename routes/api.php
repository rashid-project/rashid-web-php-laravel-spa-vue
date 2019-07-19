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

Route::resource('task', 'TaskController');
Route::post('task/{task}/complete', 'Task\TaskCompletionController@complete')->name('task.complete');
Route::post('task/{task}/uncomplete', 'Task\TaskCompletionController@uncomplete')->name('task.uncomplete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * If we got to here we didn't match any API routes, but we want to return a 404 for any
 * unmatched routes with an /api prefix for debugging and consistency purposes as we know
 * those requests are not intended for the single page application
 */
Route::get('{any}', function () {
    abort(404);
});
