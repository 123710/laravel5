<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;


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


Route::get('/', [BandController::class, 'showbands'])->name('show.bands');
Route::get('/zoeken', [SearchController::class, 'showSearchResults'])->name('search.results');



Auth::routes();


Route::resource('bands', 'App\Http\Controllers\AdminController');
Route::get('/video', [BandController::class, 'video'])->name('video');
Route::get('/nieuw', [AdminController::class, 'create'])->name('band.create');
Route::post('/nieuw', [AdminController::class, 'store'])->name('band.store');

  Route::prefix('bands')->group(function() {

    Route::group(['prefix' => '/{band}'], function (){
      Route::put('/update',[AdminController::class,'update'])->name('bands.update');
        Route::get('/edit',[AdminController::class,'edit'])->name('bands.edit');
        Route::delete('/delete',[AdminController::class,'destroy'])->name('bands.delete');
    });
  });
