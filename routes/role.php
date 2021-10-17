<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RoleController::class, "index"])->name('admin.roles.index');
Route::get("/create", [RoleController::class, "create"])->name('admin.roles.create');
Route::post("/", [RoleController::class, "store"])->name('admin.roles.store');
Route::get("/{role}", [RoleController::class, "show"])->middleware('can:viewAny,\App\Models\Role')->name('admin.roles.show');
Route::patch("/{role}", [RoleController::class, "patch"])->name('admin.roles.patch');
Route::delete("/{role}", [RoleController::class, "destroy"])->middleware('can:delete,role')->name('admin.roles.destroy');
