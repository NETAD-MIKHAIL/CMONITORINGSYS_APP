<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetController;

Route::post('/google-sheet-data', [GoogleSheetController::class, 'store']);
Route::get('/ping', function () {
    return response()->json(['message' => 'API route file is loaded!']);
});
