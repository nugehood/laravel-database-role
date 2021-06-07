<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flowers = DB::table('flowers')->insert([
            'name' => Str::random(10),
            'real_name' => Str::random(10),
            'habitat' => Str::random(10),
        ]);
    }
}
