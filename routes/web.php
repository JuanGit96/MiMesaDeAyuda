<?php

use App\View;

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
if(! defined('PATH_MOD_USERS'))
    define('PATH_MOD_ADMIN', 'Admin\\');


Route::get('/', function () {

    View::create([
        "view" => 1
    ]);

    $view = View::all();

    return view('welcome',compact('view'));
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


   /*
 * RUTAS SECCION ADMINISTRATIVA
 * */

Route::group(['prefix'=>'admin'], function () {

    Route::resource('users',PATH_MOD_ADMIN.'UserController');

    Route::resource('tickets',PATH_MOD_ADMIN.'TicketController');

    Route::get('maps',PATH_MOD_ADMIN.'MapsController@index');

    Route::get('getPoints',PATH_MOD_ADMIN.'MapsController@getPoints')->name('getPoints');

});
