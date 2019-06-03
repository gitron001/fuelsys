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

	// Companies
    Route::resource('/admin/companies', 'CompaniesController');
    Route::get('company/{id}/delete', ['as' => 'company.delete', 'uses' => 'CompaniesController@destroy']);

    // Tank 
	Route::resource('/admin/tanks', 'TankController');
	Route::get('tank/{id}/delete', ['as' => 'tank.delete', 'uses' => 'TankController@destroy']);

	// Products
	Route::resource('/admin/products', 'ProductController');
	Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'ProductController@destroy']);

	// Dispanesers
	Route::resource('/admin/dispanesers', 'DispaneserController');
	Route::get('dispaneser/{id}/delete', ['as' => 'dispaneser.delete', 'uses' => 'DispaneserController@destroy']);

	// Branches
	Route::resource('/admin/branches', 'BranchController');
	Route::get('branch/{id}/delete', ['as' => 'branch.delete', 'uses' => 'BranchController@destroy']);

	// Users
	Route::resource('/admin/users', 'UsersController');
	Route::get('user/{id}/delete', ['as' => 'user.delete', 'uses' => 'UsersController@destroy']);

	// Payments
	Route::resource('/admin/payments', 'PaymentsController');
	Route::get('payment/{id}/delete', ['as' => 'payment.delete', 'uses' => 'PaymentsController@destroy']);
	Route::get('/payment/generate/{$id}','PaymentsController@printFunction');

	// PFC 
	Route::resource('/admin/pfc', 'PFCController');
	Route::get('pfc/{id}/delete', ['as' => 'pfc.delete', 'uses' => 'PFCController@destroy']);
	Route::post('/admin/pfc/import_data/{pfc_id}/{command_id}', 'PFCController@import_data')->name('admin/pfc/import_data');

	// Settings
	Route::resource('/admin/settings', 'SettingsController');

	// Transactions - Generate EXCEL & PDF 
	Route::post('/transaction/excel_export', 'TransactionController@excel_export');
    //Route::post('/admin/pfc/command/{pfc_id}/{command_id}', 'PFCController@import_data')->name('admin/pfc/command');
    Route::get('/admin/pfc/command/{pfc_id}/{command_id}', ['as' => 'pfc.command', 'uses' => 'PFCController@import_data']);
	Route::get('/search','TransactionController@search');
	Route::get('/export','TransactionController@excel_export');
	Route::get('/admin/transactions','TransactionController@searchWithPagination');

	Route::get('/pdf','TransactionController@exportPDF');

	// Email
	Route::get('/sendemail','HomeController@email');

	// Reports
	//Route::resource('/admin/reports', 'ReportsController');
	Route::get('/search','ReportsController@search');
	Route::get('/admin/reports','ReportsController@searchWithPagination');

	// Settings
	Route::get('/admin/staff','StaffController@searchWithPagination');
	//Route::get('/admin/staff','StaffController@searchWithPagination');

});









