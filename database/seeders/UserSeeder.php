<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'shanth kumar',
                'email' => 'shanth@gmail.com',
                'phno' => '8296616254',
                'password' => bcrypt('1234567890')
            ],
            [
                'name' => 'User 1',
                'email' => 'email1@gmail.com',
                'phno' => '9865345678',
                'password' => bcrypt('1234567890')
            ],
            [
                'name' => 'User 2',
                'email' => 'email2@gmail.com',
                'phno' => '9865345678',
                'password' => bcrypt('1234567890')
            ],
            [
                'name' => 'User 2',
                'email' => 'email3@gmail.com',
                'phno' => '9865345678',
                'password' => bcrypt('1234567890')
            ],
            
        ];
  
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
