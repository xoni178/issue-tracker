<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\ProjectController::class)->group(function ( ){
    Route::get("/", "index");
    Route::get("/create", "create");
    Route::post("/create", "store");

    Route::get("/project/{project_id}", "show");
});

Route::controller(\App\Http\Controllers\IssueController::class)->group(function ( ){
    Route::post("/project/{project_id}/issue/create", "store");

    Route::get("/project/{project_id}/issue/{issue_id}", "show");
});