<?php

namespace App\Http\Controllers;

use App\Models\CV_Candidate;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        return CV_Candidate::with('candidate')->get();
    }

    public function store(Request $request)
    {
        $candidate = Candidate::find($request->candidate_id);
        if ($candidate->cvs()->count() >= 2) {
            return response()->json(['error' => 'Maximum 2 CVs allowed'], 403);
        }

        $cv = CV_Candidate::create($request->all());
        return response()->json($cv, 201);
    }

    public function show($id)
    {
        $cv = CV_Candidate::with('candidate')->find($id);
        if (!$cv) {
            return response()->json(['error' => 'CV not found'], 404);
        }
        return response()->json($cv);
    }

    public function update(Request $request, $id)
    {
        $cv = CV_Candidate::find($id);
        if (!$cv) {
            return response()->json(['error' => 'CV not found'], 404);
        }

        $cv->update($request->all());
        return response()->json($cv);
    }

    public function destroy($id)
    {
        $cv = CV_Candidate::find($id);
        if (!$cv) {
            return response()->json(['error' => 'CV not found'], 404);
        }

        $cv->delete();
        return response()->json(['message' => 'CV deleted successfully']);
    }
}

