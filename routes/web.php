<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginFromMagicLinkController;

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

// Route::get("/", function () {
//     return view("welcome");
// });

Route::get("login", [LoginController::class, "create"])->name("login");
Route::post("login", [LoginController::class, "store"]);

Route::get("login/wml/{user:email}", LoginFromMagicLinkController::class)->name(
    "login.with-magic-link",
);
