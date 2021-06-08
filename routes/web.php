<?php

use Illuminate\Support\Facades\Route;
use App\Http\Models\Flower;
use App\Http\Controllers\FlowerController;
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


Route::get('/flower/cards', [FlowerController::class, 'cardView']);
Route::get('/flower/filter', [FlowerController::class, 'filter']);
Route::get('/flower/create', [FlowerController::class, 'create']);
Route::post('/flower', [FlowerController::class, 'store']);
Route::get('/flower/{flowers}', [FlowerController::class, 'show']);
Route::get('/flower/{flowers}/edit', [FlowerController::class, 'edit']);
Route::put('/flower/{flowers}', [FlowerController::class, 'update']);
Route::delete('/flower/{flowers}', [FlowerController::class, 'destroy']);


require __DIR__.'/auth.php';
