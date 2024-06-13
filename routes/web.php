<?php

use App\Http\Controllers\AdminDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\CustomerDash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Client Routes FrontEnd
Route::get('/', function () {return view('landing.index');})->name('home');
Route::get('/booking', function () {return view('landing.booking');})->name('booking');
Route::get('/routes', [CustomerDash::class, 'Routes'])->name('routes');
Route::get('/contactus', function () {return view('landing.contact');})->name('contact');

//Client Routes BackEnd
Route::post('/searchroute', [CustomerDash::class, 'SearchRoute'])->name('searchRoute');
Route::post('/searchBooking', [CustomerDash::class, 'SearchBooking'])->name('searchBooking');
Route::get('/getRoute', [CustomerDash::class, 'GetRoute'])->name('getRoute');
Route::post('/reserve', [CustomerDash::class, 'Reserve'])->name('reserve');
Route::post('/sendfeedback', [CustomerDash::class, 'SendFeedback'])->name('sendFeedback');

//Admin Routes Frontend
Route::get('/admin/login', function () {return view('admin.login');})->name('loginAdmin');
Route::get('/admin/dashboard', [Authenticate::class, 'Dashboard'])->name('adminDashboard');
Route::get('/admin/terminal', [Authenticate::class, 'Terminal'])->name('adminTerminal');
Route::get('/admin/buslist', [Authenticate::class, 'Bus'])->name('adminBus');
Route::get('/admin/routes', [Authenticate::class, 'Route'])->name('adminRoute');
Route::get('/admin/bookedlist', [Authenticate::class, 'Booked'])->name('adminBooked');
Route::get('/admin/feedback', [Authenticate::class, 'Feedback'])->name('feedback');
Route::get('/admin/account', [Authenticate::class, 'UserAccount'])->name('userAccount');

//Admin Routes Backend
Route::post('/admin/login/authenticate', [Login::class, 'AdminLogin'])->name('adminLogin');
Route::post('/admin/login/logout', [Login::class, 'AdminLogout'])->name('adminLogout');
Route::post('/admin/terminal/add', [AdminDashboard::class, 'AddTerminal'])->name('addTerminal');
Route::post('/admin/terminal/update', [AdminDashboard::class, 'UpdateTerminal'])->name('updateTerminal');
Route::get('/admin/terminal/load', [AdminDashboard::class, 'LoadTerminal'])->name('loadTerminal');
Route::post('/admin/routes/add', [AdminDashboard::class, 'AddRoute'])->name('addRoute');
Route::post('/admin/routes/edit', [AdminDashboard::class, 'EditRoute'])->name('editRoute');
Route::get('/admin/routes/load', [AdminDashboard::class, 'LoadRoute'])->name('loadRoute');
Route::post('/admin/buslist/add', [AdminDashboard::class, 'AddBus'])->name('addBus');
Route::post('/admin/buslist/edit', [AdminDashboard::class, 'EditBus'])->name('editBus');
Route::get('/admin/buslist/load', [AdminDashboard::class, 'LoadBus'])->name('loadBus');
Route::get('/admin/boooked/load', [AdminDashboard::class, 'GetBookedList'])->name('getBookedList');
Route::get('/admin/feedback/load', [AdminDashboard::class, 'GetFeedback'])->name('getFeedback');
Route::post('/admin/userprofile/general', [AdminDashboard::class, 'UpdateGeneral'])->name('updateGeneral');
Route::post('/admin/userprofile/password', [AdminDashboard::class, 'UpdatePass'])->name('updatePassword');
Route::post('/admin/userprofile/uploadPic', [AdminDashboard::class, 'UpdatePic'])->name('updatePic');

//Fallback Route
Route::fallback(function () {
    return view('404');
});