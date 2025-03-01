<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;

Route::get('/test', function () {
    $companies = Company::with('jobPostings')->get();
    return response()->json($companies);
});

Route::get('/', function () {
    return view('welcome');
});
