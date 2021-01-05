<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountInfoController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/search', function () {
    return view('account_info.search');
});
Route::resource('account_info', 'AccountInfoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AccountInfoController@index');
Route::get('account_info/search', 'AccountInfoController@searchByAccount');
Route::post('account_info/update', 'AccountInfoController@update');
Route::post('account_info/destroy', 'AccountInfoController@destroy');
