<?php


use App\Http\Controllers\api\user\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





Route::post('/user/avatar/change', [DashboardController::class, 'setAvatar'])->middleware('auth:sanctum');
Route::get('/user/avatar/delete', [DashboardController::class, 'deleteAvatar'])->middleware('auth:sanctum');
