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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/baru', function () {
    return view('layouts.table');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/berita', function () {
    return view('frontend.berita');
});
Route::get('/merk', function () {
    return view('frontend.merk');
});
Route::get('/mobil', function () {
    return view('frontend.mobil');
});





Route::group(['prefix' => 'admin', 'middleware' =>['auth' , 'role:admin']],function (){
	Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/merkmobil','MerkController');
	Route::resource('/mobils','MobilController');
	Route::resource('/beritas','BeritaController');
	Route::resource('/comment','CommentController');
	Route::resource('/detail_mobil','DetailMobilController');
	Route::resource('/user','UserController');
	Route::resource('/contact','ContactController');
	Route::resource('/about','AboutController');
	Route::get('/calender', function () {
    return view('backend.calender');
		});
	Route::get('/coba', function () {
    return view('backend.coba');
		});

	Route::get('export/berita', [
	'as' => 'export.berita',
	'uses' => 'BeritaController@export'
		]);
	Route::post('export/berita', [
	'as' => 'export.berita.post',
	'uses' => 'BeritaController@exportPost'
]);

    });
Route::group(['prefix' =>'member', 'middleware' =>['auth' , 'role:member|admin']],function (){
	Route::get('/', 'HomeController@index')->name('home');
	Route::resource('/mobils','MobilController');
	Route::resource('/detail_mobil','DetailMobilController');
	Route::resource('/beritas','BeritaController');
});

Route::get('/catalog/{id}', array('as' => 'showpermerk', 'uses' => 'FrontendController@showpermerk'));
Route::get('/viewdetail/{id}', 'FrontendController@viewdetail');
Route::get('berita/{id}', 'FrontendController@berita');



