<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\PdiController;
use App\Http\Controllers\PersonController;
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

Route::get('/', function () {
    return redirect()->action([PdiController::class, 'create']);
});

Route::resource('/pdi', PdiController::class);

Route::resource('/admin/checklists', ChecklistController::class);
Route::resource('/admin/people', PersonController::class);
Route::resource('/admin/assets', AssetController::class);
