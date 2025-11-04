<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ODOR;
use App\Models\User;

class OdorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->call(UserSeeder::class);

        ODOR::factory(25)->recycle(User::all())->create();

    }
}
