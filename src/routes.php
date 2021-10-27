<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [Nowyouwerkn\WeTask\Controllers\ContactsController::class, 'index'])->name('index');
Route::resource('/contacts', 'Nowyouwerkn\WeTask\Controllers\ContactsController');