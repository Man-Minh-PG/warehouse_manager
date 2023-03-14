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
        $product_types = product_types::orderBy('id', 'desc')->paginate(5);
        return view("product_types/index", compact('product_types'));
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
        // check duplicate name 
        if($isIssetName = product_types::where('name','=', $request->name)->exists())
        return  redirect()->route('admin.product_type')->with('notification',config('messagescommon.notification.duplicate'));
        
        // ** New code v9 **
        product_types::create($request->post());

        // ** Old code v8 **
        // $productType = new product_types();
        // $productType->fill($request->post())->save();

        // ** Clean code **
        // $product_types->fill([
        //     'name' => $request->name
        // ]);
        // $product_types->save();

        return redirect()->route('admin.product_type')->with('notification',config('messagescommon.notification.success'));
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
        // check duplicate name 
        if($isIssetName = product_types::where('name','=', $request->name)->exists())
        return  redirect()->route('admin.product_type')->with('notification','Tên không được trùng lặp');

        // ** style code laravel v9 **
        $product_types->fill($request->post())->save();
 
        // ** Old code v8 **
        // $product_types->fill([
        //     'name' => $request->name
        // ]);
        // $product_types->save();

        return redirect()->route('admin.product_type')->with('notification','Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(product_types $product_types)
    {
        $product_types->delete();
        return redirect()->route('admin.product_type')->with('notification', 'Delete successful');
    }
}
