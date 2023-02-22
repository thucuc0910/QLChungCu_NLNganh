<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ApartmentController;
use App\Http\Controllers\admin\ApartmentServiceController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\ResidentController;

use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ElectricityController;
use App\Http\Controllers\admin\WaterController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [loginController::class, 'login']);
Route::post('/login/house', [loginController::class, 'house']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/home', [MainController::class, 'index_admin'])->name(name: 'admin');
        #Tài khoản
        Route::prefix('account')->group(function () {
            Route::get('/list', [UserController::class, 'list']);
            Route::get('/add', [UserController::class, 'add']);
            Route::post('/add', [UserController::class, 'create']);
            Route::get('/edit/{user}', [UserController::class, 'edit']);
            Route::post('/edit/{user}', [UserController::class, 'update']);
            Route::delete('/destroy', [UserController::class, 'destroy']);
        });
        Route::prefix('apartment')->group(function () {
            Route::get('/list', [ApartmentController::class, 'list']);
            Route::get('/add', [ApartmentController::class, 'add']);
            Route::post('/add', [ApartmentController::class, 'create']);
            Route::get('/edit/{apartment}', [ApartmentController::class, 'edit']);
            Route::post('/edit/{apartment}', [ApartmentController::class, 'update']);
            Route::delete('/destroy', [ApartmentController::class, 'destroy']);
            
        });
        Route::prefix('staff')->group(function () {
            Route::get('/list', [StaffController::class, 'list']);
            Route::get('/add', [StaffController::class, 'add']);
            Route::post('/add_staff', [StaffController::class, 'add_staff'])->name('add_staff');
            Route::post('/select_address', [StaffController::class, 'select_address'])->name('select_address');
            Route::get('/edit/{staff}', [StaffController::class, 'edit']);
            Route::post('/edit/{staff}', [StaffController::class, 'update']);
            Route::delete('/destroy', [StaffController::class, 'destroy']);
        });
        Route::prefix('service')->group(function () {
            Route::get('/list', [ServiceController::class, 'list']);
            Route::get('/add', [ServiceController::class, 'add']);
            Route::post('/add', [ServiceController::class, 'create']);
            Route::get('/edit/{service}', [ServiceController::class, 'edit']);
            Route::post('/edit/{service}', [ServiceController::class, 'update']);
            Route::delete('/destroy', [ServiceController::class, 'destroy']);

            Route::get('/add_ApartmentService', [ApartmentServiceController::class, 'add_service']);
            Route::post('/add_ApartmentService', [ApartmentServiceController::class, 'add_service_update']);
        });


        Route::prefix('resident')->group(function () {
            Route::get('/list', [ResidentController::class, 'list']);
            Route::get('/add', [ResidentController::class, 'add']);
            Route::post('/add', [ResidentController::class, 'create']);
            Route::get('/edit/{resident}', [ResidentController::class, 'edit']);
            Route::post('/edit/{resident}', [ResidentController::class, 'update']);
            Route::delete('/destroy', [ResidentController::class, 'destroy']);
        });

        Route::prefix('electric_water')->group(function () {
            // Electricity
            Route::get('/electric', [ElectricityController::class, 'month_electric']);
            Route::get('/list/{month}', [ElectricityController::class, 'list_electricity']);
            Route::post('/list/{month}/', [ElectricityController::class, 'update']);
            Route::get('/add_month', [ElectricityController::class, 'add']);

            // Water
            Route::get('/water', [WaterController::class, 'month_water']);
            Route::get('/water/list/{month}', [WaterController::class, 'list_water']);
            Route::post('/water/list/{month}/', [WaterController::class, 'update']);
            Route::get('/water/add_month', [WaterController::class, 'add']);



        });
    });

    Route::prefix('user')->group(function () {
        Route::get('/home', [MainController::class, 'index_user'])->name(name: 'user');
    });

});