<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//All Listing
Route::get('/', [ListingController::class,'index']);

//Single Listing
Route::get('/listings/{listing}', [ListingController::class,'show']);
