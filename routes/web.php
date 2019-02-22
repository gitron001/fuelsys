<?php

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


Route::resource('/', 'HomeController');

//Route::get('admin/user', 'UserController@index');

Route::resource('/admin/companies', 'CompaniesController');
Route::resource('/admin/users', 'UserController');
Route::resource('/admin/tanks', 'TankController');
Route::resource('/admin/transactions', 'TransactionController');
Route::resource('/admin/products', 'ProductController');
Route::resource('/admin/dispanesers', 'DispaneserController');
Route::resource('/admin/branches', 'BranchController');
Route::resource('/admin/rfids', 'RfidController');

Route::get('locale/{locale}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});