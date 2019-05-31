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

/*Route::put('create','Barbershop\ObjectController@create')->name('object_create');*/

Route::group(['middleware'=>['web','auth']],function(){
    Route::get('/','BarberShop\LoginController@index')->name('login_index');
});

Route::group(['prefix'=>'error','middleware'=>['web','auth']],function(){
    Route::get('unrole','Barbershop\ErrorController@unroleUser')->name('error_unrole');
});

Route::group(['prefix'=>'superroot','middleware'=>['web','auth','issuperroot']],function(){
    Route::get('object','Barbershop\ObjectController@index')->name('object_index');
    Route::get('user','Barbershop\UserController@index')->name('user_index');
    Route::post('getobject','Barbershop\ObjectController@getbsobject');
    Route::resource('object', 'Barbershop\ObjectController', ['only' => ['store', 'update','destroy']]);
});

Route::group(['prefix'=>'director','middleware'=>['web','auth','isdirector']],function(){
    Route::get('results','Barbershop\DirectorController@results')->name('director_results');
    Route::get('work','Barbershop\DirectorController@work')->name('director_work');
});

Route::group(['prefix'=>'administrator','middleware'=>['web','auth','isadministrator']],function(){
    Route::get('main','Barbershop\AdministratorController@main')->name('administrator_main');
    Route::get('hairdressers','Barbershop\AdministratorController@hairdresses')->name('administrator_hairdresses');
});

Route::group(['prefix'=>'hairdresser','middleware'=>['web','auth','ishairdresser']],function(){
    Route::get('main','Barbershop\HairdresserController@main')->name('hairdresser_main');
    Route::get('settings','Barbershop\HairdresserController@settings')->name('hairdresser_settings');
});

Route::group(['prefix'=>'user','middleware'=>['web','auth','isuser']],function(){
    Route::get('main','Barbershop\UserController@main')->name('user_main');
    Route::get('settings','Barbershop\UserController@settings')->name('user_settings');
});