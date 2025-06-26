<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class net_weightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $net_weight = ['100g','200g','300g','400g','500g'];
        for($i = 0 ; $i < count($net_weight);$i++){
            DB::table('net_weight')->insert([
                'name' => $net_weight[$i]
            ]);
        }
    }
}
