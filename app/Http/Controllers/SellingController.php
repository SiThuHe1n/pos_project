<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Selling;
use App\Models\Unittype;
use App\Models\product_stock;
use App\Models\SellingDetail;
use App\Models\PurchaseDetail;
use App\Http\Requests\StoreSellingRequest;
use App\Http\Requests\UpdateSellingRequest;

class SellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Selling::all();
        return response()->json($data, 200);
    }
    public function showdetail($id)
    {
        $data=PurchaseDetail::where('purchase_id',$id)->get();



        foreach($data as $dat)
        {
            $stock = product_stock::find( $dat->productstock_id);
            $unitname=Unittype::where('code',$stock->unittype_id)->first();
            $dat->productstock_id=$unitname->name;

            $product = Product::find( $dat->product_id);

            $dat->product_id=$product->name;
        }


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
     * @param  \App\Http\Requests\StoreSellingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellingRequest $request)
    {

        $data=new Selling();
        $data->date=$request->sellingdate;
        $data->totalprice=$request->totalprice;

        $data->type=$request->type;
        if($request->customer)
        {
            $data->customer_id=$request->customer;
        }
        else{
            $data->customer_id=0;
        }

        $data->totalpaid=$request->totalpaid;
        // $needtopaid=$request->totalprice-$request->totalpaid;
        $data->save();
        // $sup=Supplier::where('code',$request->supplier)->first();
        // $sup->purchaseamount+=$request->totalprice;
        // if( $sup->needtopaid!=0 && $request->totalprice<$request->totalpaid)
        // {
        //     $sup->needtopaid+=$needtopaid;
        // }

        // $sup->update();

        foreach (json_decode($request->productdata) as $pdetail) {
            $detail=new SellingDetail();
            $detail->selling_id=$data->id;
            $detail->product_id=$pdetail->pid;
            $detail->productstock_id=$pdetail->mtype;
            $detail->amount=$pdetail->qty;
            $detail->price=$pdetail->price;
            $detail->note=$pdetail->desc;
            $detail->save();

            $product_stock=product_stock::find($pdetail->mtype);
            $product_stock->amount-=$pdetail->qty;
            $product_stock->save();


        }
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
