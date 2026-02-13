<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('jobtypes')->insert([
            'name' => 'IT', 
        ]);
        \DB::table('jobtypes')->insert([
            'name' => 'Finanse i Bankowość', 
        ]);
        \DB::table('jobtypes')->insert([
            'name' => 'Budownictwo', 
        ]);                
    }
}
