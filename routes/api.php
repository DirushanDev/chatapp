<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\Frnd\Frndrequest;
use App\Http\Controllers\dirushan;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('apimail/{email}/{name}',[Authcontroller::class,'apimail']);
Route::post('save',[dirushan::class,'save']);