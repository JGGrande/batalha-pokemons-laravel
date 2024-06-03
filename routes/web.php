<?php

use App\Http\Controllers\BattleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/batalha", [ BattleController::class , 'index' ]);
Route::post("/batalha", [BattleController::class, 'battle'])->name("pokemons.battle");