<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Factory::create();
        for($i = 0 ; $i <5 ; $i++){
            DB::table('product')->insert([
            'name' => $faker->name(),
            'SKU' => 'SKU'.($i+6),
            'category_id'=>Arr::random([1,2,3,4]),
            'title'=>$faker->title,
            'description'=>$faker->text,
            'rating'=>Arr::random([1,2]),
            'discount'=>20,
        ]);
        }
       
        
    }
}
