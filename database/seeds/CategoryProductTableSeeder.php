<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
              
                'category_name'=>"Beras",
                'description' => "Beras Bulog"
            ],
            [
                
                'category_name'=>"Gula",
                'description' => "Gula Bulog"
            ],
            [
                
                'category_name'=>"Minyak",
                'description' => "Minyak Bulog"
            ],

        ]);
    }
}
