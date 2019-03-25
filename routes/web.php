<?php

Auth::routes();

Route::resource('/', 'HomeController');
Route::resource('/admin/transactions', 'TransactionController');
Route::view('transactions-info','admin.transactions.transactions-info',[
		'transactions' => App\Models\Transaction::orderBy('created_at', 'DESC')->limit(15)->get()
	]);

//Change language
Route::get('locale/{locale}',function($locale){
		Session::put('locale',$locale);
		return redirect()->back();
	});

Route::group(['middleware' => 'authenticated'], function () {

    Route::resource('/admin/companies', 'CompaniesController');
	Route::resource('/admin/tanks', 'TankController');
	Route::resource('/admin/products', 'ProductController');
	Route::resource('/admin/dispanesers', 'DispaneserController');
	Route::resource('/admin/branches', 'BranchController');
	Route::resource('/admin/users', 'UsersController');
	Route::resource('/admin/payments', 'PaymentsController');
	Route::resource('/admin/pfc', 'PFCController');
	Route::resource('/admin/settings', 'SettingsController');

	Route::post('/transaction/excel_export', 'TransactionController@excel_export');

	Route::get('/search','TransactionController@search');
	Route::get('/export','TransactionController@excel_export');

});




