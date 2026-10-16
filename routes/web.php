<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RetardController;

Route::get('/', function () {
    return redirect()->route('divisions.index');
});

Route::resource('divisions', DivisionController::class);
Route::resource('services', ServiceController::class);
Route::resource('documents', DocumentController::class);
Route::resource('entrees', EntreeController::class);
Route::resource('sorties', SortieController::class)->parameters(['sorties' => 'sortie']);
Route::resource('users', UserController::class);
Route::get('retards', [RetardController::class, 'index'])->name('retards.index');