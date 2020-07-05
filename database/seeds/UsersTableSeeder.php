<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $developerRole = Role::where('name', 'developer')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $cashierRole = Role::where('name', 'cashier')->first();

        $developer = User::Create([
            'name' => 'Raymond Zamoras',
            'email' => 'ray@gmail.com',
            'password' => Hash::make('password')
        ]);

        $admin = User::Create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        $cashier = User::Create([
            'name' => 'Cashier User',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('password')
        ]);

        $developer->roles()->attach($developerRole);
        $admin->roles()->attach($adminRole);
        $cashier->roles()->attach($cashierRole);
    }
}