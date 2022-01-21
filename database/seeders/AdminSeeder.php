<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "role"=>"admin",
            "password"=> Hash::make("password"),
        ]);
        User::insert([
            "name"=>"Teacher",
            "email"=>"teacher@gmail.com",
            "password"=> Hash::make("password"),
        ]);
        Student::insert([
            "name"=>"Aashish Nayak",
            "email"=>"aashish@gmail.com",
            "password"=> Hash::make("password"),
        ]);
    }
}
