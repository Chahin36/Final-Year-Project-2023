<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            "name"=>"Ali ben salah",
            "email"=>"alibensalah@yahoo.fr",
            "password"=>"000",
            "is_admin"=>1
        ]);
        User::Create([
            "name"=>"Sofien ben abdallah",
            "email"=>"sofienbenabdallah@yahoo.fr",
            "password"=>"000",
            "is_admin"=>0
        ]);
        User::Create([
            "name"=>"walid karray",
            "email"=>"walidkarray@yahoo.fr",
            "password"=>"000",
            "is_admin"=>0
        ]);
        User::Create([
            "name"=>"hassen gabsi",
            "email"=>"hassengabsi@yahoo.fr",
            "password"=>"000",
            "is_admin"=>0
        ]);
      
    }
}
