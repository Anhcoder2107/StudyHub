<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Http\Requests\StoreStudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;

class StudentClassController extends Controller
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
    public function store(StoreStudentClassRequest $request)
    {
        $studentClass = StudentClass::create([
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
            'status' => $request->status,
            'start_time' => $request->start_time,
            'description' => $request->description,
        ]);

        return response()->json($studentClass, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentClass $studentClass)
    {
        return response()->json($studentClass);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentClass $studentClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentClassRequest $request, StudentClass $studentClass)
    {
        $studentClass->update([
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
            'status' => $request->status,
            'start_time' => $request->start_time,
            'description' => $request->description,
        ]);

        return response()->json($studentClass, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $studentClass)
    {
        $studentClass->delete();

        return response()->json(null, 204);
    }
}
