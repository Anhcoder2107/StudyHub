<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Course/Index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = \App\Models\Course::findOrFail($id);
        $user = Auth::user();

        return Inertia::render('Course/Show', [
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function discover()
    {
        $courses = \App\Models\Course::all();
        return Inertia::render('Course/Discover', [
            'courses' => $courses,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $courses = \App\Models\Course::where('course_name', 'like', '%' . $query . '%')
            ->orWhere('course_description', 'like', '%' . $query . '%')
            ->get();

        return Inertia::render('Course/Search', [
            'courses' => $courses,
            'query' => $query,
        ]);
    }

    //details
    public function details($id = 4)
    {
        $course = \App\Models\Course::findOrFail($id);
        $user = Auth::user();
        return Inertia::render('Course/Detail', [
            'course' => $course,
            'user' => $user,
        ]);
    }

}


