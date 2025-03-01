<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index(Request $request) {

    $companies = Company::paginate(10);
    return response()->json($companies);

    }

    public function show($id)
    {
        $company = Company::with('jobPostings')->find($id);
        
        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        return response()->json($company);
    }
}
