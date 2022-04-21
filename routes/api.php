<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('gifts', [GiftController::class, 'index'])->name('gifts.index');
Route::post('gifts', [GiftController::class, 'store'])->name('gifts.store');
Route::get('gifts/{id}', [GiftController::class, 'show'])->name('gifts.show');
Route::delete('gifts/{id}', [GiftController::class, 'destroy'])->name('gifts.destroy');
