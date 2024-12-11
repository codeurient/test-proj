<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('genres',           [GenreController::class, 'store']);         // Yeni janr yaratmaq
Route::get('genres',            [GenreController::class, 'index']);         // Bütün janrları göstərmək
Route::get('genres/{id}',       [GenreController::class, 'show']);          // Bir janrı göstərmək
Route::put('genres/{id}',       [GenreController::class, 'update']);        // Janrı yeniləmək
Route::delete('genres/{id}',    [GenreController::class, 'destroy']);       // Janrı silmək





Route::post('movies',               [MovieController::class, 'store']);             // Yeni film yaratmaq
Route::get('movies',                [MovieController::class, 'index']);             // Bütün filmləri göstərmək
Route::get('movies/{id}',           [MovieController::class, 'show']);              // Bir filmi göstərmək
Route::put('movies/{id}',           [MovieController::class, 'update']);            // Filmi yeniləmək
Route::delete('movies/{id}',        [MovieController::class, 'destroy']);           // Filmi silmək
Route::post('movies/{id}/publish',  [MovieController::class, 'publish']);           // Filmi yayımlamaq



