<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Route::view('/', 'welcome');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::view('/employee', 'employee')->middleware(['auth', 'verified'])->name('employee');

Route::middleware('auth')->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/create', [EmployeeController::class, 'create']);
    Route::get('/employee/{employee}', [EmployeeController::class, 'show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/department', [DepartmentController::class, 'index']);
    Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/create', [DepartmentController::class, 'create']);
});

Route::middleware('auth')->group(function () {
    Route::get('/position', [PositionController::class, 'index']);
    Route::post('/position', [PositionController::class, 'store'])->name('position.store');
    Route::get('/position/create', [PositionController::class, 'create']);
});


require __DIR__.'/auth.php';
