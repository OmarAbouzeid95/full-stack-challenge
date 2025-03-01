<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\CompanyController;

Route::get('/job-postings', [JobPostingController::class, 'index']);
Route::get('/job-postings/filter', [JobPostingController::class, 'filter']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
