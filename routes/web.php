<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\NavController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//CRUD FOR SHOP
Route::get('/addshop', [NavController::class,'addshop']);
Route::post('/createshop', [ActionsController::class,'createshop']);
Route::get('/viewshop', [NavController::class,'viewshop']);
Route::get('/deleteshop/{id}', [ActionsController::class,'deleteshop']);
Route::get('/editshop/{id}', [NavController::class,'editshop']);
Route::post('/updateshop', [ActionsController::class,'updateshop']);

//CRUD FOR CATEGORY
Route::get('/addcategory', [NavController::class,'addcategory']);
Route::post('/createcategory', [ActionsController::class,'createcategory']);
Route::get('/viewcategory', [NavController::class,'viewcategory']);
Route::get('/deletecategory/{id}', [ActionsController::class,'deletecategory']);
Route::get('/editcategory/{id}', [NavController::class,'editcategory']);
Route::post('/updatecategory', [ActionsController::class,'updatecategory']);

//CRUD FOR ITEM
Route::get('/additem', [NavController::class,'additem']);
Route::get('/remitem', [NavController::class,'remitem']);
Route::post('/createitem', [ActionsController::class,'createitem']);
Route::post('/removeitem', [ActionsController::class,'removeitem']);
Route::get('/viewstock', [NavController::class,'viewstock']);
Route::get('/deleteitem/{id}', [ActionsController::class,'deleteitem']);
Route::get('/edititem/{id}', [NavController::class,'edititem']);
Route::post('/updatestock', [ActionsController::class,'updatestock']);

require __DIR__.'/auth.php';

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
     ->middleware(['auth'])
     ->name('dashboard');

Route::get('/shoppage/{id}', [NavController::class,'shoppage']);
Route::get('/shophome/{id}', [NavController::class,'shophome']);

