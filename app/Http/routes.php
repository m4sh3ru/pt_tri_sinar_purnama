<?php


Route::group(['middleware'=>'web'], function() {
	Route::get('/', 'HomeController@login');
	Route::post('auth_login','Auth\AuthController@authenticate')->name('auth_login');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix'=>'admin'], function () {
	Route::get('/', 'HomeController@index')->name('dashboard');
  	Route::get('logout', 'Auth\AuthController@log_out')->name('logout');
  
  #Special authorize for super user
  	Route::group(['middleware'=>'is_superuser'], function() {
	 	//route for User Registration
	 	Route::resource('user', 'Backend\UserController');
	 	Route::post('doAction','Backend\UserController@setStatus')->name('doAction');
	 	
	 	//Route for Divisi atau satuan kerja
	 	Route::resource('divisi', 'Backend\DivisiController');
 	 });

  	Route::get('ubah-kata-sandi','Backend\UserController@change_password')->name('ubahSandi');
  	Route::put('auth-ubah-kata-sandi','Backend\UserController@auth_change_password')->name('AuthUbahSandi');


  	Route::group(['middleware'=>[ 'is_manager']], function(){
		#Route for pegawai
		Route::resource('pegawai', 'Backend\KaryawanController');
	}); 

  	Route::group(['prefix'=>'laporan',], function(){
	 	Route::resource('kerusakan', 'Backend\KerusakanController'); 
	 	Route::post('doProses','Backend\KerusakanController@doProses')->name('doProses');
	 	Route::post('doUpload','Backend\KerusakanController@uploadScreenshot')->name('doUpload');

	 	Route::group(['prefix'=>'perbaikan', 'middleware'=>'is_manager'], function(){
			#Route for Perbaikan Menu
			Route::get('/', 'Backend\PerbaikanController@index')->name('perbaikan');
			Route::get('{id}/add_report', 'Backend\PerbaikanController@setReport')->name('add_report_perbaikan');
			Route::put('{id}/auth_report', 'Backend\PerbaikanController@authReport')->name('auth_report_perbaikan');
	 	}); 
  	});
	 
});
