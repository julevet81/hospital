<?php

use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        ########### Dashboard User Routes ###########
        Route::get('/dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        ############# Dashboard User Routes End ###########
    
        ##################### Admin Routes #####################
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->middleware(['auth:admin', 'verified'])
            ->name('dashboard.index');

        Route::get('/dashboard/sections', [SectionController::class, 'index'])
            ->middleware(['auth:admin', 'verified'])
            ->name('dashboard.sections.index');

        ##################### Admin Routes #####################
    
        Route::resource('sections', SectionController::class)
            ->middleware(['auth:admin', 'verified'])
            ->names('dashboard.sections');
        

        ############### Admin Routes End ###############
    
        ################# Dashboard Routes  ################
    
        Route::middleware(['auth:admin', 'verified'])->group(function () {
            
            Route::resource('sections', SectionController::class);
            Route::resource('doctors', DoctorController::class);

            
        });


        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });



        require __DIR__ . '/auth.php';
    }
);


