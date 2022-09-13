<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminhome'])->name('adminhome');
});

Route::get('/admin/login', [AdminController::class, 'adminlogin'])->name('adminlogin');
Route::post('/admin/logged', [AdminController::class, 'logged'])->name('logged');
Route::get('/admin/loggedout', [AdminController::class, 'loggedout'])->name('loggedout');