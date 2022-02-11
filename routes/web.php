<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MPeliculaController;
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
    return view('auth.login');
});

// Route::get('/peliculas', function () {
//     return view('peliculas.index');
// });

// Route::get('/peliculas/agregar', [MpeliculaController::class,'create']);

Route::resource('peliculas', MpeliculaController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [MpeliculaController::class, 'index'])->name('home');

Route::group(['middleware' =>'auth'], function () {

   Route::get('/', [MpeliculaController::class, 'index']) ->name('home'); 

});