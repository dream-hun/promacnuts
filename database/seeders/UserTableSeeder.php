<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'NSABIMANA Stanley',
                'email' => 'stanley@promacnuts.rw',
                'password' => bcrypt('password'),
            ], [
                'name' => 'NSABIMANA Stanley',
                'email' => 'info@promacnuts.rw',
                'password' => bcrypt('password'),
            ]];
        User::insert($users);

    }
}
