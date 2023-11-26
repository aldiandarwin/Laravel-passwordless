<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginFromMagicLinkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get("/", HomeController::class)->name("home");
Route::get("dashboard", DashboardController::class)
    ->name("dashboard")
    ->middleware("auth");

Route::middleware("guest")->group(function () {
    Route::get("login", [LoginController::class, "create"])->name("login");
    Route::post("login", [LoginController::class, "store"]);

    Route::get("login/wml/{user:email}", LoginFromMagicLinkController::class)
        ->name("login.with-magic-link")
        ->middleware("signed");

    Route::get("register", [RegisterController::class, "create"])->name(
        "register",
    );
    Route::post("register", [RegisterController::class, "store"]);
});

Route::post("logout", LogoutController::class)
    ->name("logout")
    ->middleware("auth");
