<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//All Listing
Route::get('/', function () {
    return view('listings', [
        'listings' => Listing::all()
    ]);
});
//Single Listing
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});
