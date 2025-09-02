<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\ProjectController::class)->group(function ( ){
    Route::get("/", "index");
    Route::get("/create", "create");
    Route::post("/create", "store");
});
