<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChapaController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Maintainance\MaintainanceController;
use App\Http\Controllers\SystemAdmin\SystemAdminController;

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

Route::get('/', function () {
    return view('index');
})->name('landingPage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('registrationForm', [UserController::class, 'registrationForm'])->name('registrationForm');
Route::post('/storeusers', [UserController::class, 'store'])->name('store');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');



Route::group(['middleware'=>'preventback'], function(){

Route::middleware(['auth', 'user-access:SystemAdmin'])->group(function () {


    Route::get('systemadmin/index', [SystemAdminController::class, 'index'])->name('sysadminDashboard');
    
});


Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    
    Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/route', [AdminController::class, 'routePage'])->name('routeview');
    Route::post('admin/route/store', [AdminController::class, 'storeRoute'])->name('storeRoute');
    Route::get('admin/createTarrif', [AdminController::class, 'tarrifView'])->name('tarrifView');
    Route::post('admin/storeTarrif', [AdminController::class, 'storeTarrif'])->name('storeTarrif');
    Route::get('admin/manageTarrif', [AdminController::class, 'manageTarrif'])->name('manageTarrif');
    Route::get('admin/tarrifshow/{id}', [AdminController::class, 'TarrifshowMore'])->name('TarrifshowMore');
    Route::get('admin/tarrifedit/{id}', [AdminController::class, 'tarrifEdit'])->name('tarrifEdit');
    Route::patch('admin/updateTarrif/{id}', [AdminController::class, 'updateTarrif'])->name('updateTarrif');

    


    Route::get('admin/payment', [AdminController::class, 'payment'])->name('payment');
    Route::post('pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');

    // The callback url after a payment
    Route::get('callback/{reference}', 'App\Http\Controllers\ChapaController@callback')->name('callback');





});

Route::middleware(['auth', 'user-access:Driver'])->group(function () {

    Route::get('driver/index', [DriverController::class, 'index'])->name('driver.index');




});


Route::middleware(['auth', 'user-access:Maintainance'])->group(function () {
    
    Route::get('maintainance/index', [MaintainanceController::class, 'index'])->name('maintainance.index');



});

});

