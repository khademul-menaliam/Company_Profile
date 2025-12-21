<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\SiteSettingsController;

/*
|--------------------------------------------------------------------------
| Admin Project Gallery (ROLE PROTECTED)
|--------------------------------------------------------------------------
*/
Route::delete('/admin/project-gallery/{image}', [ProjectImageController::class, 'destroy'])
    ->middleware(['auth', 'role:Owner|Admin'])
    ->name('admin.project-gallery.destroy');

/*
|--------------------------------------------------------------------------
| Admin Home
|--------------------------------------------------------------------------
*/
Route::get('/admin/home/', [HomeController::class, 'admin'])
    ->middleware(['auth', 'role:Owner|Admin'])
    ->name('adminH');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/clients', [HomeController::class, 'clients'])->name('client');

Route::get('/why-join-us', [HomeController::class, 'whyJoin'])->name('careers.why');
Route::get('/job', [HomeController::class, 'job'])->name('careers.job');
Route::get('/internship', [HomeController::class, 'internship'])->name('careers.internship');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', [HomeController::class, 'projects'])->name('pIndex');
Route::get('/projects/{slug}', [HomeController::class, 'projectsShow'])->name('projects.show');

Route::get('/services', [HomeController::class, 'services'])->name('sIndex');
Route::get('/services/{slug}', [HomeController::class, 'servicesShow'])->name('services.show');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/check-role', function () {
    $user = Auth::user();
    dd($user->getRoleNames());
})->middleware('auth');



/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [UserController::class, 'profileEdit'])->name('admin.profile');
    Route::put('/admin/profile', [UserController::class, 'profileUpdate'])->name('admin.profile.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__.'/auth.php';
});

/*
|--------------------------------------------------------------------------
| Admin Panel (ROLE BASED)
|--------------------------------------------------------------------------







*/
Route::prefix('admin')
    ->middleware(['auth', 'role:Owner|Admin|Developer'])

    ->name('admin.')

    ->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // OWNER ONLY
    Route::middleware('role:Owner|Admin|Developer')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', AdminRoleController::class);
        Route::resource('settings', SiteSettingsController::class);
    });

    // OWNER + ADMIN
    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
    Route::resource('partners', PartnersController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);
});

/*
|--------------------------------------------------------------------------
| Career Routes (ROLE BASED)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:Owner|Admin|Developer'])
    ->group(function () {

    Route::get('career', [CareerController::class, 'index'])->name('career.index');
    Route::get('career/create', [CareerController::class, 'create'])->name('career.create');
    Route::post('career', [CareerController::class, 'store'])->name('career.store');
    Route::get('career/{type}/{id}/edit', [CareerController::class, 'edit'])->name('career.edit');
    Route::put('career/{type}/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::delete('career/{type}/{id}', [CareerController::class, 'destroy'])->name('career.destroy');
});
