<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;

Route::get('/test', function () {
    $companies = Company::with('jobPostings')->get();
    return response()->json($companies);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/jobs/{id}', function () {
    return view('jobDetails');
});

Route::get('/sign-in', function () {
    return view('signin');
});
