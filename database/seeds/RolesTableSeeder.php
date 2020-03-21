<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'  => "1",
                'name'=>"user"
            ],
            [
                'id'  => "2",
                'name'=>"rpk_user"
            ],
            [
                'id'  => "3",
                'name'=>"admin"
            ],

        ]);
    }
}

