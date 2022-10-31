<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'project_code' => '000H',
        ]);

        DB::table('projects')->insert([
            'project_code' => '001H',
        ]);

        DB::table('projects')->insert([
            'project_code' => '017C',
        ]);

        DB::table('projects')->insert([
            'project_code' => '021C',
        ]);

        DB::table('projects')->insert([
            'project_code' => '022C',
        ]);

        DB::table('projects')->insert([
            'project_code' => '023C',
        ]);

        DB::table('projects')->insert([
            'project_code' => 'APS',
        ]);
    }
}
