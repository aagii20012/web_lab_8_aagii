<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fligths')->insert([
            'departureAirport' => Str::random(3),
            'arrivalAirport' => Str::random(3),
            'departureDate'=> Carbon::parse('2021', '12', '15'),
            'passengerNumber'=>20,
        ]);
    }
}
