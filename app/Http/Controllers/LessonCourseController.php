<?php

namespace App\Http\Controllers;

use App\Models\LessonCourse;
use App\Http\Requests\StoreLessonCourseRequest;
use App\Http\Requests\UpdateLessonCourseRequest;

class LessonCourseController extends Controller
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
    public function store(StoreLessonCourseRequest $request)
    {
        $lessonCourse = LessonCourse::create([
            'course_id' => $request->course_id,
            'video_id' => $request->video_id,
            'title' => $request->title,
            'description' => $request->description,

        ]);

        return response()->json($lessonCourse, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonCourse $lessonCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonCourse $lessonCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonCourseRequest $request, LessonCourse $lessonCourse)
    {
        $lessonCourse->update([
            'course_id' => $request->course_id,
            'video_id' => $request->video_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($lessonCourse, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonCourse $lessonCourse)
    {
        $lessonCourse->delete();

        return response()->json(null, 204);
    }
}
