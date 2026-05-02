<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/back', [ContactController::class, 'back']);
Route::get('/thanks', [ContactController::class, 'thanks']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::delete('/admin/{id}', [AdminController::class, 'delete']);
    Route::get('/export', [AdminController::class, 'export']);
    Route::get('/reset', function () { return redirect('/admin'); });
});

require __DIR__.'/auth.php';
