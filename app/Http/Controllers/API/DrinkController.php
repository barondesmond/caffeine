<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Drinks;
use App\Http\Resources\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resource = new Drinks();
        return $resource->get()->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drinks  $drinks
     * @return \Illuminate\Http\Response
     */
    public function show(Drinks $drinks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drinks  $drinks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drinks $drinks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drinks  $drinks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drinks $drinks)
    {
        //
    }
}
