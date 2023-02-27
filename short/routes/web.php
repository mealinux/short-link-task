<?php

use App\Http\Controllers\ShortController;
use App\Http\Controllers\ShortlyController;
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


Route::domain('shr.ly')->group(function(){

    Route::get('/', function(){
        return redirect('https://short.test');
    });

    Route::get('/{code}', [ShortlyController::class, 'index']);

});


Route::domain('short.test')->group(function(){

    Route::get('/', [ShortController::class, 'index']);
    Route::post('/', [ShortController::class, 'addLink']);

    
    
    require __DIR__.'/auth.php';

});


