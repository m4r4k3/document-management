<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(["auth"])->group(function (){
    Route::get("/", [DocumentController::class ,"show"])->name("home"); 
    Route::get("/add", [DocumentController::class , "addShow"])->name("addShow");
    Route::post("/add", [DocumentController::class , "add"])->name("add");
    Route::get("/document/{client}", [DocumentController::class , "editShow"])->name("editShow");
    Route::put("/document/edit/{client}", [DocumentController::class , "edit"])->name("edit");
});
Route::middleware(["guest"])->group(function (){
    Route::get('/auth', [SignInController::class , "show"])->name("auth_show")->middleware();
    Route::post("/auth",[SignInController::class , "auth"])->name("authentifier");
});
Route::post("/logout", [SignInController::class , "logout"] )->name("logout");
