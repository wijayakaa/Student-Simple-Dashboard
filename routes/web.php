<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KelasController;


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
    //student controller
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