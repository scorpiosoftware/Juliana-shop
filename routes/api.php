<?php

use App\Http\Controllers\StoreSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/sections/{id}/branches', [StoreSectionController::class, 'getBranches'])->name('sections.branches');