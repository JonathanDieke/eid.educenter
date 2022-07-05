<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(10)->create();
        \App\Models\Address::factory(10)->create();
        \App\Models\Cursus::factory(10)->create();
        $theParents = \App\Models\TheParent::factory(20)->create();
        // \App\Models\UserSchool::factory(10)->create();
        $schools = \App\Models\School::factory(10)->create();
        \App\Models\UserSchoolFormation::factory(10)->create();
        $programs = \App\Models\Program::factory(20)->create();
        \App\Models\AdmissionRequest::factory(10)->create();
        \App\Models\Supporting::factory(10)->create();

        //fill ParentUser pivot table
        for($i = 0, $j = $users->count(); $i < $j; $i++ ){
            $theParents = $theParents->shuffle() ;
            $users = $users->shuffle() ;

            for($k = 0; $k < 2; $k++){
                $theParents[0]->user()->associate($users[0]->id);
                $theParents[0]->save();
                $theParents->shift();
            }

            $users->shift();
        }

        //fill ProgramSchool pivot table
        for($i = 0, $j = $schools->count(); $i < $j; $i++ ){
            $schools = $schools->shuffle();
            $programs = $programs->shuffle();

            for($k = 0; $k < 2; $k++){
                $programs[0]->schools()->attach($schools[0]->id);
                $programs[0]->save();
                $programs->shift();
            }

            $schools->shift();
        }

        \App\Models\User::create([
            'name' => 'admin',
            'lname' => 'admin' ,
            'email' => 'admin@admin.ci',
            'email_verified_at' => now(),
            'birthdate' => '2000-12-23' ,
            'gender' => 'male' ,
            'native_language' => 'french' ,
            'use_language' => 'french' ,
            'country' => 1 ,
            'state' => 3902 ,
            'city' => 99 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10), 
        ]);
    }
}
