<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('admin.livecamera');
});
Route::get('/admin_livecamera', [AdminController::class, 'liveCamera'])->name('admin.livecamera');
