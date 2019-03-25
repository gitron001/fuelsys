<?php




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/', 'HomeController');
Route::resource('/admin/transactions', 'TransactionController');
Route::view('transactions-info','admin.transactions.transactions-info',[
		'transactions' => App\Models\Transaction::orderBy('created_at', 'DESC')->limit(15)->get()
	]);


Route::group(['middleware' => 'authenticated'], function () {

    Route::resource('/admin/companies', 'CompaniesController');
	Route::resource('/admin/tanks', 'TankController');
	Route::resource('/admin/products', 'ProductController');
	Route::resource('/admin/dispanesers', 'DispaneserController');
	Route::resource('/admin/branches', 'BranchController');
	Route::resource('/admin/users', 'UsersController');
	Route::resource('/admin/payments', 'PaymentsController');
	Route::resource('/admin/pfc', 'PFCController');

	Route::post('/transaction/excel_export', 'TransactionController@excel_export');

	Route::get('locale/{locale}',function($locale){
		Session::put('locale',$locale);
		return redirect()->back();
	});

	Route::get('/search','TransactionController@search');
	Route::get('/export','TransactionController@excel_export');

	// Test Printer Here
	Route::get('/admin/test/{id}', 'PaymentsController@printFunction');

});




