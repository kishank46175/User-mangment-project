<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Faker\Factory as Faker;



class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $student_id_all=array();
        // $student_id_all[]=0;

        for($i=0;$i<7;$i++){
            $faker=Faker::create();
            $student=new Student;
            $student->name=$faker->name;
            $student->email=$faker->email;
            $student->address=$faker->address;
    
            $student->save();

            // echo $student->id , " ";
            // $student_id_all+=$student->id;
            // $student_id_all[]=$student->id;

            // echo $student_id_all;
        }
    }
}
