<?php

namespace App\Http\Controllers;

use App\Models\ExaminationSubmit;
use App\Http\Requests\StoreExaminationSubmitRequest;
use App\Http\Requests\UpdateExaminationSubmitRequest;

class ExaminationSubmitController extends Controller
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
    public function store(StoreExaminationSubmitRequest $request)
    {
        $examinationSubmit = ExaminationSubmit::create([
            'user_id' => $request->user_id,
            'examination_id' => $request->examination_id,
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ]);

        return response()->json($examinationSubmit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExaminationSubmit $examinationSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExaminationSubmit $examinationSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExaminationSubmitRequest $request, ExaminationSubmit $examinationSubmit)
    {
        $examinationSubmit->update([
            'user_id' => $request->user_id,
            'examination_id' => $request->examination_id,
            'question_id' => $request->question_id,
            'answer' => $request->answer,
        ]);

        return response()->json($examinationSubmit, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExaminationSubmit $examinationSubmit)
    {
        $examinationSubmit->delete();

        return response()->json(null, 204);
    }
}
