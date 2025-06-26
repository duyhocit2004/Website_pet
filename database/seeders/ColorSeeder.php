<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $color = ['Xanh','Đỏ','Tím','Vàng','Hồng'];
        for($i = 0 ; $i < count($color);$i++){
            DB::table('color')->insert([
                'name' => $color[$i]
            ]);
        }
    }
}
