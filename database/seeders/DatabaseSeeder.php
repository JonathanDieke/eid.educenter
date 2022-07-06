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
        // $schools = \App\Models\School::factory(10)->create();
        \App\Models\School::create([
            "name" => "Université d’État Lomonossov de Moscou",
            "local_rank" => 1,
            "international_rank" => 78,
            "city" => "Moscou",
            "website" =>  "https://www.msu.ru/en/"
        ]);
        \App\Models\School::create([
            "name" => "Université d’État de Saint-Pétersbourg",
            "local_rank" => 2,
            "international_rank" => 242,
            "city" => "Saint Petersburg",
            "website" =>  "https://english.spbu.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Université de Novossibirsk",
            "local_rank" => 3,
            "international_rank" => 246,
            "city" => "Novosibirsk",
            "website" =>  "https://english.nsu.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Université d’État de Tomsk",
            "local_rank" => 4,
            "international_rank" => 272,
            "city" => "Tomsk",
            "website" =>  "https://en.tsu.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Université technique d’État Bauman de Moscou",
            "local_rank" => 5,
            "international_rank" => 281,
            "city" => "Moscou",
            "website" =>  "http://www.bmstu.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Institut de physique et de technologie de Moscou",
            "local_rank" => 6,
            "international_rank" => 290,
            "city" => "Dolgoproudnyy",
            "website" =>  "https://mipt.ru/english/"
        ]);
        \App\Models\School::create([
            "name" => "Université HSE",
            "local_rank" => 7,
            "international_rank" => 305,
            "city" => "Moscou",
            "website" =>  "https://www.hse.ru/en/"
        ]);
        \App\Models\School::create([
            "name" => "Université RUDN",
            "local_rank" => 8,
            "international_rank" => 317,
            "city" => "Moscou",
            "website" =>  "https://eng.rudn.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Université Nationale de la Recherche Nucléaire MEPhI",
            "local_rank" => 9,
            "international_rank" => 319,
            "city" => "Moscou",
            "website" =>  "https://eng.mephi.ru/"
        ]);
        \App\Models\School::create([
            "name" => "Université fédérale de Kazan",
            "local_rank" => 10,
            "international_rank" => 347,
            "city" => "Kazan",
            "website" =>  "https://eng.kpfu.ru/"
        ]);
        \App\Models\UserSchoolFormation::factory(10)->create();
        // $programs = \App\Models\Program::factory(20)->create();
        \App\Models\Program::create(['libel' => "Génie Logiciel"]);
        \App\Models\Program::create(['libel' => "Génie civil"]);
        \App\Models\Program::create(['libel' => "Biochimie"]);
        \App\Models\Program::create(['libel' => "Chimie"]);
        \App\Models\Program::create(['libel' => "Physique"]);
        \App\Models\Program::create(['libel' => "Médécine"]);
        \App\Models\Program::create(['libel' => "Sciences sociales"]);
        \App\Models\Program::create(['libel' => "Sciences de l'ingénieur"]);
        \App\Models\Program::create(['libel' => "Mathématiques"]);
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
        // for($i = 0, $j = $schools->count(); $i < $j; $i++ ){
        //     $schools = $schools->shuffle();
        //     $programs = $programs->shuffle();

        //     for($k = 0; $k < 2; $k++){
        //         $programs[0]->schools()->attach($schools[0]->id);
        //         $programs[0]->save();
        //         $programs->shift();
        //     }

        //     $schools->shift();
        // }

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
            'role' => "admin" ,
        ]);
    }
}
