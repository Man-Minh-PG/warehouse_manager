<?php

namespace App\Http\Controllers;

use App\Models\product_types;
use App\Http\Requests\Storeproduct_typesRequest;
use App\Http\Requests\Updateproduct_typesRequest;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("product_types/index");
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
     * @param  \App\Http\Requests\Storeproduct_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeproduct_typesRequest $request)
    {
        $productType = new product_types();
        $product_types->fill([
            'name' => $request->name
        ]);
        $product_types->save();

        return redirect()->route('admin.product_type')->with('notification','Add product successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function show(product_types $product_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function edit(product_types $product_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateproduct_typesRequest  $request
     * @param  \App\Models\product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function update(Updateproduct_typesRequest $request, product_types $product_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_types $product_types)
    {
        //
    }
}
