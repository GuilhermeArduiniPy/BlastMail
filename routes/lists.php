<?php

use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;


Route::get('/email-list', [App\Http\Controllers\EmailListController::class, 'index'])->name('email-list.index');
Route::get('/email-list/create', [App\Http\Controllers\EmailListController::class, 'create'])->name('email-list.create');
Route::post('/email-list/create', [App\Http\Controllers\EmailListController::class, 'store'])->name('email-list.store');
Route::get('email-list/{emailList}/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
Route::get('email-list/{emailList}/subscribers/create', [SubscriberController::class, 'create'])->name('subscribers.create');
Route::post('email-list/{emailList}/subscribers/create', [SubscriberController::class, 'store']);
Route::delete('email-list/{emailList}/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');
