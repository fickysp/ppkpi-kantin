<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'fullname' => 'Bank',
                'email' => 'bank@gmail.com',
                'password' => Hash::make('123123'),
                'no_hp' => '08123442872',
                'balance' => 0,
                'role' => 'bank',
            ],
            [
                'fullname' => 'User 1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123123'),
                'no_hp' => '08123455784',
                'balance' => 0,
                'role' => 'user',
            ]
        ]);
    }
}
