<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\ContactsController;
use App\Http\Controllers\Website\HomepageController;
use App\Http\Controllers\Website\ProjectController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('website.home');
    Route::get('/about', [AboutController::class, 'index'])->name('website.about');
    Route::get('/projects/{slug}', [ProjectController::class, 'index'])->name('website.project');
    Route::get('/contact', [ContactController::class, 'index'])->name('website.contact');
    Route::get('/contact/form', [ContactController::class, 'post'])->name('website.contact.post');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set.language');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {

    Route::redirect('/', '/admin/projects');

    Route::name('projects.')->prefix('projects')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name('index');
        Route::get('/add', [AdminProjectController::class, 'create'])->name('create');
        Route::post('/add', [AdminProjectController::class, 'store'])->name('store');
        Route::get('/{project}', [AdminProjectController::class, 'edit'])->name('edit');
        Route::post('/{project}', [AdminProjectController::class, 'update'])->name('update');
        Route::get('/{project}/delete', [AdminProjectController::class, 'destroy'])->name('destroy');
    });

    Route::name('settings.')->prefix('settings')->group(function () {
        Route::get('/edit', [SettingsController::class, 'edit'])->name('edit');
        Route::post('/update', [SettingsController::class, 'update'])->name('update');
    });

    Route::name('about.')->prefix('about')->group(function () {
        Route::get('/edit', [SettingsController::class, 'editAbout'])->name('edit');
        Route::post('/update', [SettingsController::class, 'updateAbout'])->name('update');
    });

    Route::name('sponsors.')->prefix('sponsors')->group(function () {
        Route::get('/', [SponsorController::class, 'index'])->name('index');
        Route::post('/add', [SponsorController::class, 'store'])->name('store');
        Route::get('/{sponsor}', [SponsorController::class, 'edit'])->name('edit');
        Route::post('/{sponsor}', [SponsorController::class, 'update'])->name('update');
        Route::get('/{sponsor}/delete', [SponsorController::class, 'destroy'])->name('destroy');
    });

    Route::name('clients.')->prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::post('/add', [ClientController::class, 'store'])->name('store');
        Route::get('/{client}', [ClientController::class, 'edit'])->name('edit');
        Route::post('/{client}', [ClientController::class, 'update'])->name('update');
        Route::get('/{client}/delete', [ClientController::class, 'destroy'])->name('destroy');
    });

    Route::name('employees.')->prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('index');
        Route::post('/add', [EmployeeController::class, 'store'])->name('store');
        Route::get('/{employee}', [EmployeeController::class, 'edit'])->name('edit');
        Route::post('/{employee}', [EmployeeController::class, 'update'])->name('update');
        Route::get('/{employee}/delete', [EmployeeController::class, 'destroy'])->name('destroy');
    });
});
