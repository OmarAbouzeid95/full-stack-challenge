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

Route::get('/companies', function () {
    return view('companies');
});

Route::get('/company/{id}', function () {
    return view('companyDetails');
});

Route::get('/sign-in', function () {
    return view('signin');
});

Route::fallback(function () {
    return view('notFound');
});
