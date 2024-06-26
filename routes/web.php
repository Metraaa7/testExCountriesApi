<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CountryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
Route::get('/countries/{code}', [CountryController::class, 'show'])->name('countries.show');
