<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'no_hp' => '081111111111',
                'password' => 'admin123',
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'user',
                'email' => 'user@gmail.com',
                'no_hp' => '082222222222',
                'password' => 'user123',
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $userData) {
            User::create($userData);
        }
    }
}
