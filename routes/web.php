<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PanelController;
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

Route::get("/panel", [PanelController::class , "index"])->name("panelIndex");
Route::get("/panel/utilisateurs", [PanelController::class , "utilisateurs"])->name("panelUtilisateurs");
Route::get("/panel/documents", [PanelController::class , "documents"])->name("panelDocument");
Route::get("/panel/utilisateurs/ajouter", [PanelController::class , "ajouterUtilisateurs"])->name("ajouterUtilisateurs");
Route::get("/panel/historique", [PanelController::class , "historique"])->name("panelHistorique");
Route::get("/panel/clients", [PanelController::class , "clients"])->name("panelClients");
Route::post("/adduser", [SignInController::class , "createUser"])->name("createUser");

Route::middleware(["auth"])->group(function (){
    Route::get("/", [DocumentController::class ,"show"])->name("home"); 
    Route::get("/add", [DocumentController::class , "addShow"])->name("addShow");
    Route::post("/add", [DocumentController::class , "add"])->name("add");
    Route::get("/document/{order}", [DocumentController::class , "editShow"])->name("editShow");
    Route::put("/document/edit/{order}", [DocumentController::class , "edit"])->name("edit");
    Route::get("/storage/{type}/{id}", [DocumentController::class , "showDoc"])->name("showDoc");

});
Route::middleware(["guest"])->group(function (){
    Route::get('/auth', [SignInController::class , "show"])->name("auth_show")->middleware();
    Route::post("/auth",[SignInController::class , "auth"])->name("authentifier");
});
Route::post("/logout", [SignInController::class , "logout"] )->name("logout");
Route::fallback(function (){
    return to_route("home");
});