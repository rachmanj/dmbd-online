<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreakdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breakdowns')->insert([
            'bd_no' => 'BD/15',
            'unit_no' => 'E 042',
            'status' => 'BD',
            'priority' => 'tba',
            'start_date' => '2022-06-01',
            'hm' => 26022,
            'project' => '023C',
            'description' => 'Progress assembling HAP & Arka. Additional part PR. 220100482, 220100483, 220100484, 220100207, 220100295, 220100465, 220100466, 220100467, 220100476, 220100477, 220100478, 220110388, 220111001, 220111012, 220140193, 220180098, 220180347, 220180348, 220180362, 220180653, 220180736, 220181079, 220181080, 220181081, 220181100, 220181113, 220181179, 220181181, 220181187, 220181205, 220181206, 220181235, 220181237, 220181238 (Detail on MPM and update from site)',
            'created_by' => 'seodalmi'
        ]);
    }
}
