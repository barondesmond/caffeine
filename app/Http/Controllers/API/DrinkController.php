<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drinks;
use App\Http\Resources\DrinkResource;
use App\Http\Requests\DrinkRequest;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DrinkResource::collection(Drinks::all());

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
    public function show($id, Drinks $drinks)
    {
        //
        return $drinks::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drinks  $drinks
     * @return \Illuminate\Http\Response
     */
    public function update($id, DrinkRequest $request, Drinks $drinks)
    {
        //
        $drink = $drinks::findorfail($id);
        $consumed = $drink->caffeine * $drink->servings * $request->input('drinks');

        $hasConsumed =  Drinks::sum('consumed');
        if ($consumed + $hasConsumed > $drinks::$maxConsumed) {
          //echo "consumed: $consumed and $hasConsumed > $drinks::$maxConsumed";
          $data['consumed'] = $consumed;
          $data['has_consumed'] = $hasConsumed;
          $data['max_consumed'] = $drinks::$maxConsumed;
          return $data;
        }
        $drink->consumed = $consumed + $drink->consumed;
        $drink->save();
        $drink->has_consumed = Drinks::sum('consumed');
        $drink->max_consumed = $drinks::$maxConsumed;
        return $drink;
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
