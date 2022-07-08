<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CompetitionController as CompetitionCtrl;
use App\Http\Controllers\Api\TeamController as TeamCtrl;
use App\Http\Controllers\Api\PlayerController as PlayerCtrl;

// competitions
Route::get('competitions', [CompetitionCtrl::class, 'index'])
  ->middleware('throttle: 10, 60');
Route::get('competitions/{competitionId}', [CompetitionCtrl::class, 'view'])
  ->middleware('throttle: 10, 60');

// teams
Route::get('team', [TeamCtrl::class, 'index']);
Route::get('team/{teamId}', [TeamCtrl::class, 'view']);

//players
Route::get('players', [PlayerCtrl::class, 'index']);
Route::get('players/{playerId}', [PlayerCtrl::class, 'view']);