<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\CompanyController;

Route::get('/job-postings', [JobPostingController::class, 'index']);
Route::post('/job-postings/filter', [JobPostingController::class, 'filter']);
Route::get('/job-postings/{id}', [JobPostingController::class, 'find']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'find']);
