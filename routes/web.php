<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminDataTes;
use App\Http\Controllers\Auth\AuthController;

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


Route::group(['middleware'=> 'guest'], function() {
	Route::post('/post_login', [AuthController::class, 'post_login']);
	Route::get('/', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware'=> 'auth'], function() {
	Route::post('admin/dashboard/delete', [AdminDataTes::class, 'delete']);
	Route::post('admin/dashboard/update', [AdminDataTes::class, 'update']);
	Route::post('admin/dashboard/store', [AdminDataTes::class, 'store']);
	Route::get('admin/dashboard/change/{id}', [AdminDataTes::class, 'change']);
	Route::get('admin/dashboard/add', [AdminDataTes::class, 'add']);
	Route::get('admin/dashboard', [AdminDataTes::class, 'dashboard']);
});
