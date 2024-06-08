<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return Employer::with('jobPosts')->get();
    }

    public function show($id)
    {
        $employer = Employer::with('jobPosts')->findOrFail($id);
        return response()->json($employer);
    }

    public function store(Request $request)
    {
        $employer = Employer::create($request->all());
        return response()->json($employer, 201);
    }

    public function update(Request $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->update($request->all());
        return response()->json($employer);
    }

    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->delete();
        return response()->json(['message' => 'Employer deleted successfully']);
    }
}
