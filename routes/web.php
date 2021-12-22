<?php

use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Mail\EmailMassSendingController;
use App\Http\Controllers\Mail\EmailTemplateController;
use App\Http\Controllers\Mail\EmailSendingController;
use Illuminate\Support\Facades\Auth;
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
})->middleware('auth');

Route::resource('customer', CustomersController::class);
Route::resource('group', GroupsController::class);
Route::resource('email', EmailTemplateController::class);
Route::resource('email_sending', EmailMassSendingController::class);

Route::post('/email/send', [EmailSendingController::class, 'sendEmail'])->name('send');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
