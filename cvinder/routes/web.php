<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Controller;


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
    return view('welcome');                                                                                 //done(interficie)
})->name("welcome");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/layouts/login", [Controller::class, "login"])->name("layouts.login");                          //done(interficie)

Route::get("/worker", [WorkerController::class, "index"])->name("worker.index");                            //
Route::get("/worker/profile", [WorkerController::class, "profile"])->name("worker.profile");                //done(interficie)
Route::get("/worker/matches", [WorkerController::class, "matches"])->name("worker.matches");                //done(interficie)
Route::get("/worker/form", [WorkerController::class, "form"])->name("worker.form");                         //
Route::get("/worker/check", [WorkerController::class, "check"])->name("worker.check");                      //

Route::get("/enterprise/profile", [EnterpriseController::class, "profile"])->name("enterprise.profile");    //done(interficie)
Route::get("/enterprise/form", [EnterpriseController::class, "form"])->name("enterprise.form");             //done(interficie) done(functioning)
Route::post("/enterprise/store", [EnterpriseController::class, "store"])->name("enterprise.store");         //DOING
Route::post("/enterprise/check", [EnterpriseController::class, "check"])->name("enterprise.check");         //DOING

Route::get("/offer", [OfferController::class, "index"])->name("offer.index");                               //
Route::get("/offer/matches", [OfferController::class, "matches"])->name("offer.matches");                   //done(interficie)
Route::get("/offer/form", [OfferController::class, "form"])->name("offer.form");                            //


