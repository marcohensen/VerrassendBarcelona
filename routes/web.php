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

//route voor welkom-pagina
Route::get('/', function () {
    return view('welcome');
});

//login/register section
Route::get('/user', 'UserController@index')->name('user');
Route::post('/user', 'UserController@update')->name('user.update');

//reservation section
Route::get('/reserveren', 'ReservationController@datum')->name('Reserveren');
Route::post('/reserveren', 'ReservationController@FietsVerhuur')->name('Reserveren.fiets');

//route voor de datum selectie pagina
Route::get('/datum', 'ReservationController@Datumindex')->name('Datumpick');
Route::post('/datum', 'ReservationController@datum')->name('Datumpick.datum');

//routes voor administrator pagina's
Route::get('/admin', 'AdminController@index')->name('Admin');
//route voor de pagina om fietsen toe te voegen
Route::get('/adminAdd', function(){return view('adminAdd');});
Route::post('/adminAdd', 'AdminController@toevoegen')->name('Admin.toevoegen');
//route voor de pagina om fietsen te wijzigen
Route::get('/adminChange', 'AdminController@updatePagina')->name('adminChange');
Route::post('/adminChange', 'AdminController@update')->name('Admin.aanpassen');
//route voor de pagina om fietsen te verwijderen
Route::get('/adminDelete', 'AdminController@verwijderPagina')->name('adminDelete');
Route::post('/adminDelete', 'AdminController@destroy')->name('Admin.verwijder');
//route voor de pagina om gebruikers admin te maken of weg te nemen
Route::get('/adminUsers', 'AdminController@userPagina')->name('adminUsers');
Route::post('/adminUsers', 'AdminController@user')->name('Admin.user');

//informatie links
Route::get('/informatie', function (){
    return view('Informatie');
});
Route::get('/tourInfo', function (){
    return view('tourInfo');
});
Route::get('/prijzen', function (){
    return view('Prijzen');
});

//routes voor login
Auth::routes();


