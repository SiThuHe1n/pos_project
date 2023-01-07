<?php

namespace App\Http\Controllers;

use App\Models\purchase;
use App\Models\PurchaseDetail;
use App\Models\product_stock;
use App\Http\Requests\StorepurchaseRequest;
use App\Http\Requests\UpdatepurchaseRequest;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=purchase::all();
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
     * @param  \App\Http\Requests\StorepurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepurchaseRequest $request)
    {
        $data=new Purchase();
        $data->date=$request->purchasdate;
        $data->totalprice=$request->totalprice;
        $data->supplier_id=$request->supplier;
        $data->totalpaid=$request->totalpaid;
        $data->save();

        foreach (json_decode($request->productdata) as $pdetail) {
            $detail=new PurchaseDetail();
            $detail->purchase_id=$data->id;
            $detail->product_id=$pdetail->pid;
            $detail->productstock_id=$pdetail->mtype;
            $detail->amount=$pdetail->qty;
            $detail->price=$pdetail->pprice;
            $detail->note=$pdetail->desc;
            $detail->save();

            $product_stock=product_stock::find($pdetail->mtype);
            $product_stock->amount+=$pdetail->qty;
            $product_stock->purchaseprice=$pdetail->pprice;
            $product_stock->save();
        }








    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(purchase $purchase)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepurchaseRequest  $request
     * @param  \App\Models\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepurchaseRequest $request, purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchase $purchase)
    {
        //
    }
}
