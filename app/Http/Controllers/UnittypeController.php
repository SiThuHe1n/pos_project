<?php

namespace App\Http\Controllers;

use App\Models\Unittype;
use App\Http\Requests\StoreUnittypeRequest;
use App\Http\Requests\UpdateUnittypeRequest;

class UnittypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Unittype::all();
        return response()->json($data, 200);
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
     * @param  \App\Http\Requests\StoreUnittypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnittypeRequest $request)
    {
        $data = new Unittype;
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
      
    
        $data->code = $request->code;
        $data->name = $request->name;
      
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unittype  $unittype
     * @return \Illuminate\Http\Response
     */
    public function show(Unittype $unittype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unittype  $unittype
     * @return \Illuminate\Http\Response
     */
    public function edit(Unittype $unittype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnittypeRequest  $request
     * @param  \App\Models\Unittype  $unittype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnittypeRequest $request, Unittype $unittype)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
      
    
        $unittype->code = $request->code;
        $unittype->name = $request->name;
        $unittype->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unittype  $unittype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unittype $unittype)
    {
        $unittype->delete();
    }
}
