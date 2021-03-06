<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->insert([
            "name"=>"admin",
            "email"=>"admin",
            "image"=>"/storage/public/default-avatar.png",
            "password"=>Hash::make("admin")
         ]);
        DB::table('users')->insert([
            "name"=>"Trần Công Dũng",
            "email"=>"trancongdung12@gmail.com",
            "image"=>"/storage/public/default-avatar.png",
            "password"=>Hash::make("123")
         ]);
    }
}
