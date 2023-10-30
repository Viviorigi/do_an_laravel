<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Users;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create(['name'=>'admin', 'email'=>'admin@gmail.com', 'email_verified_at'=> now(), 'password'=> bcrypt('123456'),'role'=>1]);
    }
    
}
