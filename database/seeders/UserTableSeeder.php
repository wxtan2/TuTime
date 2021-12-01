<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->insert([
            'username' => 'Taylor',
            'email' => 'taylor@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'female',
            'dob' => '1997-06-11',
            'phone' => '0111056231'
        ]);

        DB::table('users')->insert([
            'username' => 'Alex',
            'email' => 'alex@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-06-15',
            'phone' => '0111023421'
        ]);

        DB::table('users')->insert([
            'username' => 'Jaydav',
            'email' => 'jaydav@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-12-15',
            'phone' => '0112345421'
        ]);

        DB::table('users')->insert([
            'username' => 'Husniyah',
            'email' => 'husniyah@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'female',
            'dob' => '1998-03-15',
            'phone' => '0123453421'
        ]);

        DB::table('users')->insert([
            'username' => 'Aqila',
            'email' => 'aqila@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'female',
            'dob' => '1999-07-22',
            'phone' => '0114567421'
        ]);
    }
}
