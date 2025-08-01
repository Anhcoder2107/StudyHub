<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
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
    public function store(StoreVideoRequest $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'duration' => $request->duration,
        ]);

        return response()->json($video, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'duration' => $request->duration,
        ]);

        return response()->json($video, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return response()->json(null, 204);
    }
}
