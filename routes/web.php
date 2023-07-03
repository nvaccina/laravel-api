<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Rotte Guest
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/news', [PageController::class, 'news'])->name('news');

//Rotte Admin
Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('home');
        Route::get('/settings',[DashboardController::class, 'settings'])->name('settings');
        Route::get('/stats',[DashboardController::class, 'stats'])->name('stats');

        Route::resource('works', WorkController::class);

        Route::resource('types', TypeController::class);
        Route::resource('technology', TechnologyController::class);
        Route::get('type-works', [WorkController::class, 'typeWorks'])->name('type_works');
        Route::get('technology-works', [WorkController::class, 'technologyWorks'])->name('technology_works');
    });

require __DIR__.'/auth.php';

Route::get('{any?}', function(){
    return view('guest.home');
})->where('any','.*')->name('home');
