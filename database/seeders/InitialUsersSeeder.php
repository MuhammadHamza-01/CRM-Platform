<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate([
            'email' => 'hamza@gmail.com'
        ], [
            'name' => 'Hamza',
            'password' => Hash::make('hamza123'),
            'role' => 'admin'
        ]);

        // Create customer users
        User::updateOrCreate([
            'email' => 'muneeba@gmail.com'
        ], [
            'name' => 'Muneeba',
            'password' => Hash::make('muneeba123'),
            'role' => 'customer'
        ]);

        User::updateOrCreate([
            'email' => 'noor@gmail.com'
        ], [
            'name' => 'Noor',
            'password' => Hash::make('noor1234'),
            'role' => 'customer'
        ]);
        // Additional users
        User::updateOrCreate([
            'email' => 'aisha@test.com'
        ], [
            'name' => 'Aisha',
            'password' => Hash::make('aisha123'),
            'role' => 'customer'
        ]);

        User::updateOrCreate([
            'email' => 'bilal@test.com'
        ], [
            'name' => 'Bilal',
            'password' => Hash::make('bilal123'),
            'role' => 'customer'
        ]);

        User::updateOrCreate([
            'email' => 'zain@test.com'
        ], [
            'name' => 'Zain',
            'password' => Hash::make('zain123'),
            'role' => 'customer'
        ]);
    }
}