<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CustomerController as PController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CrawlerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\SchedulesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StaffInformationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PTCSController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterController1;


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
Route::name('website.')->group(function () {
    Route::get('/dang-ky', [RegisterController1::class, 'index'])->name('dangky');
    Route::post('/store', [RegisterController1::class, 'store'])->name('store');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    // Route::get('/the-loai/{id}', [PController::class, 'category'])->name('category');
    // Route::get('/chi-tiet/{id}', [PController::class, 'detail'])->name('detail');
    // Route::get('/gio-hang', [CartController::class, 'cart'])->name('cart');
    // Route::get('/thanh-toan', [CartController::class, 'payment'])->name('payment');
    // Route::get('/add-to-cart/{id}', [CrawlerController::class, 'AddtoCart'])->name('addtoCart');
});

Route::get('login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('check_login')->group(function () {
    Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');

    Route::controller(CustomerController::class)->prefix('customers')->name('customers.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/chart', 'chart')->name('chart');
        // Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::post('fetch-staff','fetchStaff')->name('fetchStaff');
    });

    Route::controller(SchedulesController::class)->prefix('schedules')->name('schedules.')->group(function () {
        Route::get('/calendar', 'calendar')->name('calendar');
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(PTCSController::class)->prefix('ptcs')->name('ptcs.')->group(function () {
        Route::get('/calendar', 'calendar')->name('calendar');
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(StaffController::class)->prefix('staffs')->name('staffs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });


    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::controller(SalesController::class)->prefix('sales')->name('sales.')->group(function () {
        Route::get('/chart', 'chart')->name('chart');
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
    Route::controller(BranchController::class)->prefix('branchs')->name('branchs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/updateview/{id}', 'updateview')->name('updateview');
        Route::get('/view/{id}', 'view')->name('view');
        Route::get('/editview/{id}', 'editview')->name('editview');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(NewsController::class)->prefix('news')->name('news.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::get('send-email', [SendEmailController::class, 'index']);
    Route::get('register', [RegisterController::class, 'view_register']);
    Route::post('register', [RegisterController::class, 'request_register']);
    Route::get('verify/{uuid}',[RegisterController::class, 'verify'])->name('verify');
});