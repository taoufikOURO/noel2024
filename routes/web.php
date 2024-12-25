<?php
use App\Http\Controllers\ChristmasController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::post('/', [ChristmasController::class, 'send'])->name('send');
Route::get('/{chaine}', [ChristmasController::class, 'show'])->name('show');
