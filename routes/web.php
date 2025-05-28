<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\ApplicationsController;
use App\Http\Controllers\Pages\BlogsController;
use App\Http\Controllers\Pages\CanalsController;
use App\Http\Controllers\Pages\ContactsController;
use App\Http\Controllers\Pages\FaqsController;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Pages\PetitionsController;
use App\Http\Controllers\Pages\PublicationsController;
use App\Http\Controllers\Pages\RegulationsController;
use App\Http\Controllers\Pages\SchemesController;
use App\Http\Controllers\Pages\ServicesController;

Route::group(['middleware' => ['web']], function() {

    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('/home', [PagesController::class, 'home'])->name('home');
    Route::get('/about', [PagesController::class, 'abouts'])->name('about');
    Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs');
    Route::get('/system', [PagesController::class, 'system'])->name('system');
    Route::get('/contact', [ContactsController::class, 'index'])->name('contacts');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
    Route::get('/canals', [CanalsController::class, 'index'])->name('canals');
    Route::get('/analysis', [RegulationsController::class, 'analysis'])->name('analysis');
    Route::get('/regulations', [RegulationsController::class, 'analysis'])->name('regulations');
    Route::get('/application', [ApplicationsController::class, 'analysis'])->name('applications');
    Route::get('/terms', [PagesController::class, 'terms'])->name('terms');
    Route::get('/politics', [PagesController::class, 'politics'])->name('politics');
    Route::get('/application', [ApplicationsController::class, 'index'])->name('applications');
    Route::get('/pqrsf', [PetitionsController::class, 'index'])->name('pqrsf');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/filters', [BlogsController::class, 'index'])->name('blogs.filters');

    Route::post('/pqr/store', [PetitionsController::class, 'store'])->name('petition.store');
    Route::post('/contacts/store', [ContactsController::class, 'store'])->name('contacts.store');
    Route::post('/application/store', [ApplicationsController::class, 'application'])->name('services.application');

    Route::get('/blogs/{slug}', [BlogsController::class, 'view'])->name('blogs.view');
    Route::get('/schemes/{slack}', [SchemesController::class, 'view'])->name('schemes.view');
    Route::get('/services/{slug}', [ServicesController::class, 'view'])->name('services.view');
    Route::get('/publications/{slack}', [PublicationsController::class, 'view'])->name('publications.view');

    Route::get('/blogs/tags/{slug}', [BlogsController::class, 'tags'])->name('blogs.tags');
    Route::get('/pqr/success/{slack}', [PetitionsController::class, 'success'])->name('petition.success');
    Route::get('/blogs/categories/{slug}', [BlogsController::class, 'categories'])->name('blogs.categories');;

    Route::get('/clear', function() {
        Artisan::call('dump-autoload');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        return '<h1>Cache Borrado</h1>';
    });

});
