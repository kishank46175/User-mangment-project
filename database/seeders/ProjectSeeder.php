<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


use Faker\Factory as Faker;
use App\Models\Projects;
use App\Models\Student;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student_all=DB::table('students')->get('id');

        // echo $student_all;
        foreach($student_all as $record){
            // echo $record->id," ";
            
            for($i=0;$i<5;$i++){
                $faker=Faker::create();
                $project=new Projects;
                $project->title=$faker->name;
                // $project->description=Str::random(50);
                $project->description=$faker->text;
                $project->student_id=$record->id; 
                $project->save();
            }
        }
    }
}
