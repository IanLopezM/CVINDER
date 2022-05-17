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
    return view('welcome');                                                                                 //done(interficie) done(functioning)    ENDED?
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

Route::get("/layouts/login", [Controller::class, "login"])->name("layouts.login");                          //done(interficie) done(functioning)    ENDED?

Route::get("/worker", [WorkerController::class, "index"])->name("worker.index");                            //half(interficie) done(functioning)    NOTENDED!
Route::get("/worker/profile", [WorkerController::class, "profile"])->name("worker.profile");                //done(interficie) done(functioning)    ENDED?
Route::get("/worker/matches", [WorkerController::class, "matches"])->name("worker.matches");                //TODO
Route::get("/worker/form", [WorkerController::class, "form"])->name("worker.form");                         //done(interficie) done(functioning)    ENDED?
Route::post("/worker/check", [WorkerController::class, "check"])->name("worker.check");                     //**************** done(functioning)    ENDED?
Route::post("/worker/store", [WorkerController::class, "store"])->name("worker.store");                     //**************** done(functioning)    ENDED?
Route::post("/worker/edit", [WorkerController::class, "edit"])->name("worker.edit");                        //**************** done(functioning)    ENDED?
Route::post("/worker/save", [WorkerController::class, "save"])->name("worker.save");                        //**************** done()

Route::get("/enterprise/profile", [EnterpriseController::class, "profile"])->name("enterprise.profile");    //done(interficie) done(functioning)    ENDED?
Route::get("/enterprise/form", [EnterpriseController::class, "form"])->name("enterprise.form");             //done(interficie) done(functioning)    ENDED?
Route::post("/enterprise/store", [EnterpriseController::class, "store"])->name("enterprise.store");         //**************** done(functioning)    ENDED?
Route::post("/enterprise/check", [EnterpriseController::class, "check"])->name("enterprise.check");         //**************** done(functioning)    ENDED?
Route::post("/enterprise/edit", [EnterpriseController::class, "edit"])->name("enterprise.edit");            //**************** done(functioning)    ENDED?
Route::post("/enterprise/profile", [OfferController::class, "store"])->name("offer.store");                 //**************** done(functioning)    ENDED?

Route::get("/offer", [OfferController::class, "index"])->name("offer.index");                               //half(interficie) done(functioning)    NOTENDED!
Route::get("/offer/profile", [OfferController::class, "profile"])->name("offer.profile");                   //done(interficie) done(functioning)    ENDED?
Route::get("/offer/matches", [OfferController::class, "matches"])->name("offer.matches");                   //TODO
Route::get("/offer/form", [OfferController::class, "form"])->name("offer.form");                            //done(interficie) done(functioning)    ENDED?
Route::post("/offer/edit", [OfferController::class, "edit"])->name("offer.edit");                           //**************** done(functioning)    ENDED?
Route::post("/offer/save", [OfferController::class, "save"])->name("offer.save");                           //**************** done(functioning)    ENDED?