<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Basket/Basket');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //checkout
    public function checkout()
    {
        return Inertia::render('Basket/Checkout');
    }

    //payment
    public function payment()
    {
        // return Inertia::render('Basket/Payment');
    }

    //payment success
    public function paymentSuccess()
    {
        return Inertia::render('Payment/PaymentSuccess');
    }

    //payment list
    public function paymentList()
    {
        return Inertia::render('Payment/PaymentList');
    }
}
