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
Route::post('/rfids/create', 'API\RfidController@createUser');

Route::post('/save/rfid', 'API\RfidController@saveRFID');

Route::get('/users', 'API\RfidController@getAllUsers');
Route::get('/users/create', 'API\RfidController@createUser');

Route::get('/payments', 'API\PaymentsController@getAllPayments');
Route::post('/payments/create', 'API\PaymentsController@createPayment');

Route::get('/rfids/import', 'API\RfidController@importAllRfids');
Route::post('/rfids/import_server', 'API\RfidController@importRFID');

Route::post('/transactions/create', 'API\TransactionsController@importTransactions');

Route::get('/companies', 'API\CompaniesController@exportCompanies');
Route::post('/companies/create', 'API\CompaniesController@createCompany');
Route::post('/company/import', 'API\CompaniesController@importCompanyFromServer');

Route::get('/payments', 'API\PaymentsController@getAllPayments');
Route::post('/payments/create', 'API\PaymentsController@createPayment');

Route::post('/payments/export_server', 'API\PaymentsController@sendServerPayments');
