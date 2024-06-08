<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CV_Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return Candidate::with('c_v__candidates', 'applications')->get();
    }

    public function show($id)
    {
        $candidate = Candidate::with('c_v__candidates', 'applications')->findOrFail($id);
        return response()->json($candidate);
    }

    public function store(Request $request)
    {
        $candidate = Candidate::create($request->all());
        return response()->json($candidate, 201);
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update($request->all());
        return response()->json($candidate);
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return response()->json(['message' => 'Candidate deleted successfully']);
    }
}
