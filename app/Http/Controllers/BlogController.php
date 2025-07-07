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
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return response()->json($blogs, 200);
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

        //move file to public storage
        $image = $request->image;
        $name_image = $image->getClientOriginalName();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('blogs', $name_image, 'public');
            $request->merge(['image' => $imagePath]);
        }

        $blog = Blog::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $name_image,
        ]);

        return to_route('admin.blogs.index')->with('success', 'Blog created successfully.');
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
        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //move file to public storage
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name_image = $image->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('blogs', $name_image, 'public');
            $request->merge(['image' => $imagePath]);
        } else {
            $name_image = $blog->image; // Keep the existing image if not updated
        }
        $blog->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $name_image,
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
