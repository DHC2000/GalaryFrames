<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebcomponentController;

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


Route::get('/', function () {
    return view('header');
});

Route::get('/', function () {
    return view('footer');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/', function () {
    return view('list');
});
Route::get('/', function () {
    return view('listcomponent');
});


Route::get('/solid', function () {
    return view('solid.index');
});

//Route::get('list',[WebcomponentController::class]);

/*
Route::get('create',[WebcomponentController::class,'create']);
*/
Route::resource('webcomponent',WebcomponentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('component_pdf','WebcomponentController@printPDF'); //en esta version no sirve
Route::get('componentPDF',[WebcomponentController::class,'printPDF']);
