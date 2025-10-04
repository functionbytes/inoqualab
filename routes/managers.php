<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Managers\BlogsController;
use App\Http\Controllers\Managers\CategoriesController;
use App\Http\Controllers\Managers\ConfigurationsController;
use App\Http\Controllers\Managers\ContactsController;
use App\Http\Controllers\Managers\DependenciesController;
use App\Http\Controllers\Managers\PetitionsController;
use App\Http\Controllers\Managers\PublicationsController;
use App\Http\Controllers\Managers\SchemesController;
use App\Http\Controllers\Managers\SlidersController;
use App\Http\Controllers\Managers\TagsController;
use App\Http\Controllers\Managers\TestimonialsController;
use App\Http\Controllers\Managers\TracingsController;
use App\Http\Controllers\Managers\UsersController;
use App\Http\Controllers\Managers\ApplicationsController;
use App\Http\Controllers\Managers\CanalsController;
use App\Http\Controllers\Managers\FaqsController;
use App\Http\Controllers\Managers\ServicesController;
use App\Http\Controllers\Managers\SectionsController;
use App\Http\Controllers\Managers\DashboardController;
use App\Http\Controllers\Managers\SystemsController;
use App\Http\Controllers\Managers\AnalyticsController;
use App\Http\Controllers\Managers\PartnersController;

