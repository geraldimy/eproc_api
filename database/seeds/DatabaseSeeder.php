<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(CategoryProductTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        // $this->call(PromoTableSeeder::class);

    }
}
