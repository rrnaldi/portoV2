<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UAboutController;
use App\Http\Controllers\UProjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\CertificateController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [PageController::class, 'landing'])->name('landing');


// Route Login Admin (Tanpa Prefix "admin" Karena Sudah di Prefix Bawah)
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');


    Route::resource('abouts', AboutController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('skills', SkillController::class);
});


