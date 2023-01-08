<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellingRequest;
use App\Http\Requests\UpdateSellingRequest;
use App\Models\Selling;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selling  $selling
     * @return \Illuminate\Http\Response
     */
    public function show(Selling $selling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selling  $selling
     * @return \Illuminate\Http\Response
     */
    public function edit(Selling $selling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellingRequest  $request
     * @param  \App\Models\Selling  $selling
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellingRequest $request, Selling $selling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selling  $selling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selling $selling)
    {
        //
    }
}
