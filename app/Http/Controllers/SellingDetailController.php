<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellingDetailRequest;
use App\Http\Requests\UpdateSellingDetailRequest;
use App\Models\SellingDetail;

class SellingDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreSellingDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellingDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellingDetail  $sellingDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SellingDetail $sellingDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellingDetail  $sellingDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(SellingDetail $sellingDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellingDetailRequest  $request
     * @param  \App\Models\SellingDetail  $sellingDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellingDetailRequest $request, SellingDetail $sellingDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellingDetail  $sellingDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellingDetail $sellingDetail)
    {
        //
    }
}
