<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;


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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home',[
        "title" => "home"
    ]);
});



Route::get('/about', function () {
    return view('about',[
        "title" => "about",
        "nama" => "baratha wijaya",
        "kelas" => "11 PPLG 2",
        "foto" => "image/baratha.jpeg"
    ]);
});

Route::group(["prefix" => "/student"], function(){
    Route::get("/all", [StudentController::class, 'index']);
    Route::get("/detail/{student}", [StudentController::class, 'show']);
    Route::get("/create", [StudentController::class, 'create']);
    Route::post('/add', [StudentController::class,'store']);
    Route::delete('/delete/{student}', [StudentController::class,'destroy']);
    Route::get('/edit/{student}',[StudentController::class,'edit']);
    Route::post('/update/{student}',[StudentController::class,'update']);
});

Route::group(["prefix" => "/kelas"], function(){
    Route::get("/all", [KelasController::class, 'index']);
    Route::get("/detail/{kelas}", [KelasController::class, 'show']);
    Route::get("/create", [KelasController::class, 'create']);
    Route::post('/add', [KelasController::class,'store']);
    Route::delete('/delete/{kelas}', [KelasController::class,'destroy']);
    Route::get('/edit/{kelas}',[KelasController::class,'edit']);
    Route::post('/update/{kelas}',[KelasController::class,'update']);
});

Route::group(["prefix" => "/Login"], function(){
    Route::get("/index", [loginController::class, 'index'])->name('Login.index');
    Route::post('/add', [loginController::class,'loginStore']);
});


Route::group(["prefix" => "/Register"], function(){
    Route::get("/index", [RegisterController::class, 'index']);
    Route::post('/add', [RegisterController::class,'registerStore']);
});

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::group(["prefix" => "/dashboard"], function(){
    Route::group(["prefix" => "/all"], function(){
        Route::get('/all', [DashboardController::class,'all'])->name('dashboard.all.all'); //view
    });
    Route::group(["prefix" => "/student"], function(){
        Route::get('/all', [DashboardController::class,'student'])->name('dashboard.student.all'); //view
        Route::get('/detail/{student}', [DashboardController::class,'studentShow']); //detail
        Route::get('/create', [DashboardController::class,'studentCreate']); //create data
        Route::post('/add', [DashboardController::class,'studentStore']); // add data
        Route::delete('/delete/{student}', [DashboardController::class,'studentDestory']); // delete data
        Route::get('/edit/{student}', [DashboardController::class,'studentEdit']); // provide form edit
        Route::post('/update/{student}', [DashboardController::class,'studentUpdate']); // edit data
    });
    Route::group(["prefix" => "/kelas"], function(){
        Route::get('/all', [DashboardController::class,'kelas'])->name('dashboard.kelas.all'); //view
        Route::get('/detail/{kelas}', [DashboardController::class,'kelasShow']); //detail
        Route::get('/create', [DashboardController::class,'kelasCreate']); //create data
        Route::post('/add', [DashboardController::class,'kelasStore']); // add data
        Route::delete('/delete/{kelas}', [DashboardController::class,'kelasDestory']); // delete data
        Route::get('/edit/{kelas}', [DashboardController::class,'kelasEdit']); // provide form edit
        Route::post('/update/{kelas}', [DashboardController::class,'kelasUpdate']); // edit data
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');   
});