<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkspedisiController;

Route::get('/', fn () => redirect()->route('ekspedisi.index'));
Route::resource('ekspedisi', EkspedisiController::class)->except(['show']);