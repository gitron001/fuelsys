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

Route::get('/rfids', 'API\RfidController@getAllRfids');
Route::post('/rfids/create', 'API\RfidController@createRfid');

Route::get('/users', 'API\RfidController@getAllUsers');
Route::get('/users/create', 'API\RfidController@createUser');

Route::get('/payments', 'API\PaymentsController@getAllPayments');
Route::post('/payments/create', 'API\PaymentsController@createPayment');