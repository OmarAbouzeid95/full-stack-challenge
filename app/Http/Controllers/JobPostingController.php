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
        $query = JobPosting::query();
        
        // filtering logic
        if ($request->has('name')) {
            $query->where('title', 'like', '%' . $request->get('name') . '%');
        }
        
        if ($request->has('salary')) {
            $query->where('salary', '>=', $request->get('salary'));
        }
        
        if ($request->has('company')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->get('company') . '%');
            });
        }
        
        if ($request->has('type')) {
            $query->where('type', $request->get('type'));
        }
        
        $filteredJobPostings = $query->paginate(10);
        
        return response()->json($filteredJobPostings);
    }
}
