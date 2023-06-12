<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FormController;
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

Route::get('/', fn () => view('index'));
Route::get('/queryString', [FormController::class, 'queryString']);

Route::get('/hello_world', fn () => view('helloworld', ['name'=>'三宅']));

Route::get('/profile/{id}', [FormController::class, 'profile']);
