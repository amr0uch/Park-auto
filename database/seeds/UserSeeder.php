<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
           ['id'=> 1,'name' => 'd3soft','email' => 'd3soft@gmail.com','password' => Hash::make('123456')],
           ['id'=> 2,'name' => 'admin','email' => 'admin@gmail.com','password' => Hash::make('123456')],
        ]);
    }
}


