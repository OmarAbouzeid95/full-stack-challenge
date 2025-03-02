<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobPostingController extends Controller
{
    public function index(Request $request)
    {
        // fetch 10 posts per request/page
        $jobPostings = JobPosting::with('company')->paginate(10);
        return response()->json($jobPostings);
    }

    public function find($id)
    {
        $jobPosting = JobPosting::with('company')->find($id);
        
        if (!$jobPosting) {
            return response()->json(['error' => 'Job posting not found'], 404);
        }

        return response()->json($jobPosting);
    }
    
    public function filter(Request $request)
{
    $query = JobPosting::query()->with('company');
    
    if ($request->has('title')) {
        $query->where('title', 'like', '%' . $request->input('title') . '%');
    }
    
    if ($request->has('salary')) {
        $query->where('salary', '>=', $request->input('salary'));
    }
    
    if ($request->has('location')) {
        $query->where('location', 'like', '%' . $request->input('location') . '%');
    }
    
    if ($request->has('type')) {
        $query->where('type', $request->input('type'));
    }
    
    
    $query->orderBy('created_at', 'desc');
    $filteredJobPostings = $query->paginate($request->input('per_page', 10));
    $filteredJobPostings->appends($request->all());
    
    return response()->json($filteredJobPostings);
}

}
