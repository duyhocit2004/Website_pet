<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = ['mèo','chó','vẹt','cá'];
        for($i = 0;$i < count($cate);$i++){
            DB::table('category')->insert([
                'name' => $cate[$i],
            ]);
        }
       
    }
}
