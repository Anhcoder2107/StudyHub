<?php

namespace App\Http\Controllers;

use App\Models\CategoryCourse;
use App\Http\Requests\StoreCategoryCourseRequest;
use App\Http\Requests\UpdateCategoryCourseRequest;

class CategoryCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryCourse::all();
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
    public function store(StoreCategoryCourseRequest $request)
    {
        $categoryCourse = CategoryCourse::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);

        return response()->json($categoryCourse, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryCourse $categoryCourse)
    {
        return response()->json($categoryCourse);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryCourse $categoryCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryCourseRequest $request, CategoryCourse $categoryCourse)
    {
        $categoryCourse->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ]);

        return response()->json($categoryCourse, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryCourse $categoryCourse)
    {
        $categoryCourse->delete();

        return response()->json(null, 204);
    }
}
