<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('competitions/view/{id}', [App\Http\Controllers\HomeController::class, 'view']);

Route::get('teams/view/{id}', [App\Http\Controllers\HomeController::class, 'teams']);

Route::get('my-team', [App\Http\Controllers\HomeController::class, 'my_team']);
