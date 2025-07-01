<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
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
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return response()->json($blog, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return response()->json($blog, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->json(null, 204);
    }
}
