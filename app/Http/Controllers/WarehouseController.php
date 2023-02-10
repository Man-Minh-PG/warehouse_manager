<?php

namespace App\Http\Controllers;

use App\Models\acccount_historys;
use App\Models\products;
use App\Models\product_types;

use App\Http\Requests\Storeacccount_historysRequest;
use App\Http\Requests\Updateacccount_historysRequest;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("warehouses/index");
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
     * @param  \App\Http\Requests\Storeacccount_historysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeacccount_historysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\acccount_historys  $acccount_historys
     * @return \Illuminate\Http\Response
     */
    public function show(acccount_historys $acccount_historys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\acccount_historys  $acccount_historys
     * @return \Illuminate\Http\Response
     */
    public function edit(acccount_historys $acccount_historys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateacccount_historysRequest  $request
     * @param  \App\Models\acccount_historys  $acccount_historys
     * @return \Illuminate\Http\Response
     */
    public function update(Updateacccount_historysRequest $request, acccount_historys $acccount_historys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\acccount_historys  $acccount_historys
     * @return \Illuminate\Http\Response
     */
    public function destroy(acccount_historys $acccount_historys)
    {
        //
    }
}
