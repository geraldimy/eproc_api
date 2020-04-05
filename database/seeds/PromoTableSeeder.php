<?php

use Illuminate\Database\Seeder;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promo')->insert([
            [
                'promo_title'  =>"Diskon Beras Up to 30%",
                'promo_desc'    =>"Tagline Beras Keluarga Indonesia",
                'image' =>"testt",
                'promo_start_date' => "2020-04-03",
                'promo_end_date' => "2020-04-04",
            ],
            [
                'promo_title'  =>"Diskon Gula Up to 25%",
                'promo_desc'    =>"Tagline Gula ManisKita (Gula Pasir)",
                'image' =>"testt",
                'promo_start_date' => "2020-04-03",
                'promo_end_date' => "2020-05-03",
            ],
            [
                'promo_title'  =>"Discount Minyak Up to 50%",
                'promo_desc'    =>"Tagline Minyak Goreng Keluarga Indonesia",
                'image' =>"testt",
                'promo_start_date' => "2020-03-30",
                'promo_end_date' => "2020-04-05",
            ],

        ]);
    }
}
