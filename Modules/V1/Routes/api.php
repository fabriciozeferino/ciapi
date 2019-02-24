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

Route::middleware('api')->get('/v1', function (Request $request) {
    return 'Hello from CI API';
});

Route::group(
    [

        'middleware' => ['api']

    ],
    function () {
        Route::post('project', 'Controller@store');
    }
);
