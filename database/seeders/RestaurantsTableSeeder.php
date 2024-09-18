<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::insert([
            [
                'name' => 'Restaurant A',
                'lat' => 40.712776,
                'long' => -74.005974,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Restaurant B',
                'lat' => 34.052235,
                'long' => -118.243683,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Restaurant C',
                'lat' => 51.507351,
                'long' => -0.127758,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
