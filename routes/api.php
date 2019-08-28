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

Route::get('/list/rfid', 'API\RfidController@index');
Route::get('/list/save_rfid', 'API\RfidController@save');

Route::get('/payments', 'API\PaymentsController@getAllPayments');
Route::post('/payments/create', 'API\PaymentsController@createPayment');