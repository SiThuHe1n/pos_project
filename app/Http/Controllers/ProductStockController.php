<?php

namespace App\Http\Controllers;

use App\Models\Unittype;
use Illuminate\Http\Request;
use App\Models\product_stock;
use App\Http\Requests\Storeproduct_stockRequest;
use App\Http\Requests\Updateproduct_stockRequest;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product_stock::all();
        return response()->json($data, 200);
    }
    public function stocknamewithid($id)
    {
        $data = product_stock::find($id);
        $unitname=Unittype::where('code',$data->unittype_id)->first();
        return response()->json([
                'id'=>$id,
                'name'=>$unitname->name,

        ], 200);
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
     * @param  \App\Http\Requests\Storeproduct_stockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproduct_stockRequest $request)
    {
        $data=new product_stock();
        $data->product_id=$request->product_id;
        $data->unittype_id=$request->unittype;
        $data->amount=$request->amount;
        $data->purchaseprice=$request->purchaseprice;
        $data->sellingprice=$request->sellingprice;

        $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_stock  $product_stock
     * @return \Illuminate\Http\Response
     */
    public function show(product_stock $product_stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_stock  $product_stock
     * @return \Illuminate\Http\Response
     */
    public function edit(product_stock $product_stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproduct_stockRequest  $request
     * @param  \App\Models\product_stock  $product_stock
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproduct_stockRequest $request, product_stock $product_stock)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_stock  $product_stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_stock $product_stock)
    {
        $product_stock->delete();
    }
    public function dodelete($id)
    {
        $data=product_stock::find($id);
        $data->delete();
    }
    public function doupdate($id,Request $request)
    {
        $product_stock=product_stock::find($id);
        $product_stock->product_id=$request->product_id;
        $product_stock->unittype_id=$request->unittype;
        $product_stock->amount=$request->amount;
        $product_stock->purchaseprice=$request->purchaseprice;
        $product_stock->sellingprice=$request->sellingprice;

        $product_stock->update();
    }
    public function doshow($id)
    {
        $product_stock=product_stock::where('product_id',$id)->get();
      return response()->json($product_stock, 200);
    }
}
