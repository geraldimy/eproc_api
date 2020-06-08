<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->insert([
        //     [
        //         'id'  => "1",
        //         'name'=>"user"
        //     ],
        //     [
        //         'id'  => "2",
        //         'name'=>"rpk_user"
        //     ],
        //     [
        //         'id'  => "3",
        //         'name'=>"admin"
        //     ],

        // ]);

        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->save();

        $role_rpk = new Role();
        $role_rpk->name = 'Rpk';
        $role_rpk->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->save();
    }
}

