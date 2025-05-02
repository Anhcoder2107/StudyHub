<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use App\Http\Requests\StoreStudentCourseRequest;
use App\Http\Requests\UpdateStudentCourseRequest;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreStudentCourseRequest $request)
    {
        $studentCourse = StudentCourse::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'status' => $request->status,
            'start_time' => $request->start_time,
            'progress' => $request->progress,
        ]);

        return response()->json($studentCourse, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentCourseRequest $request, StudentCourse $studentCourse)
    {
        $studentCourse->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'status' => $request->status,
            'start_time' => $request->start_time,
            'progress' => $request->progress,
        ]);

        return response()->json($studentCourse, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentCourse $studentCourse)
    {
        $studentCourse->delete();

        return response()->json(null, 204);
    }
}
