<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Http\Requests\StoreExaminationRequest;
use App\Http\Requests\UpdateExaminationRequest;

class ExaminationController extends Controller
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
    public function store(StoreExaminationRequest $request)
    {
        $examination = Examination::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
            'max_score' => $request->max_score,
        ]);

        return response()->json($examination, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Examination $examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExaminationRequest $request, Examination $examination)
    {
        $examination->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'duration' => $request->duration,
            'max_score' => $request->max_score,
        ]);

        return response()->json($examination, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examination $examination)
    {
        $examination->delete();

        return response()->json(null, 204);
    }
}
