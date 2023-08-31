<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'       => 'User 1',
                'email'      => 'user1@user1.com',
                'password'   => bcrypt('password'),
                'post_id'    => 1,
            ],
            [
                'name'       => 'User 1',
                'email'      => 'user2@user2.com',
                'password'   => bcrypt('password'),
                'post_id'    => 2,
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
