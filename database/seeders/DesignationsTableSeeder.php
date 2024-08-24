<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            ['name' => 'Manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assistant Manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Developer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Designer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'QA Engineer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
