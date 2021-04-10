<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
                "name" => "reza parsian",
                "email" => "rezaparsian76@gmail.com",
                "role" => "admin",
                "password" => bcrypt("12345678"),
            ], [
                "name" => "صدیقی",
                "email" => "silares.co@yahoo.com",
                "role" => "admin",
                "password" => bcrypt("9xf%UCEu"),
            ]]
        );
    }
}
