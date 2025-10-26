<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetController;

// Route for Google Sheet POST data
Route::post('/google-sheet-data', [GoogleSheetController::class, 'store']);
