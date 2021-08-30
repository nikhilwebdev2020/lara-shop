<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('EncodersLab@2021')
        ]);

        $supplier = User::create([
            'username' => 'Supplier',
            'email' => 'supplier@gmail.com',
            'password' => bcrypt('EncodersLab@2021')
        ]);

        $guest = User::create([
            'username' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('EncodersLab@2021')
        ]);

        $admin->roles()->sync([1, 2]);
        $supplier->roles()->sync([2]);
        $guest->roles()->sync([3]);
    }
}
