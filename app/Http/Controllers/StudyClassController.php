<?php

namespace App\Http\Controllers;

use App\Models\StudyClass;
use App\Http\Requests\StoreStudyClassRequest;
use App\Http\Requests\UpdateStudyClassRequest;
use Illuminate\Http\Request;

class StudyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyClasses = StudyClass::orderBy('created_at', 'desc')->paginate(10);
        return response()->json($studyClasses, 200);
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
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return response()->json($studyClass, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $studyClass = StudyClass::find($id);
        if (!$studyClass) {
            return response()->json(['message' => 'Study class not found'], 404);
        }
        return response()->json($studyClass);
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
    public function update(Request $request, string $id)
    {
        $studyClass = StudyClass::find($id);
        if (!$studyClass) {
            return response()->json(['message' => 'Study class not found'], 404);
        }

        $studyClass->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return response()->json($studyClass, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studyClass = StudyClass::find($id);
        if (!$studyClass) {
            return response()->json(['message' => 'Study class not found'], 404);
        }
        $studyClass->delete();
        return response()->json(null, 204);
    }

    public function getAllClasses()
    {
        $studyClasses = StudyClass::orderBy('created_at', 'desc')->paginate(10);

        return response()->json($studyClasses, 200);
    }
}
