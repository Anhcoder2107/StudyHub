<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use App\Http\Requests\StoreStudyClassRequest;
use App\Http\Requests\UpdateStudyClassRequest;

class StudyClassController extends Controller
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
    public function store(StoreStudyClassRequest $request)
    {
        $studyClass = StudyClass::create([
            'class_name' => $request->class_name,
            'class_description' => $request->class_description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return response()->json($studyClass, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyClass $studyClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyClass $studyClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudyClassRequest $request, StudyClass $studyClass)
    {
        $studyClass->update([
            'class_name' => $request->class_name,
            'class_description' => $request->class_description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return response()->json($studyClass, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyClass $studyClass)
    {
        $studyClass->delete();
        return response()->json(null, 204);
    }
}
