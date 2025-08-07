<?php
// php artisan serve --host=0.0.0.0 --port=8000


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CameraController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin_livecamera', [AdminController::class, 'liveCamera'])->name('admin.livecamera');
Route::get('/latest-user-image', [App\Http\Controllers\AdminController::class, 'getLatestUserImage']);
Route::get('/admin_schedules', [AdminController::class, 'manageSchedules'])->name('admin.schedules');
Route::post('/admin_schedules/store', [AdminController::class, 'storeSchedule'])->name('admin.schedules.store');
Route::put('/admin_schedules/update/{id}', [AdminController::class, 'updateSchedule'])->name('admin.schedules.update');
Route::delete('/admin_schedules/delete/{id}', [AdminController::class, 'deleteSchedule'])->name('admin.schedules.delete');