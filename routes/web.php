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
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CompanySectionController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/clients', [HomeController::class, 'clients'])->name('client');

Route::get('/why-join-us', [HomeController::class, 'whyJoin'])->name('careers.why');
Route::get('/job', [HomeController::class, 'job'])->name('careers.job');
Route::get('/internship', [HomeController::class, 'internship'])->name('careers.internship');

// --------------21-2-26
// routes/web.php
// Route::get('/internships/{slug}', [HomeController::class, 'showInternship'])->name('internships.show');
// Route::get('/jobs/{slug}', [HomeController::class, 'showJob'])->name('jobs.show');

// Display Details
Route::get('/career/{type}/{slug}', [FrontendController::class, 'show'])->name('career.show');

// Handle Application
Route::post('/career/apply/{type}/{id}', [FrontendController::class, 'submitApplication'])->name('career.apply');

Route::get('/applications', [CareerController::class, 'viewApplications'])->name('admin.applications.index');

Route::get('/site_map', [FrontendController::class, 'site_map'])->name('site_map.index');

Route::get('/clients/{id}/projects', [HomeController::class, 'clientProjects']);


// --------------end 21-2-26

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', [HomeController::class, 'projects'])->name('pIndex');
Route::get('/projects/{slug}', [HomeController::class, 'projectsShow'])->name('projects.show');

Route::get('/services', [HomeController::class, 'services'])->name('sIndex');
Route::get('/services/{slug}', [HomeController::class, 'servicesShow'])->name('services.show');

Route::match(['get', 'head'], '/',[HomeController::class, 'index'])->name('home');
// Route::view('/about', 'about')->name('about');
Route::get('/about', [HomeController::class, 'showMessages'])->name('about');

// Gallery Page
Route::get('/images', [HomeController::class, 'gallery'])->name('gallary.video');

Route::get('/how-it-works', function () {return view('workflow');})->name('howItWorks');

Route::get('/check-role', function () {
    $user = Auth::user();
    // dd($user->getRoleNames());
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Admin Auth Routes
    |--------------------------------------------------------------------------
    */
    Route::name('admin.')->group(function () {
        require __DIR__.'/auth.php';
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Project Gallery (ROLE PROTECTED)
    |--------------------------------------------------------------------------
    */
    Route::delete('project-gallery/{image}', [ProjectImageController::class, 'destroy'])
        ->middleware(['auth', 'role:Owner|Admin'])
        ->name('admin.project-gallery.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Home
    |--------------------------------------------------------------------------
    */
    Route::get('home/', [HomeController::class, 'admin'])
        ->middleware(['auth', 'role:Owner|Admin'])
        ->name('adminH');

    /*
    |--------------------------------------------------------------------------
    | Admin Profile Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('profile', [UserController::class, 'profileEdit'])->name('admin.profile');
        Route::put('profile', [UserController::class, 'profileUpdate'])->name('admin.profile.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Panel (ROLE BASED)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:Owner|Admin|Developer'])
        ->name('admin.')
        ->group(function () {

        Route::match(['get', 'head'], '/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // OWNER ONLY
        Route::middleware('role:Owner|Admin|Developer')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('roles', AdminRoleController::class);
            Route::resource('settings', SiteSettingsController::class);
        });

        // OWNER + ADMIN
        // Route::resource('team', App\Http\Controllers\Admin\TeamController::class);

        Route::resource('partners', PartnersController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('messages', MessageController::class);
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);

        /*
        |--------------------------------------------------------------------------
        | Career Routes (ROLE BASED)
        |--------------------------------------------------------------------------
        */
        Route::get('career', [CareerController::class, 'index'])->name('career.index');
        Route::get('career/create', [CareerController::class, 'create'])->name('career.create');
        Route::post('career', [CareerController::class, 'store'])->name('career.store');
        Route::get('career/{type}/{id}/edit', [CareerController::class, 'edit'])->name('career.edit');
        Route::put('career/{type}/{id}', [CareerController::class, 'update'])->name('career.update');
        Route::delete('career/{type}/{id}', [CareerController::class, 'destroy'])->name('career.destroy');

        // Applications list (admin). Kept as the canonical named route.
        Route::get('applications', [CareerController::class, 'viewApplications'])->name('applications.index');

        Route::resource('company-sections', CompanySectionController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | People (No Middleware Here: Preserve Existing Behavior)
    |--------------------------------------------------------------------------
    */

    // Advisors
    Route::prefix('advisors')->name('admin.advisors.')->group(function() {
        Route::get('/', [PeopleController::class, 'advisorsIndex'])->name('index');
        Route::get('/create', [PeopleController::class, 'createAdvisor'])->name('create');
        Route::post('/store', [PeopleController::class, 'storeAdvisor'])->name('store');
        Route::get('/{person}/edit', [PeopleController::class, 'editAdvisor'])->name('edit');
        Route::put('/{person}', [PeopleController::class, 'updateAdvisor'])->name('update');
        Route::get('/{person}', [PeopleController::class, 'showAdvisor'])->name('show');
        Route::delete('/{person}', [PeopleController::class, 'destroyAdvisor'])->name('destroy');
    });

    // Team Members
    Route::prefix('team-members')->name('admin.team_members.')->group(function() {
        Route::get('/', [PeopleController::class, 'teamIndex'])->name('index');
        Route::get('/create', [PeopleController::class, 'createTeam'])->name('create');
        Route::post('/store', [PeopleController::class, 'storeTeam'])->name('store');
        Route::get('/{person}/edit', [PeopleController::class, 'editTeam'])->name('edit');
        Route::put('/{person}', [PeopleController::class, 'updateTeam'])->name('update');
        Route::get('/{person}', [PeopleController::class, 'showTeam'])->name('show');
        Route::delete('/{person}', [PeopleController::class, 'destroyTeam'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Gallery (AUTH ONLY)
    |--------------------------------------------------------------------------
    */
    Route::name('admin.')->middleware('auth')->group(function () {
        Route::resource('gallery', GalleryController::class);
    });
});

/*
|--------------------------------------------------------------------------
| Legacy Compatibility Routes
|--------------------------------------------------------------------------
|
| Keep the old URL working; the canonical admin route is now /admin/applications.
*/
Route::get('/applications', [CareerController::class, 'viewApplications'])
    ->middleware(['auth', 'role:Owner|Admin|Developer']);
