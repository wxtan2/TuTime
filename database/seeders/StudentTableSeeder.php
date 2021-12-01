<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
            'username' => 'Wei Xiang',
            'email' => 'weixiang_tan99@hotmail.my',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-06-15',
            'phone' => '01110759113'
        ]);

        DB::table('students')->insert([
            'username' => 'Jackato',
            'email' => 'jackato@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1997-03-11',
            'phone' => '01345786231'
        ]);

        DB::table('students')->insert([
            'username' => 'Imran Shah',
            'email' => 'imran.shah@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-06-15',
            'phone' => '0111022221'
        ]);

        DB::table('students')->insert([
            'username' => 'Logarram Ramani',
            'email' => 'logarr@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-06-25',
            'phone' => '0123455421'
        ]);

        DB::table('students')->insert([
            'username' => 'Hakimi',
            'email' => 'hakimi@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1998-03-15',
            'phone' => '0123453331'
        ]);

        DB::table('students')->insert([
            'username' => 'Aiman ',
            'email' => 'aiman@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'male',
            'dob' => '1999-04-22',
            'phone' => '0110967421'
        ]);
    }
}
