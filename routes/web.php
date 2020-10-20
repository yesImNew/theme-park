<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingRecordController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ScheduledEventController;
use App\Http\Controllers\TicketRecordController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home/hotels', [HomeController::class, 'hotels'])->name('hotel.booking')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resources([
        'hotels' => HotelController::class,
        'rooms' => RoomController::class,
        'customers' => CustomerController::class,
        'bookings' => BookingRecordController::class,
        'activities' => ActivityController::class,
        'room-types' => RoomTypeController::class,
        'scheduled-events' => ScheduledEventController::class,
        'ticket-records' => TicketRecordController::class,
    ]);

    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');;
});
