<?php


Route::group(['middleware'=>'web'], function() {
	Route::get('/', 'HomeController@login');
	#Route::get('new_register', 'FrontEndController@sign_up')->name('new_register');
	/*Route::post('auth_register', 'FrontEndController@auth_signup')->name('auth_register');
	Route::get('login', function() {
		return view('frontend.login')->with('login_','class=active');
	})->middleware('guest');*/
	Route::post('auth_login','Auth\AuthController@authenticate')->name('auth_login');
});

Route::group(['middleware' => ['web', 'auth'], 'prefix'=>'admin'], function () {
	Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('logout', 'Auth\AuthController@log_out')->name('logout');

    //route for karyawan
    Route::resource('pegawai', 'Backend\KaryawanController');

    //route for User Registration
    Route::resource('user', 'Backend\UserController');
   	Route::post('doAction','Backend\UserController@setStatus')->name('doAction');

   	//Route for Divisi atau satuan kerja
   	Route::resource('divisi', 'Backend\DivisiController');

    //Route for Perangkat
    Route::resource('jenis_perangkat', 'Backend\JenisPerangkatController');    

    Route::group(['prefix'=>'laporan'], function(){
      Route::resource('kerusakan', 'Backend\KerusakanController'); 
      Route::post('doProses','Backend\KerusakanController@doProses')->name('doProses');

      Route::group(['prefix'=>'perbaikan'], function(){
        Route::get('/', 'Backend\PerbaikanController@index')->name('perbaikan');
        Route::get('{id}/add_report', 'Backend\PerbaikanController@setReport')->name('add_report_perbaikan');
        Route::put('{id}/auth_report', 'Backend\PerbaikanController@authReport')->name('auth_report_perbaikan');
      }); 
    });
    
});

