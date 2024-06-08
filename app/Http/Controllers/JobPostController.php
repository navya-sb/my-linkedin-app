<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Employer;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        return JobPost::with('employer')->get();
    }

    public function show($id)
    {
        $jobPost = JobPost::with('employer')->findOrFail($id);
        return response()->json($jobPost);
    }

    public function store(Request $request)
    {
        $employer = Employer::find($request->employer_id);
        if ($employer->jobPosts()->count() >= 5) {
            return response()->json(['error' => 'Maximum 5 job posts allowed'], 403);
        }

        $jobPost = JobPost::create($request->all());
        return response()->json($jobPost, 201);
    }

    public function update(Request $request, $id)
    {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->update($request->all());
        return response()->json($jobPost);
    }

    public function destroy($id)
    {
        $jobPost = JobPost::findOrFail($id);
        $jobPost->delete();
        return response()->json(['message' => 'Job post deleted successfully']);
    }
}
