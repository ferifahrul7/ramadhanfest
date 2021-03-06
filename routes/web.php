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

use App\Models\Transaksi;

Route::get('/', function () {

    $pengunjung['in'] = Transaksi::where('status','in')->sum('jumlah_peserta');
    $pengunjung['daftar'] = Transaksi::where('status','pendaftaran')->sum('jumlah_peserta');
    $pengunjung['out'] = Transaksi::where('status','out')->sum('jumlah_peserta');
    return view('welcome',compact('pengunjung'));
})->name('welcome');

Auth::routes();

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/pendaftaran', 'PendaftaranController@create')->name('pendaftaran.create');
    Route::post('/pendaftaran', 'PendaftaranController@store')->name('pendaftaran.store');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    //roles
    Route::resource('roles', 'RoleController');


    //aktivitas
    Route::get('aktivitas-pengunjung', 'AktivitasController@index')->name('aktivitas.index');
    Route::get('aktivitas-pengunjung-ajax', 'AktivitasController@indexAjax');

    //peserta
    Route::resource('peserta', 'PesertaController');
    Route::get('peserta-ajax', 'PesertaController@indexAjax');
    Route::delete('ajax/peserta/destroy', 'PesertaController@destroyAjax');

    //Entry (masuk)
    Route::get('entry-in','EntryController@entryIn')->name('entry.in');
    Route::get('entry-out','EntryController@entryOut')->name('entry.out');
    Route::post('entry-out','EntryController@entryOutAction')->name('entry.out.post');
    Route::post('entry-in','EntryController@entryInAction')->name('entry.in.post');
    Route::post('entry-search','EntryController@entrySearch')->name('entry.search');

    Route::post('transaksi-detail-get','TransaksiController@getByCode')->name('transaksi-detail.get');


    //user
    Route::resource('users', 'UserController');
    Route::get('roles/check/{id}', 'RoleController@check')->name('roles.check');

    //wilayah

    Route::post('select-kabupaten', 'WilayahController@selectKabupaten')->name('select-kabupaten');
    Route::post('select-kecamatan', 'WilayahController@selectKecamatan')->name('select-kecamatan');
    Route::post('select-kelurahan', 'WilayahController@selectKelurahan')->name('select-kelurahan');
});