Route::group(['prefix' => 'manager', 'middleware' => ['auth']], function () {


    Route::get('/', [DashboardController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('manager.home');
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('manager.analytics');


    Route::group(['prefix' => 'systems'], function () {
        Route::get('/', [SystemsController::class, 'index'])->name('manager.systems');
        Route::get('/create', [SystemsController::class, 'create'])->name('manager.systems.create');
        Route::post('/store', [SystemsController::class, 'store'])->name('manager.systems.store');
        Route::post('/update/{token}', [SystemsController::class, 'update'])->name('manager.systems.update');
        Route::get('/edit/{token}', [SystemsController::class, 'edit'])->name('manager.systems.edit');
        Route::get('/view/{token}', [SystemsController::class, 'view'])->name('manager.systems.view');
        Route::get('/destroy/{token}', [SystemsController::class, 'destroy'])->name('manager.systems.destroy');
    });


    Route::group(['prefix' => 'sections'], function () {
        Route::get('/', [SectionsController::class, 'index'])->name('manager.sections');
        Route::get('/create', [SectionsController::class, 'create'])->name('manager.sections.create');
        Route::post('/store', [SectionsController::class, 'store'])->name('manager.sections.store');
        Route::post('/update/{token}', [SectionsController::class, 'update'])->name('manager.sections.update');
        Route::get('/edit/{token}', [SectionsController::class, 'edit'])->name('manager.sections.edit');
        Route::get('/view/{token}', [SectionsController::class, 'view'])->name('manager.sections.view');
        Route::get('/destroy/{token}', [SectionsController::class, 'destroy'])->name('manager.sections.destroy');
    });


    Route::group(['prefix' => 'schemes'], function () {
        Route::get('/', [SchemesController::class, 'index'])->name('manager.schemes');
        Route::get('/create', [SchemesController::class, 'create'])->name('manager.schemes.create');
        Route::post('/store', [SchemesController::class, 'store'])->name('manager.schemes.store');
        Route::post('/update/{token}', [SchemesController::class, 'update'])->name('manager.schemes.update');
        Route::get('/edit/{token}', [SchemesController::class, 'edit'])->name('manager.schemes.edit');
        Route::get('/view/{token}', [SchemesController::class, 'view'])->name('manager.schemes.view');
        Route::get('/destroy/{token}', [SchemesController::class, 'destroy'])->name('manager.schemes.destroy');
    });


    Route::group(['prefix' => 'publications'], function () {
        Route::get('/', [PublicationsController::class, 'index'])->name('manager.publications');
        Route::get('/create', [PublicationsController::class, 'create'])->name('manager.publications.create');
        Route::post('/store', [PublicationsController::class, 'store'])->name('manager.publications.store');
        Route::post('/update/{token}', [PublicationsController::class, 'update'])->name('manager.publications.update');
        Route::get('/edit/{token}', [PublicationsController::class, 'edit'])->name('manager.publications.edit');
        Route::get('/view/{token}', [PublicationsController::class, 'view'])->name('manager.publications.view');
        Route::get('/destroy/{token}', [PublicationsController::class, 'destroy'])->name('manager.publications.destroy');

        Route::post('/file', [PublicationsController::class, 'storeFile'])->name('manager.publications.file');
        Route::get('/delete/file/{token}', [PublicationsController::class, 'deleteFile'])->name('manager.publications.delete.file');
        Route::get('/get/file/{token}', [PublicationsController::class, 'getFile'])->name('manager.blogs.publications.file');


    });


    Route::group(['prefix' => 'sliders'], function () {
        Route::get('/', [SlidersController::class, 'index'])->name('manager.sliders');
        Route::get('/create', [SlidersController::class, 'create'])->name('manager.sliders.create');
        Route::post('/store', [SlidersController::class, 'store'])->name('manager.sliders.store');
        Route::post('/update/{token}', [SlidersController::class, 'update'])->name('manager.sliders.update');
        Route::get('/edit/{token}', [SlidersController::class, 'edit'])->name('manager.sliders.edit');
        Route::get('/view/{token}', [SlidersController::class, 'view'])->name('manager.sliders.view');
        Route::get('/destroy/{token}', [SlidersController::class, 'destroy'])->name('manager.sliders.destroy');


        Route::post('/thumbnail', [SlidersController::class, 'storeThumbnail'])->name('manager.sliders.thumbnail');
        Route::get('/delete/thumbnail/{token}', [SlidersController::class, 'deleteThumbnail'])->name('manager.sliders.delete.thumbnail');
        Route::get('/get/thumbnail/{token}', [SlidersController::class, 'getThumbnail'])->name('manager.sliders.thumbnail');


    });


    Route::group(['prefix' => 'testimonials'], function () {
        Route::get('/', [TestimonialsController::class, 'index'])->name('manager.testimonials');
        Route::get('/create', [TestimonialsController::class, 'create'])->name('manager.testimonials.create');
        Route::post('/store', [TestimonialsController::class, 'store'])->name('manager.testimonials.store');
        Route::post('/update/{token}', [TestimonialsController::class, 'update'])->name('manager.testimonials.update');
        Route::get('/edit/{token}', [TestimonialsController::class, 'edit'])->name('manager.testimonials.edit');
        Route::get('/view/{token}', [TestimonialsController::class, 'view'])->name('manager.testimonials.view');
        Route::get('/destroy/{token}', [TestimonialsController::class, 'destroy'])->name('manager.testimonials.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('manager.categories');
        Route::get('/create', [CategoriesController::class, 'create'])->name('manager.categories.create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('manager.categories.store');
        Route::post('/update/{token}', [CategoriesController::class, 'update'])->name('manager.categories.update');
        Route::get('/edit/{token}', [CategoriesController::class, 'edit'])->name('manager.categories.edit');
        Route::get('/view/{token}', [CategoriesController::class, 'view'])->name('manager.categories.view');
        Route::get('/destroy/{token}', [CategoriesController::class, 'destroy'])->name('manager.categories.destroy');
    });


    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServicesController::class, 'index'])->name('manager.services');
        Route::get('/create', [ServicesController::class, 'create'])->name('manager.services.create');
        Route::post('/store', [ServicesController::class, 'store'])->name('manager.services.store');
        Route::post('/update/{token}', [ServicesController::class, 'update'])->name('manager.services.update');
        Route::get('/edit/{token}', [ServicesController::class, 'edit'])->name('manager.services.edit');
        Route::get('/view/{token}', [ServicesController::class, 'view'])->name('manager.services.view');
        Route::get('/destroy/{token}', [ServicesController::class, 'destroy'])->name('manager.services.destroy');

        Route::post('/thumbnail', [ServicesController::class, 'storeThumbnail'])->name('manager.services.thumbnail');
        Route::get('/delete/thumbnail/{token}', [ServicesController::class, 'deleteThumbnail'])->name('manager.services.delete.thumbnail');
        Route::get('/get/thumbnail/{token}', [ServicesController::class, 'getThumbnail'])->name('manager.services.thumbnail');

        Route::post('/pdf', [ServicesController::class, 'storePdf'])->name('manager.services.pdf');
        Route::get('/delete/pdf/{token}', [ServicesController::class, 'deletePdf'])->name('manager.services.delete.pdf');
        Route::get('/get/pdf/{token}', [ServicesController::class, 'getPdf'])->name('manager.services.pdf');

    });


    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagsController::class, 'index'])->name('manager.tags');
        Route::get('/create', [TagsController::class, 'create'])->name('manager.tags.create');
        Route::post('/store', [TagsController::class, 'store'])->name('manager.tags.store');
        Route::post('/update/{token}', [TagsController::class, 'update'])->name('manager.tags.update');
        Route::get('/edit/{token}', [TagsController::class, 'edit'])->name('manager.tags.edit');
        Route::get('/view/{token}', [TagsController::class, 'view'])->name('manager.tags.view');
        Route::get('/destroy/{token}', [TagsController::class, 'destroy'])->name('manager.tags.destroy');
    });


    Route::group(['prefix' => 'canals'], function () {
        Route::get('/', [CanalsController::class, 'index'])->name('manager.canals');
        Route::get('/create', [CanalsController::class, 'create'])->name('manager.canals.create');
        Route::post('/store', [CanalsController::class, 'store'])->name('manager.canals.store');
        Route::post('/update/{token}', [CanalsController::class, 'update'])->name('manager.canals.update');
        Route::get('/edit/{token}', [CanalsController::class, 'edit'])->name('manager.canals.edit');
        Route::get('/view/{token}', [CanalsController::class, 'view'])->name('manager.canals.view');
        Route::get('/destroy/{token}', [CanalsController::class, 'destroy'])->name('manager.canals.destroy');


        Route::post('/thumbnail', [CanalsController::class, 'storeThumbnail'])->name('manager.canals.thumbnail');
        Route::get('/delete/thumbnail/{token}', [CanalsController::class, 'deleteThumbnail'])->name('manager.canals.delete.thumbnail');
        Route::get('/get/thumbnail/{token}', [CanalsController::class, 'getThumbnail'])->name('manager.canals.thumbnail');

    });



    Route::group(['prefix' => 'applications'], function () {
        Route::get('/', [ApplicationsController::class, 'index'])->name('manager.applications');
        Route::get('/create', [ApplicationsController::class, 'create'])->name('manager.applications.create');
        Route::post('/store', [ApplicationsController::class, 'store'])->name('manager.applications.store');
        Route::post('/update/{token}', [ApplicationsController::class, 'update'])->name('manager.applications.update');
        Route::get('/edit/{token}', [ApplicationsController::class, 'edit'])->name('manager.applications.edit');
        Route::get('/view/{token}', [ApplicationsController::class, 'view'])->name('manager.applications.view');
        Route::get('/destroy/{token}', [ApplicationsController::class, 'destroy'])->name('manager.applications.destroy');
    });



    Route::group(['prefix' => 'faqs'], function () {
        Route::get('/', [FaqsController::class, 'index'])->name('manager.faqs');
        Route::get('/create', [FaqsController::class, 'create'])->name('manager.faqs.create');
        Route::post('/store', [FaqsController::class, 'store'])->name('manager.faqs.store');
        Route::post('/update/{token}', [FaqsController::class, 'update'])->name('manager.faqs.update');
        Route::get('/edit/{token}', [FaqsController::class, 'edit'])->name('manager.faqs.edit');
        Route::get('/view/{token}', [FaqsController::class, 'view'])->name('manager.faqs.view');
        Route::get('/destroy/{token}', [FaqsController::class, 'destroy'])->name('manager.faqs.destroy');
    });

    Route::group(['prefix' => 'faqs'], function () {
        Route::get('/', [FaqsController::class, 'index'])->name('manager.faqs');
        Route::get('/create', [FaqsController::class, 'create'])->name('manager.faqs.create');
        Route::post('/store', [FaqsController::class, 'store'])->name('manager.faqs.store');
        Route::post('/update/{token}', [FaqsController::class, 'update'])->name('manager.faqs.update');
        Route::get('/edit/{token}', [FaqsController::class, 'edit'])->name('manager.faqs.edit');
        Route::get('/view/{token}', [FaqsController::class, 'view'])->name('manager.faqs.view');
        Route::get('/destroy/{token}', [FaqsController::class, 'destroy'])->name('manager.faqs.destroy');
    });

    Route::group(['prefix' => 'dependencies'], function () {
        Route::get('/', [DependenciesController::class, 'index'])->name('manager.dependencies');
        Route::get('/create', [DependenciesController::class, 'create'])->name('manager.dependencies.create');
        Route::post('/store', [DependenciesController::class, 'store'])->name('manager.dependencies.store');
        Route::post('/update/{token}', [DependenciesController::class, 'update'])->name('manager.dependencies.update');
        Route::get('/edit/{token}', [DependenciesController::class, 'edit'])->name('manager.dependencies.edit');
        Route::get('/view/{token}', [DependenciesController::class, 'view'])->name('manager.dependencies.view');
        Route::get('/destroy/{token}', [DependenciesController::class, 'destroy'])->name('manager.dependencies.destroy');
    });


    Route::group(['prefix' => 'partners'], function () {
        Route::get('/', [PartnersController::class, 'index'])->name('manager.partners');
        Route::get('/create', [PartnersController::class, 'create'])->name('manager.partners.create');
        Route::post('/store', [PartnersController::class, 'store'])->name('manager.partners.store');
        Route::post('/update/{token}', [PartnersController::class, 'update'])->name('manager.partners.update');
        Route::get('/edit/{token}', [PartnersController::class, 'edit'])->name('manager.partners.edit');
        Route::get('/view/{token}', [PartnersController::class, 'view'])->name('manager.partners.view');
        Route::get('/destroy/{token}', [PartnersController::class, 'destroy'])->name('manager.partners.destroy');


        Route::post('/thumbnail', [PartnersController::class, 'storeThumbnail'])->name('manager.blogs.thumbnail');
        Route::get('/delete/thumbnail/{token}', [PartnersController::class, 'deleteThumbnail'])->name('manager.blogs.delete.thumbnail');
        Route::get('/get/thumbnail/{token}', [PartnersController::class, 'getThumbnail'])->name('manager.blogs.blog.thumbnail');

        Route::post('/pdf', [PartnersController::class, 'storePdf'])->name('manager.storePdf.pdf');
        Route::get('/delete/pdf/{token}', [PartnersController::class, 'deletePdf'])->name('manager.delete.pdf');
        Route::get('/get/pdf/{token}', [PartnersController::class, 'getPdf'])->name('manager.partner.pdf');

    });


    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', [BlogsController::class, 'index'])->name('manager.blogs');
        Route::get('/create', [BlogsController::class, 'create'])->name('manager.blogs.create');
        Route::post('/store', [BlogsController::class, 'store'])->name('manager.blogs.store');
        Route::post('/update/{token}', [BlogsController::class, 'update'])->name('manager.blogs.update');
        Route::get('/edit/{token}', [BlogsController::class, 'edit'])->name('manager.blogs.edit');
        Route::get('/view/{token}', [BlogsController::class, 'view'])->name('manager.blogs.view');
        Route::get('/destroy/{token}', [BlogsController::class, 'destroy'])->name('manager.blogs.destroy');

        Route::post('/thumbnail', [BlogsController::class, 'storeThumbnail'])->name('manager.blogs.thumbnail');
        Route::get('/delete/thumbnail/{token}', [BlogsController::class, 'deleteThumbnail'])->name('manager.blogs.delete.thumbnail');
        Route::get('/get/thumbnail/{token}', [BlogsController::class, 'getThumbnail'])->name('manager.blogs.blog.thumbnail');
    });


    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', [ContactsController::class, 'index'])->name('manager.contacts');
        Route::get('/create', [ContactsController::class, 'create'])->name('manager.contacts.create');
        Route::post('/update', [ContactsController::class, 'update'])->name('manager.contacts.update');
        Route::get('/edit/{token}', [ContactsController::class, 'edit'])->name('manager.contacts.edit');
        Route::get('/destroy/{token}', [ContactsController::class, 'destroy'])->name('manager.contacts.destroy');
    });

    Route::group(['prefix' => 'configurations'], function () {
        Route::get('/', [ConfigurationsController::class, 'index'])->name('manager.configurations');
        Route::post('/update', [ConfigurationsController::class, 'update'])->name('manager.configurations.update');
        Route::get('/edit/{token}', [ConfigurationsController::class, 'edit'])->name('manager.configurations.edit');
        Route::get('/destroy/{token}', [ConfigurationsController::class, 'destroy'])->name('manager.configurations.destroy');
    });


    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('manager.users');
        Route::get('/create', [UsersController::class, 'create'])->name('manager.users.create');
        Route::post('/store', [UsersController::class, 'store'])->name('manager.users.store');
        Route::post('/update/{token}', [UsersController::class, 'update'])->name('manager.users.update');
        Route::get('/edit/{token}', [UsersController::class, 'edit'])->name('manager.users.edit');
        Route::get('/view/{token}', [UsersController::class, 'view'])->name('manager.users.view');
        Route::get('/destroy/{token}', [UsersController::class, 'destroy'])->name('manager.users.destroy');
    });


    Route::group(['prefix' => 'petitions'], function () {

        Route::get('/', [PetitionsController::class, 'index'])->name('manager.petitions');
        Route::get('/create', [PetitionsController::class, 'create'])->name('manager.petitions.create');
        Route::post('/store', [PetitionsController::class, 'store'])->name('manager.petitions.store');
        Route::post('/update/{token}', [PetitionsController::class, 'update'])->name('manager.petitions.update');
        Route::get('/edit/{token}', [PetitionsController::class, 'edit'])->name('manager.petitions.edit');
        Route::get('/view/{token}', [PetitionsController::class, 'view'])->name('manager.petitions.view');
        Route::get('/tracing/{token}', [PetitionsController::class, 'tracing'])->name('manager.petitions.tracing');
        Route::get('/destroy/{token}', [PetitionsController::class, 'destroy'])->name('manager.petitions.destroy');
        Route::get('/tracing/destroy/{slack}', [TracingsController::class, 'destroy'])->name('manager.tracings.destroy');


        Route::post('/search', [PetitionsController::class, 'search'])->name('manager.petitions.search');
        Route::post('/actions', [PetitionsController::class, 'actions'])->name('manager.petitions.actions');
        Route::post('/filters', [PetitionsController::class, 'filters'])->name('manager.petitions.filters');
        Route::post('/search', [PetitionsController::class, 'search'])->name('manager.petitions.search');

        Route::post('/tracing/store', [TracingsController::class, 'store'])->name('manager.tracings.store');
        Route::post('/search/actions', [PetitionsController::class, 'searchActions'])->name('manager.petitions.search.actions');

    });



});