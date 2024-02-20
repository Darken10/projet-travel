<?php

use App\Http\Controllers\Api\Post\ApiTagController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/admin')->name('api.admin.')->group(function () {
    Route::post('/post/tag',[ApiTagController::class,'create'])->name('post.tag.create');
});
Route::get('/post/tag',[ApiTagController::class,'index'])->name('post.tag.index');
