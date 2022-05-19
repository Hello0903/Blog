<?php
use App\Http\Controllers\HomeController;
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

Route::get('/', 'HomeController@home')->name('home');
// Route::get('/', 'HomeController@home');
Route::get('/detail/{id}', 'HomeController@details');

Route::get('/admin','AdminController@home')->name('admin');
Route::get('/write','AdminController@write');
Route::post('/write','AdminController@add_write');
Route::get('/check/{id}/{type}','AdminController@check_post');
Route::get('/login','AdminController@login');
Route::get('/logout',function(){
   if(session_status() === PHP_SESSION_NONE)
   session_start(); 
    session_destroy();
    return redirect()->route('home');
});
Route::post('/login','AdminController@login_user');
