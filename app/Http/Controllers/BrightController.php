<?php

namespace App\Http\Controllers;

use App\Models\Bright;
use App\Models\Laptop;
use Illuminate\Http\Request;

class BrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bright = Bright::where('id', '=', '1')->get();
        $laptopType = $bright->laptop->type;
        $laptops = $bright->laptop;
        // return response()->json($laptopType);
        return response()->json($laptops);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bright = new Bright;
        $bright->name = $request->name;
        $bright->age = $request->age;
        $bright->save();
        return  response()->json($bright);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bright  $bright
     * @return \Illuminate\Http\Response
     */
    public function show(Bright $bright)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bright  $bright
     * @return \Illuminate\Http\Response
     */
    public function edit(Bright $bright)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bright  $bright
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bright $bright)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bright  $bright
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bright $bright)
    {
        //
    }
}
