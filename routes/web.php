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

/*Route::get('/', function () {
    return view('barbershop');
});*/

//Auth::routes();
//Route::get('/', 'HomeController@index')->name('home');
/*Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');*/


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

Route::group(['middleware'=>['web','auth']],function(){
    Route::get('/','BarberShop\LoginController@index')->name('login_index');
});

Route::group(['prefix'=>'superroot','middleware'=>['web','auth']],function(){
    Route::get('object','Barbershop\ObjectController@index')->name('object_index');
    Route::get('user','Barbershop\UserController@index')->name('user_index');
});

Route::group(['prefix'=>'director','middleware'=>['web','auth']],function(){
    Route::get('results','Barbershop\DirectorController@results')->name('director_results');
    Route::get('analytics','Barbershop\Director@analytics')->name('director_analitics');
});