<?php

use Illuminate\Support\Facades\Route;
use App\Http\Models\Flower;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $flowers = DB::table('flowers')->paginate(25);
    
    return view('dashboard',['flowers' => $flowers]);
})->middleware(['auth'])->name('dashboard');


//Flower Routes
Route::get('/flower/print', [FlowerController::class, 'exportPdf'])->middleware(['auth']);
Route::get('/flower/excel', [FlowerController::class, 'exportExcel'])->middleware(['auth']);
Route::get('/flower/cards', [FlowerController::class, 'cardView'])->middleware(['auth']);
Route::get('/flower/filter', [FlowerController::class, 'filter'])->middleware(['auth']);
Route::get('/flower/create', [FlowerController::class, 'create'])->middleware(['auth']);
Route::post('/flower', [FlowerController::class, 'store'])->middleware(['auth']);
Route::get('/flower/{flowers}', [FlowerController::class, 'show'])->middleware(['auth']);
Route::get('/flower/{flowers}/edit', [FlowerController::class, 'edit'])->middleware(['auth']);
Route::get('/flower/{flowers}/change', [FlowerController::class, 'change'])->middleware(['auth']);
Route::put('/flower/{flowers}/upload', [FlowerController::class, 'upload'])->middleware(['auth']);
Route::put('/flower/{flowers}', [FlowerController::class, 'update'])->middleware(['auth']);
Route::delete('/flower/{flowers}', [FlowerController::class, 'destroy'])->middleware(['auth']);

//User Routes
Route::get('/user/create', [UserController::class, 'create'])
->middleware(['auth','permission:users-create']);
Route::post('/user', [UserController::class, 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
