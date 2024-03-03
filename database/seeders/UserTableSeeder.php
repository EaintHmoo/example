<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'email_verified_at'        => '2022-11-14 07:52:49',
            ],
            [
                'id'                 => 2,
                'name'               => 'User',
                'email'              => 'user@gmail.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'email_verified_at'        => '2022-11-14 07:52:49',
            ],
        ];


        User::insert($users);
    }
}
