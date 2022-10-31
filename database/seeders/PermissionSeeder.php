<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'akses_admin',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'akses_user',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'akses_role',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'akses_permission',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit_user',
            'guard_name' => 'web',
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete_user',
            'guard_name' => 'web',
        ]);
    }
}
