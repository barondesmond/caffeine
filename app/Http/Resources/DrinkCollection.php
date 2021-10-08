<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Drinks;

class DrinkCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'version' => '1.0.2',
                'max_consumed' => Drinks::$maxConsumed,
                'has_consumed' => Drinks::sum('consumed'),
            ],
        ];
    }
}
