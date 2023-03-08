<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\user\MainController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\Admin_Controller;
use App\Http\Controllers\admin\ApartmentController;
use App\Http\Controllers\admin\ApartmentServiceController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\ResidentController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ElectricityController;
use App\Http\Controllers\admin\WaterController;
use App\Http\Controllers\admin\Staff_RepairController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\ReceiptController;
use App\Http\Controllers\admin\PositionController;



use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/',  function () {
    return view('user.home', [
        'title' => "CHUNG CƯ SUNHOUSE"
    ]);
});

// Người dùng
Route::prefix('user')->group(function () {
    Route::middleware(['guest:web'])->name('user.')->group(function () {
        Route::get('/login',  [loginController::class, 'login'])->name('login');
        Route::post('/house', [loginController::class, 'house']);
        Route::get('/homepage',  function () {
            return view('user.home', [
                'title' => "CHUNG CƯ SUNHOUSE"
            ]);
        });
        Route::get('/contact',  function () {
            return view('user.contact', [
                'title' => "CHUNG CƯ SUNHOUSE"
            ]);
        });
        Route::get('/about',  function () {
            return view('user.about', [
                'title' => "CHUNG CƯ SUNHOUSE"
            ]);
        }); 
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/home',  [loginController::class, 'home'])->name('home');
        Route::get('/logout', [loginController::class, 'logout'])->name('logout');
        Route::get('/apartment/{user}',  [MainController::class, 'apartment'])->name('apartment');
        Route::get('/electricity_water/{user}',  [MainController::class, 'electricity_water'])->name('electricity_water');
        Route::get('/feedback/{user}',  [MainController::class, 'feedback'])->name('feedback');
        Route::post('/feedback/{user}',  [MainController::class, 'add_feedback'])->name('add_feedback');
        Route::get('/repair/{user}',  [MainController::class, 'repair'])->name('repair');
        Route::post('/repair/{user}',  [MainController::class, 'add_repair'])->name('add_repair');


        Route::get('/changePassword',  [MainController::class, 'changePassword'])->name('changePassword');
        Route::post('/changePassword',  [MainController::class, 'updatePassword'])->name('updatePassword');

    });
});

// Quản trị
Route::prefix('admin')->group(function () {

    Route::middleware(['guest:admin'])->name('admin.')->group(function () {
        Route::get('/login',  [AdminController::class, 'login'])->name('login');
        Route::post('/house', [AdminController::class, 'house']);
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home',  [AdminController::class, 'home'])->name('home');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        #Tài khoản
        Route::prefix('account')->group(function () {
            // Tài khoản user
            Route::get('/list', [UserController::class, 'list']);
            Route::get('/add', [UserController::class, 'add']);
            Route::post('/add', [UserController::class, 'create']);
            Route::get('/edit/{user}', [UserController::class, 'edit']);
            Route::post('/edit/{user}', [UserController::class, 'update']);
            Route::delete('/destroy', [UserController::class, 'destroy']);

            // Tài khoản admin
            Route::get('/list_staff', [Admin_Controller::class, 'list']);
            Route::get('/add_staff', [Admin_Controller::class, 'add']);
            Route::post('/add_staff', [Admin_Controller::class, 'create']);
            Route::get('/edit_staff/{admin}', [Admin_Controller::class, 'edit']);
            Route::post('/edit_staff/{admin}', [Admin_Controller::class, 'update']);
            Route::delete('/destroy_staff', [Admin_Controller::class, 'destroy']);
        });

        // Căn  hộ
        Route::prefix('apartment')->group(function () {
            Route::get('/list', [ApartmentController::class, 'list']);
            Route::get('/add', [ApartmentController::class, 'add']);
            Route::post('/add', [ApartmentController::class, 'create']);
            Route::get('/edit/{apartment}', [ApartmentController::class, 'edit']);
            Route::post('/edit/{apartment}', [ApartmentController::class, 'update']);
            Route::delete('/destroy', [ApartmentController::class, 'destroy']);
            Route::get('/service/{apartment}', [ApartmentController::class, 'service']);
            Route::delete('/service/delete', [ApartmentController::class, 'delete']);
        });

        // Nhân viên
        Route::prefix('staff')->group(function () {
            Route::get('/list', [StaffController::class, 'list']);
            Route::get('/add', [StaffController::class, 'add']);
            Route::post('/add_staff', [StaffController::class, 'add_staff'])->name('add_staff');
            Route::post('/select_address', [StaffController::class, 'select_address'])->name('select_address');
            Route::get('/edit/{staff}', [StaffController::class, 'edit']);
            Route::post('/edit/{staff}', [StaffController::class, 'update']);
            Route::delete('/destroy', [StaffController::class, 'destroy']);
        });

        // Dịch vụ
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

        // Cư dân
        Route::prefix('resident')->group(function () {
            Route::get('/list', [ResidentController::class, 'list']);
            Route::get('/add', [ResidentController::class, 'add']);
            Route::post('/add', [ResidentController::class, 'create']);
            Route::get('/edit/{resident}', [ResidentController::class, 'edit']);
            Route::post('/edit/{resident}', [ResidentController::class, 'update']);
            Route::delete('/destroy', [ResidentController::class, 'destroy']);
        });

        // Sửa chữa 
        Route::prefix('repair')->group(function (){
            Route::get('/list', [Staff_RepairController::class, 'list']);
            Route::get('/edit/{repair}', [Staff_RepairController::class, 'edit']);
            Route::post('/edit/{repair}', [Staff_RepairController::class, 'update']);            
        });

        // Góp ý
        Route::prefix('feedback')->group(function (){
            Route::get('/list', [FeedbackController::class, 'list']);           
        });
        

        // Điện nước
        Route::prefix('electric_water')->group(function () {
            // Điện
            Route::get('/electric', [ElectricityController::class, 'month_electric']);
            Route::get('/list/{month}', [ElectricityController::class, 'list_electricity']);
            Route::post('/list/{month}/', [ElectricityController::class, 'update']);
            Route::get('/add_month', [ElectricityController::class, 'add']);

            // Nước
            Route::get('/water', [WaterController::class, 'month_water']);
            Route::get('/water/list/{month}', [WaterController::class, 'list_water']);
            Route::post('/water/list/{month}/', [WaterController::class, 'update']);
            Route::get('/water/add_month', [WaterController::class, 'add']);
        });

        // Tiền thuê
        Route::prefix('receipt')->group(function () {
            Route::get('/index', [ReceiptController::class, 'index']);
            Route::get('/add_month', [ReceiptController::class, 'add']);
            Route::get('/list_receipt/{month}', [ReceiptController::class, 'list_receipt']);
            Route::get('/status/{month}', [ReceiptController::class, 'status']);
            Route::post('/status/{month}', [ReceiptController::class, 'update_status']);
        });

        // Chức vụ
        Route::prefix('position')->group(function () {
            Route::get('/list', [PositionController::class, 'list']);
            Route::get('/add', [PositionController::class, 'add']);
            Route::post('/add', [PositionController::class, 'create']);
            Route::get('/edit/{position}', [PositionController::class, 'edit']);
            Route::post('/edit/{position}', [PositionController::class, 'update']);
            Route::delete('/destroy', [PositionController::class, 'destroy']);
        });
    });
});