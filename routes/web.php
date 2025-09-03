<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\ProjectController::class)->group(function ( ){
    Route::get("/", "index");

    Route::get("/create", "create");
    Route::post("/create", "store");

    Route::get("/projects/{project_id}", "show");

    Route::get('/projects/{project}/edit', "edit");
    Route::put('/projects/{project_id}', "update");

    Route::delete('/projects/{project_id}', "destroy");
});

Route::controller(\App\Http\Controllers\IssueController::class)->group(function ( ){
    Route::post("/projects/{project_id}/issue/create", "store");

    Route::get("/projects/{project_id}/issue/{issue_id}", "show");
});