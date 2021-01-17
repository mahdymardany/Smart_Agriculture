<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    auth()->loginUsingId(1);
    return view('welcome');
});

Route::get('/createuser', function () {
    \App\Models\User::create([
        'name' => 'a',
        'username' => 'a',
        'password' => Hash::make('asdasd'),
    ]);
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth', 'auth.admin']] , function (){
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users' , UserController::class);
    Route::get('/admin/chart', function (){
        return view('admin.chart.index');
    })->name('admin.chart');
    Route::resource('/lands' , LandController::class);
});





//Route::get('/', function () {
////    return view('welcome');
////    return User::factory()->make([
////        'name' => 'Ehsan Roozbakhsh'
////    ]);