<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [
                'category'  => "1",
                'product_name'  =>"BerasKita",
                'short_desc'    =>"Tagline Beras Keluarga Indonesia
                 Beras jenis premium produksi dalam negeri jenis IR64 bertekstur nasi pulen dengan kadar amilosa rendah dan amilopektin tinggi. ",
                'long_desc' =>"BerasKita merupakan hasil produksi petani Indonesia yang bebas pemutih, bebas pengawet, dan bebas pewangi yang diolah dengan teknologi modern. Ukuran Kemasan : Kemasan 1 Kg, Kemasan 5 kg, Kemasan 10 kg, Kemasan 25 kg, Kemasan 50 kg BerasKita jenis premium saat ini sudah dipasarkan ke ritel modern, tradisional, outlet Rumah Pangan Kita (RPK) dan toko/agen pengecer sehingga pendistribusian sudah tersedia di seluruh Indonesia.",
                'image' =>"testt",
                'color' => "yellow",
                'price' => "50000",
                'unit'  => "10",
                'status' => "ready"


            ],
            [
                'category'  => "2",
                'product_name'  =>"Gula ManisKita (Gula Pasir)",
                'short_desc'    =>"Gula Keluarga Indonesia" ,
                'long_desc' =>"Gula ManisKita merupakan jenis gula kristal putih produksi dalam negeri yang berasal dari 100% tebu asli pilihan dan diolah dengan teknologi modern sehingga menghasilkan gula dengan kualitas yang baik.",
                'image' =>"testt",
                'color' => "green",
                'price' => "50000",
                'unit'  => "10",
                'status' => "ready"


            ],
            [
                'category'  => "3",
                'product_name'  =>"Minyak GorengKita",
                'short_desc'    =>"Minyak Goreng Keluarga Indonesia",
                'long_desc' =>"Minyak Goreng Kita merupakan produk pangan unggulan dalam kemasan 1 liter dengan keunggulan dilengkapi Vitamin A dan Vitamin E, dan kandungan lemak jenuh (lemak jahat) rendah. Minyak GorengKita dapat digunakan hingga 5x pemakaian. Ukuran kemasan 1 Liter",
                'image' =>"testt",
                'color' => "yellow",
                'price' => "50000",
                'unit'  => "10",
                'status' => "ready"


            ],

        ]);
    }
}
