<?php

/** Documentation */

use Jonassiewertsen\Documentation\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/documentation/{slug}', [DocumentationController::class, 'show'])->name('documentation.show');
Route::get('/documentation/{parent}/{slug}', [DocumentationController::class, 'showChild'])->name('documentation.child.show');
