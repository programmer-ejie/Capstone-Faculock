<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CameraController;

Route::get('/', function () {
    return view('admin.livecamera');
});
Route::get('/admin_livecamera', [AdminController::class, 'liveCamera'])->name('admin.livecamera');
Route::post('/upload_user_picture', [CameraController::class, 'uploadUserPicture']);