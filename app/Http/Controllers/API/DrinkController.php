<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drinks;
use App\Http\Resources\DrinkResource;
use App\Http\Resources\DrinkCollection;
use App\Http\Requests\DrinkRequest;
use JsonResponse;
use Illuminate\Validation\ValidationException;



class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DrinkCollection(Drinks::all());

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
        $caffeine_consumed = $drink->caffeine * $drink->servings * $request->input('drinks');
        $drinks_consumed = $request->input('drinks') + $drink->drinks;
        $hasConsumed =  Drinks::sum('consumed');
        if ($caffeine_consumed + $hasConsumed > $drinks::$maxConsumed) {
          $drink->message = "max consumption reached";
          $drink->drinks = $drinks_consumed;
          $drink->consumed = $caffeine_consumed + $drinks->consumed;
          $drink->has_consumed = $caffeine_consumed + $hasConsumed;
          $drink->max_consumed = $drinks::$maxConsumed;
          return $drink;
        }
        $drink->drinks = $drinks_consumed;
        $drink->consumed = $caffeine_consumed + $drink->consumed;
        $drink->save();
        $drink->has_consumed = $caffeine_consumed + $hasConsumed;
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
