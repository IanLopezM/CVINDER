<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\OfferController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/worker", [WorkerController::class, "index"])->name("worker.index");
Route::get("/worker/profile", [WorkerController::class, "profile"])->name("worker.profile");
Route::get("/worker/likes", [WorkerController::class, "likes"])->name("worker.likes");

Route::get("/enterprise", [EnterpriseController::class, "profile"])->name("enterprise.profile");

Route::get("/offer", [OfferController::class, "index"])->name("offer.index");
Route::get("/offer/likes", [OfferController::class, "likes"])->name("offer.likes");

