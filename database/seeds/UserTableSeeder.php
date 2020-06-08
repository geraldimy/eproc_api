<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $user = new User();
        $user->fullname = 'userbulog';
        $user->email    = 'userbuloggg@gmail.com';
        $user->password = bcrypt('user');
        $user->address  = 'Depok';
        $user->phone    = '081314057684';
        $user->id_role  = '1';
        $user->save();
       
        
        
        // $rpk = new User();
        // $rpk->fullname = 'rpkbulog';
        // $rpk->email    = 'rpkbulog@gmail.com';
        // $rpk->password = bcrypt('rpk');
        // $rpk->address  = 'Depok';
        // $rpk->phone    = '081314057686';
        // $rpk->save();
        // $rpk->roles()->attach($role_rpk);
        
        $admin = new User();
        $admin->fullname = 'Admin Bulog';
        $admin->email    = 'adminbulog@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->address  = 'Depok';
        $admin->phone    = '081314057681';
        $admin->id_role  = '3';
        $admin->save();
       
    }
}
