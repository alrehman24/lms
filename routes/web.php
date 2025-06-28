<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeeHeadController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('student/profile', [StudentController::class, 'edit'])->name('student.profile');
    Route::post('student/profile/update', [StudentController::class, 'update'])->name('profile.update');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    });

    // Route::group(['middleware'=>'role:student'],function () {
    //     Route::get('dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    //     Route::get('profile', [StudentController::class, 'edit'])->name('student.edit');
    //     Route::post('profile/update/', [StudentController::class, 'update'])->name('student.update');
    // });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');
        Route::post('change-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('table', [AdminController::class, 'table'])->name('admin.table');
        // Academeic Year Resource
        Route::get('academic-year/create', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic-year/store', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic-year/read', [AcademicYearController::class, 'read'])->name('academic-year.read');
        Route::get('academic-year/edit/{academicYear}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::post('academic-year/update/{academicYear}', [AcademicYearController::class, 'update'])->name('academic-year.update');
        Route::delete('academic-year/delete/{academicYear}', [AcademicYearController::class, 'delete'])->name('academic-year.delete');
        // Class Resource
        Route::get('class/create', [ClassesController::class, 'create'])->name('class.create');
        Route::post('class/store', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class/read', [ClassesController::class, 'index'])->name('class.read');
        Route::get('class/edit/{class}', [ClassesController::class, 'edit'])->name('class.edit');
        Route::post('class/update/{class}', [ClassesController::class, 'update'])->name('class.update');
        Route::delete('class/delete/{class}', [ClassesController::class, 'destroy'])->name('class.delete');
        // Fee head Resources
        Route::get('fee-head/create', [FeeHeadController::class, 'create'])->name('fee-head.create');
        Route::post('fee-head/store', [FeeHeadController::class, 'store'])->name('fee-head.store');
        Route::get('fee-head/read', [FeeHeadController::class, 'index'])->name('fee-head.read');
        Route::get('fee-head/edit/{feeHead}', [FeeHeadController::class, 'edit'])->name('fee-head.edit');
        Route::post('fee-head/update/{feeHead}', [FeeHeadController::class, 'update'])->name('fee-head.update');
        Route::delete('fee-head/delete/{feeHead}', [FeeHeadController::class, 'destroy'])->name('fee-head.delete');
        // Fee Structure Resource
        Route::get('fee-structure/create', [FeeStructureController::class, 'create'])->name('fee-structure.create');
        Route::post('fee-structure/store', [FeeStructureController::class, 'store'])->name('fee-structure.store');
        Route::match(['get', 'post'], 'fee-structure/read', [FeeStructureController::class, 'index'])->name('fee-structure.read');
        Route::get('fee-structure/edit/{feeStructure}', [FeeStructureController::class, 'edit'])->name('fee-structure.edit');
        Route::post('fee-structure/update/{feeStructure}', [FeeStructureController::class, 'update'])->name('fee-structure.update');
        Route::delete('fee-structure/delete/{feeStructure}', [FeeStructureController::class, 'destroy'])->name('fee-structure.delete');

        // Fee Structure Resource
        Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::match(['get', 'post'], 'student/read', [StudentController::class, 'index'])->name('student.read');
        Route::get('student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('student/update/{student}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('student/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
    });
});
