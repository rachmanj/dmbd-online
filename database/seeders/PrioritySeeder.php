<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'priority_code' => 'TBA',
        ]);
        DB::table('priorities')->insert([
            'priority_code' => 'P1',
        ]);
        DB::table('priorities')->insert([
            'priority_code' => 'P2',
        ]);
        DB::table('priorities')->insert([
            'priority_code' => 'P3',
        ]);
    }
}
