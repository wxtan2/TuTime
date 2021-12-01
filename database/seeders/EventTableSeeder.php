<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Reading',
            'description' => 'reading novel',
            'backgroundColor' => '#888888',
            'startTime' => '08:00:00',
            'endTime' => '10:00:00',
            'dayOfWeek' => 0,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'Afternoon sleep',
            'description' => 'zzzzzz',
            'backgroundColor' => '#cccccc',
            'startTime' => '13:00:00',
            'endTime' => '14:00:00',
            'dayOfWeek' => 1,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'AD Class',
            'description' => 'presentation',
            'backgroundColor' => '#ff6600',
            'startTime' => '10:00:00',
            'endTime' => '14:00:00',
            'dayOfWeek' => 2,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'Group Discussion',
            'description' => 'discuss',
            'backgroundColor' => '#ff0000',
            'startTime' => '11:00:00',
            'endTime' => '13:30:00',
            'dayOfWeek' => 3,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'Playing Game',
            'description' => 'dota',
            'backgroundColor' => '#666666',
            'startTime' => '08:00:00',
            'endTime' => '14:00:00',
            'dayOfWeek' => 4,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'Playing Game',
            'description' => 'dota',
            'backgroundColor' => '#666666',
            'startTime' => '08:00:00',
            'endTime' => '14:00:00',
            'dayOfWeek' => 5,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);

        DB::table('events')->insert([
            'title' => 'Do Coding',
            'description' => 'laravel',
            'backgroundColor' => '#000000',
            'startTime' => '12:00:00',
            'endTime' => '16:00:00',
            'dayOfWeek' => 6,
            'emailStudent' => 'weixiang_tan99@hotmail.my',
            'emailTutor' => NULL
        ]);


    }
}
