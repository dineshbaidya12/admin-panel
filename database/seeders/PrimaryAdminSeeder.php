<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PrimaryAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'name' => 'Super Admin',
            'username' => 'admin@123',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Summer@2022#'),
            'plain_pass' => 'Summer@2022#',
            'profile_pic' => '',
            'status' => 'active',
            'type' => 'admin',
            'email_verified_at' => Carbon::now(),
            'remember_token' => '',
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now()
        ]);
    }
}
