<?php
use App\Http\Controllers\{
    FacultiesController,
    BranchesController,PagesController,StudentsController,UniversitiesController,AuthController
};
use Illuminate\Support\Facades\Route;


Route::get('/',Homecontroller::class)->name('home');
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authentificate',[AuthController::class,'authentificate'])->name('authentificate');
Route::post('logout',[AuthController::class,'logout'])->name('logout');