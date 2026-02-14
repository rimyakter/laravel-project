<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//All Listing
Route::get('/', [ListingController::class, 'index']);
//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);
//Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);
//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);
//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
//register
//Show Register Form
Route::get('/register', [UserController::class, 'create']);
//Create New User
Route::post('/users', [UserController::class, 'store']);
//Log user Out
Route::post('/logout', [UserController::class, 'logout']);

