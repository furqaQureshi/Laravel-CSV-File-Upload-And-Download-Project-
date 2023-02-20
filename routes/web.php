<?php

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

// Route::get('/', function () {
//     return view('check');
// });


Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'upload_file']);
Route::get('/data', [UserController::class, 'csv_data']);

Route::get('/csvFile', [UserController::class, 'exportCsv']);
