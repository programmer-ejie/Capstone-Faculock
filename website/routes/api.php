<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CameraController;

Route::post('/upload_user_picture', [CameraController::class, 'uploadUserPicture']);