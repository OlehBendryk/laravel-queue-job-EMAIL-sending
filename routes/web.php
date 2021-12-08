<?php

use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Mail\MassSendingController;
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
    return view('admin.index');
});

Route::resource('customer', CustomersController::class);
Route::resource('group', GroupsController::class);
Route::resource('mail', MailController::class);

Route::post('/email/send', [MassSendingController::class, 'sendEmail'])->name('send');


Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);

