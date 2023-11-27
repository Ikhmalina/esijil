<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');

   
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() { 

   
    Route::get('/sijil/index', 'SijilController@index')->name('sijil.index');
    
    // PENGGUNA
    Route::get('/pengguna/listpengguna', 'PenggunaController@show')->name('list.pengguna');

    Route::get('/pengguna/daftarpengguna', 'PenggunaController@create')->name('daftar.pengguna');

    Route::post('/pengguna/daftarpengguna', 'PenggunaController@store')->name('daftar');
    
    Route::get('/pengguna/{id}/editpengguna', 'PenggunaController@editPengguna')->name('edit.pengguna');
    
    Route::post('/pengguna/editpengguna', 'PenggunaController@updatePengguna')->name('update.pengguna');

    Route::get('/pengguna/{id}/deletepengguna', 'PenggunaController@destroy')->name('delete.pengguna');


    // PAPER 
    Route::get('/paper/listpaper', 'PaperController@showpaper')->name('list.paper');

    Route::get('/paper/createpaper', 'PaperController@createpaper')->name('create.paper');

    Route::post('/paper/createpaper', 'PaperController@storepaper')->name('save.paper');

    Route::get('/paper/{id}/editpaper', 'PaperController@editpaper')->name('edit.paper');
    
    Route::post('/paper/editpaper', 'PaperController@updatepaper')->name('update.paper');
    
    Route::get('/paper/{id}/deletepaper', 'PaperController@deletepaper')->name('delete.paper');
    
    //SIJIL

    Route::get('/sijil/listsijil', 'SijilController@showsijil')->name('list.sijil');
    
    Route::get('/sijil/createsijil', 'SijilController@createsijil')->name('create.sijil');

    Route::post('/sijil/createsijil', 'SijilController@storesijil')->name('save.sijil');

    Route::get('/sijil/{id}/editsijil', 'SijilController@editsijil')->name('edit.sijil');
    
    Route::post('/sijil/editsijil', 'SijilController@updatesijil')->name('update.sijil');
    
    Route::get('/sijil/{id}/deletesijil', 'SijilController@deletesijil')->name('delete.sijil');

    Route::get('/sijil/search', 'SijilController@searchsijil')->name('search.sijil');

    
    
    //PESERTA

    Route::get('/peserta/listpeserta', 'PesertaController@listpeserta')->name('list.peserta');
    
    Route::get('/peserta/{id}/createpeserta', 'PesertaController@createpeserta')->name('create.peserta');

    Route::post('/peserta/createpeserta', 'PesertaController@storepeserta')->name('save.peserta');

    Route::get('/peserta/{id}/editpeserta', 'PesertaController@editpeserta')->name('edit.peserta');
    
    Route::post('/peserta/editpeserta', 'PesertaController@updatepeserta')->name('update.peserta');
    
    Route::get('/peserta/{id}/deletepeserta', 'PesertaController@deletepeserta')->name('delete.peserta');

    // Route::get('/sijil/searchpeserta', 'PesertaController@searchpeserta)->name('search.peserta');
    
    //MANUAL

    Route::get('/manual/listmanual', 'ManualController@show')->name('list.manual');
    
    Route::get('/manual/createmanual', 'ManualController@createmanual')->name('create.manual');
    
    Route::post('/manual/createmanual', 'ManualController@importForm')->name('save.manual');

    Route::get('/manual/{id}/editmanual', 'ManualController@editmanual')->name('edit.manual');
    
    Route::post('/sijil/editmanual', 'ManualController@updatemanual')->name('update.manual');

    Route::get('/manual/{id}/deletemanual', 'ManualController@deletemanual')->name('delete.manual');
    
    Route::delete('/manual/{id}/deletechkBox1', 'ManualController@destroy')->name('deletechkBox1.manual');

    Route::delete('/manual/deletechkBoxAll', 'ManualController@deleteAll')->name('deletechkBoxAll.manual');

    Route::get('/manual/{id}/pdf', 'ManualController@pdf')->name('pdf.manual');
    
    Route::get('/manual/{id}/pdfnontemp', 'ManualController@pdfnontemp')->name('pdfnontemp.manual');

    Route::get('/manual/searchmanual1', 'ManualController@AdsearchPost')->name('advance.post');
    
    Route::get('/manual/{id}/info', 'ManualController@info')->name('info.manual');
    
    //TARGET

    Route::get('/target/listtarget', 'TargetController@show')->name('list.target');
    
    Route::get('/target/createtarget', 'TargetController@createtarget')->name('create.target');
    
    Route::post('/target/createtarget', 'TargetController@importForm1')->name('save.target');

    Route::get('/target/{id}/edittarget', 'TargetController@edittarget')->name('edit.target');
    
    Route::post('/sijil/edittarget', 'TargetController@updatetarget')->name('update.target');

    Route::get('/target/{id}/deletetarget', 'TargetController@deletetarget')->name('delete.target');

    Route::get('/target/{id}/pdf', 'TargetController@pdf')->name('pdf.target');
    
    Route::get('/target/{id}/pdfnontemp', 'TargetController@pdfnontemp')->name('pdfnontemp.target');

    Route::delete('/target/{id}/deletechkBox1', 'TargetController@destroy')->name('deletechkBox1.target');

    Route::delete('/target/deletechkBoxAll', 'TargetController@deleteAll')->name('deletechkBoxAll.target');

    Route::get('/target/{id}/info', 'TargetController@info')->name('info.target');
    
    Route::get('/target/searchmanual2', 'TargetController@AdsearchPost1')->name('advance.post1');
    
});

require __DIR__.'/auth.php';

Route::get('/sijil/{id}/pdf', 'SijilController@pdf')->name('pdf.sijil');

Route::get('/searchic', 'PesertaController@searchic')->name('search.ic');

Route::get('/manual/searchmanual', 'ManualController@searchmanual')->name('search.manual');

Route::get('/manual/searchguest', 'GuestController@searchguestJPN')->name('search.guest1');

Route::get('/target/searchtarget3', 'GuestController@searchguestPPD')->name('search.guest2');

Route::get('/target/searchtarget', 'TargetController@searchtarget')->name('search.target');

Route::get('/guest/{id}/pdf3', 'GuestController@pdfJPN')->name('pdf.guest1');

Route::get('/guest/{id}/pdf2', 'GuestController@pdfPPD')->name('pdf.guest2');

