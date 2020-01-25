<?php

Auth::routes();

Route::resource('/', 'HomeController');
Route::get('transactions-info', 'TransactionController@info');

//Change language
Route::get('locale/{locale}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});


Route::group(['middleware' => 'authenticated'], function () {

	// Companies
    Route::resource('/admin/companies', 'CompaniesController');
    Route::get('company/{id}/delete', ['as' => 'company.delete', 'uses' => 'CompaniesController@destroy']);
    Route::get('/admin/companies-delete-all', 'CompaniesController@delete_all');

    // Tank
	Route::resource('/admin/tanks', 'TankController');
    Route::get('tank/{id}/delete', ['as' => 'tank.delete', 'uses' => 'TankController@destroy']);
    Route::get('/admin/tanks-delete-all', 'TankController@delete_all');

	// Products
	Route::resource('/admin/products', 'ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'ProductController@destroy']);
    Route::get('/admin/products-delete-all', 'ProductController@delete_all');

	// Products Group
	Route::resource('/admin/products_group', 'ProductGroupController');
    Route::get('product_group/{id}/delete', ['as' => 'product_group.delete', 'uses' => 'ProductGroupController@destroy']);
    Route::get('/admin/products_group-delete-all', 'ProductGroupController@delete_all');

	// Dispanesers
	Route::resource('/admin/dispanesers', 'DispaneserController');
    Route::get('dispaneser/{id}/delete', ['as' => 'dispaneser.delete', 'uses' => 'DispaneserController@destroy']);
    Route::get('/admin/dispanesers-delete-all', 'DispaneserController@delete_all');

	// Branches
	Route::resource('/admin/branches', 'BranchController');
    Route::get('branch/{id}/delete', ['as' => 'branch.delete', 'uses' => 'BranchController@destroy']);
    Route::get('/admin/branches-delete-all', 'BranchController@delete_all');

	// Users
	Route::resource('/admin/users', 'UsersController');
	Route::get('user/{id}/delete', ['as' => 'user.delete', 'uses' => 'UsersController@destroy']);
	Route::get('/admin/uploadExcel', 'UsersController@uploadExcel');
	Route::post('/import_excel/import', 'UsersController@importExcel');
	Route::get('/admin/bonus_members', 'UsersController@bonus_members');
    Route::post('/update_card/update', 'UsersController@updateCard');
    Route::get('/admin/users-delete-all', 'UsersController@delete_all');

	// Payments
	Route::resource('/admin/payments', 'PaymentsController');
	Route::get('payment/{id}/delete', ['as' => 'payment.delete', 'uses' => 'PaymentsController@destroy']);
    Route::get('/payment-receipt','PaymentsController@printFunction');
    Route::get('/admin/payments-delete-all', 'PaymentsController@delete_all');

	// PFC
	Route::resource('/admin/pfc', 'PFCController');
	Route::get('pfc/{id}/delete', ['as' => 'pfc.delete', 'uses' => 'PFCController@destroy']);
    Route::post('/admin/pfc/import_data/{pfc_id}/{command_id}', 'PFCController@import_data')->name('admin/pfc/import_data');
    Route::get('/admin/pfc-delete-all', 'PFCController@delete_all');

	// Settings
    Route::resource('/admin/settings', 'SettingsController');
    Route::get('/delete_process', 'SettingsController@delete_process');
    Route::get('/get_refresh_time', 'SettingsController@get_refresh_time');

    // Transactions
    Route::get('/admin/transactions','TransactionController@searchWithPagination');
    // Transactions - Genrate bill
    Route::get('/transaction-email/{id}','CompaniesController@send_email');
    Route::get('/transaction-receipt','TransactionController@printFunction');

	// Transactions - Generate EXCEL & PDF
	Route::post('/transaction/excel_export', 'TransactionController@excel_export');
    //Route::post('/admin/pfc/command/{pfc_id}/{command_id}', 'PFCController@import_data')->name('admin/pfc/command');
    Route::get('/admin/pfc/command/{pfc_id}/{command_id}', ['as' => 'pfc.command', 'uses' => 'PFCController@import_data']);
	Route::get('/search','TransactionController@search');
	Route::get('/export','TransactionController@excel_export');

	//Route::get('/admin/transactions','TransactionController@searchWithPagination');
	Route::get('/dailyReport','TransactionController@generateDailyReport');

	Route::get('/pdf','TransactionController@exportPDF')->name('generate_pdf/pdf');

	// Email
	Route::get('/sendemail','HomeController@email');

	// Reports
	//Route::resource('/admin/reports', 'ReportsController');
	Route::get('/search','ReportsController@search');
	Route::get('/admin/reports','ReportsController@searchWithPagination');

	// Settings
	//Route::get('/admin/staff','StaffController@searchWithPagination');
	//Route::get('/admin/staff','StaffController@searchWithPagination');
    Route::get('/admin/staff','StaffController@staff_view');
    Route::get('/excel_export_staff_view','StaffController@export_excel');

    // Staff
    Route::post('/close_shift','StaffController@close_shift');

	Route::post('sender','PusherController@sender');

	// Export RFID to Server
	Route::get('/api/rfids','API\RfidController@getAllRfids');

	// Import RFID from Server
	Route::get('/api/rfids/import','API\RfidController@importAllRfids');

	// Export Transactions to Server
	Route::get('/api/transactions','API\TransactionsController@getAllTransactions');

	// Export Companies to Server
	Route::get('/api/companies','API\CompaniesController@exportCompanies');

	// Import Companies from Server
	Route::get('/api/company/import','API\CompaniesController@getCompanyFromServer');

	// Export Payments to Server
	Route::get('/api/payments','API\PaymentsController@getAllPayments');

	// Import Payments from Server
	Route::get('/api/payments-import','API\PaymentsController@getServerPayments');

	// Show failed attemps
	Route::get('/failed-attempts','SettingsController@failed_attempts');

	Route::match(array('GET', 'POST'),'/tracking_command', 'SettingsController@tracking_commands' );


});
