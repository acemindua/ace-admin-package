<?php

use Illuminate\Support\Facades\Route;
use Ace\Admin\Http\Controllers\DashboardController;

Route::prefix('admin-panel')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});
