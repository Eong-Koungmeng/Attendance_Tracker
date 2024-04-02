<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('home', function () {
    return view('home');
})->name('home');


// own user
Route::middleware(['auth', 'check.user'])->group(function () {
    Route::get('change-password/{id}', [AuthController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('change-password/{id}', [AuthController::class, 'changePassword']);
});

// admin
Route::middleware(['auth', 'user.type:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});

// employee
Route::middleware(['auth', 'user.type:employee'])->group(function () {
    Route::get('/employee', function () {
        return view('employee.employee');
    });
});
