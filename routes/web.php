<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// homepage route
Route::view('/', 'welcome');


// room route
Route::get('/room', 'App\Http\Controllers\RoomController@index');
Route::get('/room/{roomtype:roomtypes_id}', 'App\Http\Controllers\RoomController@show');


// guest route
Route::get('/guest', 'App\Http\Controllers\GuestController@index')->name('guest.index');
Route::get('/guest/create', 'App\Http\Controllers\GuestController@create')->name('guest.create');
Route::post('/guest/store', 'App\Http\Controllers\GuestController@store')->name('guest.store');
Route::get('/guest/{guest:guest_id}/edit', 'App\Http\Controllers\GuestController@edit')->name('guest.edit');
Route::post('/guest/update/{guest:guest_id}', 'App\Http\Controllers\GuestController@update')->name('guest.update');
Route::delete('/guest/delete/{guest:guest_id}', 'App\Http\Controllers\GuestController@destroy')->name('guest.delete');


// room reservation route
Route::get('/reservation', 'App\Http\Controllers\ReservationController@index')->name('reservation.index');
Route::get('/reservation/create', 'App\Http\Controllers\ReservationController@create')->name('reservation.create');
Route::post('/reservation/store', 'App\Http\Controllers\ReservationController@store')->name('reservation.store');
Route::get('/reservation/{reservation:reservation_id}/edit', 'App\Http\Controllers\ReservationController@edit')->name('reservation.edit');
Route::post('/reservation/update/{reservation:reservation_id}', 'App\Http\Controllers\ReservationController@update')->name('reservation.update');
Route::delete('/reservation/delete/{reservation:reservation_id}', 'App\Http\Controllers\ReservationController@destroy')->name('reservation.delete');


// room availability route
Route::get('/room-available', 'App\Http\Controllers\SearchAvailableRoomController@index')->name('search.index');
Route::post('/room-available/check', 'App\Http\Controllers\SearchAvailableRoomController@result')->name('search.result');
Route::post('/room-available/result', 'App\Http\Controllers\GuestSearchController@result')->name('guest.search');



// payments route
Route::get('/payment/reservation/{reservation:reservation_id}', 'App\Http\Controllers\PaymentController@index')->name('payment.index');
Route::post('/payment/reservation/', 'App\Http\Controllers\PaymentController@store')->name('payment.store');


// sales route
Route::get('/sales', 'App\Http\Controllers\SalesController@index')->name('sales.index');
Route::post('/sales/result', 'App\Http\Controllers\SalesController@totalSales')->name('sales.total');


// room report route
Route::get('/reportrooms', 'App\Http\Controllers\ChartController@pieChart')->name('pie.chart');


// admin route
Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'App\Http\Controllers\Admin\UsersController',['except' => ['show', 'create', 'store']]);
});


// about page route
Route::view('/about', 'about');


// contact page route
Route::view('/contact', 'contact');


Auth::routes();


// staff and admin home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// logout route
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
