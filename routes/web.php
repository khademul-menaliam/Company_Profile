<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;
// use App\Http\Controllers\ContactController; //admin controller get access
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectImageController;

Route::delete('/admin/project-gallery/{image}', [ProjectImageController::class, 'destroy'])
    ->name('admin.project-gallery.destroy');
// use App\Http\Controllers\{HomeController, ServiceController, ProjectController, ContactController};

// Route::get('/admin/roles', [AdminRoleController::class, 'index'])->name('admin.roles.index');
// Route::get('/admin/roles/create', [AdminRoleController::class, 'create'])->name('admin.roles.create');
// Route::post('/admin/roles/store', [AdminRoleController::class, 'store'])->name('admin.roles.store');
// Route::get('/admin/roles/edit/{id}', [AdminRoleController::class, 'edit'])->name('admin.roles.edit');
// Route::put('/admin/roles/update/{id}', [AdminRoleController::class, 'update'])->name('admin.roles.update');
// Route::delete('/admin/roles/delete/{id}', [AdminRoleController::class, 'destroy'])->name('admin.roles.destroy');




Route::get('/admin/home/', [HomeController::class, 'admin'])->name('adminH');

Route::get('/clients', [HomeController::class, 'clients'])->name('client');

Route::get('/why-join-us', [HomeController::class, 'whyJoin'])->name('careers.why');
Route::get('/job', [HomeController::class, 'job'])->name('careers.job');
Route::get('/internship', [HomeController::class, 'internship'])->name('careers.internship');
// Route::get('/career/{slug}', [HomeController::class, 'show'])->name('careers.show'); // optional

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', [HomeController::class, 'projects'])->name('pIndex');
Route::get('/projects/{slug}', [HomeController::class, 'projectsShow'])->name('projects.show');

Route::get('/services', [HomeController::class, 'services'])->name('sIndex');
Route::get('/services/{slug}', [HomeController::class, 'servicesShow'])->name('services.show');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');






// Provide a global "dashboard" route name so authenticated redirects land in admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [UserController::class, 'profileEdit'])->name('admin.profile');
    Route::put('/admin/profile', [UserController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Provide admin-prefixed auth endpoints (e.g., /admin/login, /admin/register)
// Names are prefixed to avoid clashing with default auth route names.
Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__.'/auth.php';
});



// Team Members
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('dashboard');

    Route::resource('team', App\Http\Controllers\Admin\TeamController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('partners', PartnersController::class);
    Route::resource('roles', AdminRoleController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);
});


// Admin-specific auth routes should not be re-required inside the admin prefix.
