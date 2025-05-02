<?php

namespace App\Http\Controllers;

use App\Models\Livestream;
use App\Http\Requests\StoreLivestreamRequest;
use App\Http\Requests\UpdateLivestreamRequest;

class LivestreamController extends Controller
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
    public function store(StoreLivestreamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Livestream $livestream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livestream $livestream)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivestreamRequest $request, Livestream $livestream)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livestream $livestream)
    {
        //
    }
}
