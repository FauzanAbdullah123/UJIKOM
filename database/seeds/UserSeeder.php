<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat role admin
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        //Membuat role admin
        $guruRole = new Role();
        $guruRole->name = 'guru';
        $guruRole->display_name = 'Guru';
        $guruRole->save();


        //Membuat sample admin
        $admin = new User();
        $admin->name = 'Fauzan Abdullah';
        $admin->email = 'uzhantheforev@gmail.com';
        $admin->password = bcrypt('rahasiaku');
        $admin->save();
        $admin->attachRole($adminRole);

         //Membuat sample admin
         $guru = new User();
         $guru->name = 'Guru';
         $guru->email = 'guru@gmail.com';
         $guru->password = bcrypt('rahasiaku');
         $guru->save();
         $guru->attachRole($guruRole);
    }
}
