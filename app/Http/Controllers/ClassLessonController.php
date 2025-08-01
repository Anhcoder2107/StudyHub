<?php

namespace App\Http\Controllers;

use App\Models\ClassLesson;
use App\Http\Requests\StoreClassLessonRequest;
use App\Http\Requests\UpdateClassLessonRequest;

class ClassLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classLessons = ClassLesson::orderBy('created_at', 'desc')->paginate(10);

        return response()->json($classLessons, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassLessonRequest $request)
    {
        $classLesson = ClassLesson::create([
            'class_id' => $request->class_id,
            'video_id' => $request->video_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($classLesson, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassLesson $classLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassLesson $classLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassLessonRequest $request, ClassLesson $classLesson)
    {
        $classLesson->update([
            'class_id' => $request->class_id,
            'video_id' => $request->video_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($classLesson, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassLesson $classLesson)
    {
        $classLesson->delete();

        return response()->json(null, 204);
    }


}
