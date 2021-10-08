<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Drinks;

class DrinksSeeder extends Seeder
{
    public function run ()
    {
        DB::table('drinks')->delete();

        Drinks::create(['drink' => 'Monster Ultra Sunrise',
          'description' => 'A refreshing orange beverage that has 75mg of caffeine per serving. Every can has two servings.',
          'caffeine' => 75,
          'servings' => 2,
          'size' => '16 oz can',
          'consumed' => 0,
          'drinks' => 0,
        ]);
        Drinks::create(['drink' => 'Black Coffee',
          'description' => 'The classic, the average 8oz. serving of black coffee has 95mg of caffeine.',
          'caffeine' => 95,
          'servings' => 1,
          'size' => '8 oz cup',
          'consumed' => 0,
          'drinks' => 0,

        ]);
        Drinks::create(['drink' => 'Americano',
          'description' => 'Sometimes you need to water it down a bit... and in comes the americano with an average of 77mg.
            of caffeine per serving.',
          'caffeine' => 77,
          'servings' => 1,
          'size' => 'drink',
          'consumed' => 0,
          'drinks' => 0,
        ]);
        Drinks::create(['drink' => 'Sugar free NOS',
          'description' => 'Another orange delight without the sugar. It has 130 mg. per serving and each can has two servings.',
          'caffeine' => 130,
          'servings' => 2,
          'size' => '16 oz can',
          'consumed' => 0,
          'drinks' => 0,
        ]);
        Drinks::create(['drink' => '5 Hour Energy',
          'description' => 'And amazing shot of get up and go! Each 2 fl. oz. container has 200mg of caffeine to get you going.',
          'caffeine'=> 200,
          'servings'=> 1,
          'size' => '2 fl oz',
          'consumed' => 0,
          'drinks' => 0,
        ]);
    }

}
