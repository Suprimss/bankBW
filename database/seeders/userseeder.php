<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'role' => 'admin',
                'class' => 'tkj',
                'balance' => '0',
                'password' => Hash::make('000'),
            ],
            //user
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'class' => 'tkj',
                'balance' => '10000',
                'password' => Hash::make('111'),
            ]
        
        
        
        
        ]);
    }
}
