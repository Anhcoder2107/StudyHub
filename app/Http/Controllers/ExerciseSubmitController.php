<?php

namespace App\Http\Controllers;

use App\Models\ExerciseSubmit;
use App\Http\Requests\StoreExerciseSubmitRequest;
use App\Http\Requests\UpdateExerciseSubmitRequest;

class ExerciseSubmitController extends Controller
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
    public function store(StoreExerciseSubmitRequest $request)
    {
        $exerciseSubmit = ExerciseSubmit::create([
            'user_id' => $request->user_id,
            'exercise_id' => $request->exercise_id,
            'submit_time' => $request->submit_time,
            'file_url' => $request->file_url,
        ]);

        return response()->json($exerciseSubmit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExerciseSubmit $exerciseSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExerciseSubmit $exerciseSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseSubmitRequest $request, ExerciseSubmit $exerciseSubmit)
    {
        $exerciseSubmit->update([
            'user_id' => $request->user_id,
            'exercise_id' => $request->exercise_id,
            'submit_time' => $request->submit_time,
            'file_url' => $request->file_url,
        ]);

        return response()->json($exerciseSubmit, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExerciseSubmit $exerciseSubmit)
    {
        $exerciseSubmit->delete();

        return response()->json(null, 204);
    }
}
