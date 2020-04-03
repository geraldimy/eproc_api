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
                'id'  => "1",
                'category_name'=>"beras"
            ],
            [
                'id'  => "2",
                'category_name'=>"gula"
            ],
            [
                'id'  => "3",
                'category_name'=>"minyak"
            ],

        ]);
    }
}
