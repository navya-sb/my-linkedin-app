<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        return Interview::with('jobPost', 'candidate')->get();
    }

    public function store(Request $request)
    {
        $interview = Interview::create($request->all());
        // Send notification to candidate
        // ...
        return response()->json($interview, 201);
    }

    public function show($id)
    {
        $interview = Interview::with('jobPost', 'candidate')->find($id);
        if (!$interview) {
            return response()->json(['error' => 'Interview not found'], 404);
        }
        return response()->json($interview);
    }

    public function update(Request $request, $id)
    {
        $interview = Interview::find($id);
        if (!$interview) {
            return response()->json(['error' => 'Interview not found'], 404);
        }

        $interview->update($request->all());
        return response()->json($interview);
    }

    public function destroy($id)
    {
        $interview = Interview::find($id);
        if (!$interview) {
            return response()->json(['error' => 'Interview not found'], 404);
        }

        $interview->delete();
        return response()->json(['message' => 'Interview deleted successfully']);
    }
}


