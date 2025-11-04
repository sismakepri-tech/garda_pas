<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::factory()->create(
            [
                'name'=>'Admin UPT',
                'email'=>'adminupt@gmail.com',
                'email_verified_at' => now(),
                'password'=>Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' =>'upt',
                'kanwil' => 'KEPRI',
            ]
            );

        User::factory()->create(
            [
                'name'=>'Admin Kanwil',
                'email'=>'adminkanwil@gmail.com',
                'email_verified_at' => now(),
                'password'=>Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' =>'kanwil',
                'kanwil' => 'KEPRI',
            ]
            );

        User::factory()->create(
            [
                'name'=>'Admin Pusat',
                'email'=>'adminpusat@gmail.com',
                'email_verified_at' => now(),
                'password'=>Hash::make('password123'),
                'remember_token' => Str::random(10),
                'role' =>'uke',
                'kanwil' => 'PUSAT',
            ]
            );
            
            
        User::factory(5)->create(); 

    }

      
}
