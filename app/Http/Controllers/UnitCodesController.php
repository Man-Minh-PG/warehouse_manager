<?php

namespace App\Http\Controllers;

use App\Models\unit_codes;
use App\Http\Requests\Storeunit_codesRequest;
use App\Http\Requests\Updateunit_codesRequest;

class UnitCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_codes =  unit_codes::orderBy('id', 'desc')->paginate(5); 
        return view("units/index" , compact('unit_codes'));
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
     * @param  \App\Http\Requests\Storeunit_codesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeunit_codesRequest $request)
    {
        // check duplicate name 
        if($isIssetName = unit_codes::where('name', '=', $request->name)->exists())
        return redirect()->route('admin.unit')->with('notification',config('messagescommon.notification.duplicate'));

        // code style Laravel v9
        unit_codes::create($request->post());

        return redirect()->route('admin.unit')->with('notification', config('messagescommon.notification.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\unit_codes  $unit_codes
     * @return \Illuminate\Http\Response
     */
    public function show(unit_codes $unit_codes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit_codes  $unit_codes
     * @return \Illuminate\Http\Response
     */
    public function edit(unit_codes $unit_codes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateunit_codesRequest  $request
     * @param  \App\Models\unit_codes  $unit_codes
     * @return \Illuminate\Http\Response
     */
    public function update(Updateunit_codesRequest $request, unit_codes $unit_codes)
    {
        // check duplicate name
        if(unit_codes::where('name', '=', $request->name)->exits()) 
        {
            return redirect()->route('admin.unit')->with('notification', config('messagescommon.notification.duplicate'));
        }

        // code style laravel v9
        $unit_codes->fill($request()->post())->save();

        return redirect()->route('admin.unit')->with('notification', config('messagescommon.notification.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\unit_codes  $unit_codes
     * @return \Illuminate\Http\Response
     */
    public function destroy(unit_codes $unit_codes)
    {
        $unit_codes->delete();
        return redirect()->route('admin.unit')->with('notification', config('messagescommon.notification.delete'));
    }
}
