<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
|
*/

use Illuminate\Support\Facades\Route;

Route::get(config('master.aplikasi.author').'/{folder}/{file}', 'jsController@backend');
Route::get(config('master.aplikasi.author').'/{folder}/{id}/{file}', 'jsController@backendWithId');
Route::get(config('master.aplikasi.author').'/{folder}/{id}/{id2}/{id3}/{file}', 'jsController@backendWithId3');
Route::get(config('master.aplikasi.author').'/{folder}/{link}/{kode}/{file}', 'jsController@backendWithKode');

Route::get('/home', 'berandaController@index')->name('beranda.home');
Route::group(['prefix' => config('master.url.admin')], function () {
	// dashboard - beranda
	Route::get('/', 'berandaController@index')->name('beranda.index');

	// Url Public
    Route::group(['middleware' => ['throttle:5']], function () {
		Route::post('lock-screen', 'userController@lockScreen');
    });
	//user ubah password
	Route::get('user/ubahpassword/{id}', 'userController@ubahpassword')->name('user.ubahpassword');
	Route::group(['middleware' => ['throttle:10']], function () {
		Route::post('user/ubahpassword', 'userController@resetpassword')->name('user.store_ubahpassword');
	});
	Route::group(['middleware' => ['aksesmenu']], function () {
        //user
        Route::get('user/hapus/{id}', 'userController@hapus')->name('user.hapus');
        Route::get('user/data', 'userController@data')->name('user.data');
        Route::resource('user', 'userController');
        //menu
        Route::get('menu/hapus/{id}', 'menuController@hapus')->name('menu.hapus');
        Route::get('menu/data', 'menuController@data')->name('menu.data');
        Route::post('menu/susun-menu', 'menuController@susunMenu')->name('menu.susun-menu');
        Route::get('menu/extract-menu', 'menuController@extract')->name('menu.extract-menu');
        Route::resource('menu', 'menuController');
        //aksesgrup
        Route::get('aksesgrup/hapus/{id}', 'aksesgrupController@hapus')->name('aksesgrup.hapus');
        Route::get('aksesgrup/data', 'aksesgrupController@data')->name('aksesgrup.data');
        Route::get('aksesgrup/detail/data/{id}', 'aksesgrupController@data_detail')->name('aksesgrup.data_detail');
        Route::resource('aksesgrup', 'aksesgrupController');
        //aksesmenu
        Route::get('aksesmenu/data/{id}', 'aksesmenuController@data')->name('aksesmenu.data');
        Route::get('aksesmenu/create/{id}', 'aksesmenuController@create')->name('aksesmenu.create_id');
        Route::resource('aksesmenu', 'aksesmenuController');
        
        // slider
        Route::prefix('slider')->as('slider')->group(function () {
            Route::get('/data', 'sliderController@data');
            Route::get('/hapus/{id}', 'sliderController@hapus');
        });
        Route::resource('slider', 'sliderController');

        // kontak
        Route::prefix('kontak')->as('kontak')->group(function () {
            Route::get('/data', 'kontakController@data');
            Route::get('/hapus/{id}', 'kontakController@hapus');
        });
        Route::resource('kontak', 'kontakController');
        
        // posts
        Route::prefix('posts')->as('posts')->group(function () {
            Route::get('/data', 'PostsController@data');
            Route::get('/hapus/{id}', 'PostsController@hapus');
        });
        Route::resource('posts', 'PostsController');

        // aplikasi
        Route::prefix('aplikasi')->as('aplikasi')->group(function () {
            Route::get('/data/{id?}', 'aplikasiController@data');
            Route::get('/logo/{id}', 'aplikasiController@logo');
            Route::post('/store_logo', 'aplikasiController@store_logo');
            Route::get('/favicon/{id}', 'aplikasiController@favicon');
            Route::post('/store_favicon', 'aplikasiController@store_favicon');
        });
        Route::resource('aplikasi', 'aplikasiController');   

		Route::prefix('jabatans')->as('jabatans')->group(function () {
			Route::get('/data', 'JabatansController@data');
			Route::get('/hapus/{id}', 'JabatansController@hapus');
		});
		Route::resource('jabatans', 'JabatansController');

		Route::prefix('pegawais')->as('pegawais')->group(function () {
			Route::get('/data', 'PegawaisController@data');
			Route::get('/hapus/{id}', 'PegawaisController@hapus');
		});
		Route::resource('pegawais', 'PegawaisController');

		Route::prefix('riwayatjabatans')->as('riwayatjabatans')->group(function () {
			Route::get('/data', 'RiwayatJabatansController@data');
			Route::get('/hapus/{id}', 'RiwayatJabatansController@hapus');
		});
		Route::resource('riwayatjabatans', 'RiwayatJabatansController');

		Route::prefix('pendidikans')->as('pendidikans')->group(function () {
			Route::get('/data', 'PendidikansController@data');
			Route::get('/hapus/{id}', 'PendidikansController@hapus');
		});
		Route::resource('pendidikans', 'PendidikansController');

		Route::prefix('berkaspegawais')->as('berkaspegawais')->group(function () {
			Route::get('/data/{id?}/{idpeg?}', 'BerkasPegawaisController@data');
			Route::get('/create/{id?}', 'BerkasPegawaisController@create');
			Route::get('/hapus/{id}', 'BerkasPegawaisController@hapus');
			Route::get('/lihat/{id}', 'BerkasPegawaisController@lihat');
			Route::get('/index/{id}', 'BerkasPegawaisController@show');
		});
		Route::resource('berkaspegawais', 'BerkasPegawaisController');

		Route::prefix('berkaspegawaisadmin')->as('berkaspegawaisadmin')->group(function () {
			Route::get('/data/{id?}/{idpeg?}', 'BerkasPegawaisAdminController@data');
			Route::get('/create/{id?}/{idpeg?}', 'BerkasPegawaisAdminController@create');
			Route::get('/hapus/{id}', 'BerkasPegawaisAdminController@hapus');
			Route::get('/index/{id}/{idpeg}', 'BerkasPegawaisAdminController@show');
			Route::get('/lihat/{id}', 'BerkasPegawaisController@lihat');
		});
		Route::resource('berkaspegawaisadmin', 'BerkasPegawaisAdminController');

		Route::prefix('bidangs')->as('bidangs')->group(function () {
			Route::get('/data', 'BidangsController@data');
			Route::get('/hapus/{id}', 'BidangsController@hapus');
		});
		Route::resource('bidangs', 'BidangsController');

		Route::prefix('berkas')->as('berkas')->group(function () {
			Route::get('/data/{id?}', 'BerkasController@data');
			Route::get('/hapus/{id}', 'BerkasController@hapus');
		});
		Route::resource('berkas', 'BerkasController');

		Route::prefix('berkasadmin')->as('berkasadmin')->group(function () {
			Route::get('/data/{id?}', 'BerkasController@data');
			Route::get('/{id}', 'BerkasController@show_admin');
		});
		// Route::resource('berkas', 'BerkasController');

		Route::prefix('jenisberkas')->as('jenisberkas')->group(function () {
			Route::get('/data', 'JenisBerkasController@data');
			Route::get('/hapus/{id}', 'JenisBerkasController@hapus');
		});
		Route::resource('jenisberkas', 'JenisBerkasController');

		Route::prefix('kenaikans')->as('kenaikans')->group(function () {
			Route::get('/data', 'KenaikansController@data');
			Route::get('/hapus/{id}', 'KenaikansController@hapus');
		});
		Route::resource('kenaikans', 'KenaikansController');

	});
});
