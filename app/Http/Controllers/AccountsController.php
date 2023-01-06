<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use App\Http\Requests\StoreaccountsRequest;
use App\Http\Requests\UpdateaccountsRequest;

class AccountsController extends Controller
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
     * @param  \App\Http\Requests\StoreaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaccountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(accounts $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(accounts $accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaccountsRequest $request, accounts $accounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(accounts $accounts)
    {
        //
    }
}
