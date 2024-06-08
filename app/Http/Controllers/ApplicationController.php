<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return Application::with('jobPost', 'candidate', 'cv')->get();
    }

    public function store(Request $request)
    {
        $application = Application::create($request->all());
        return response()->json($application, 201);
    }

    public function show($id)
    {
        $application = Application::with('jobPost', 'candidate', 'cv')->find($id);
        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }
        return response()->json($application);
    }

    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }

        $application->update($request->all());
        return response()->json($application);
    }

    public function destroy($id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['error' => 'Application not found'], 404);
        }

        $application->delete();
        return response()->json(['message' => 'Application deleted successfully']);
    }
}


