<?php

namespace Tests\Unit;

use App\Models\Projects;
use App\Models\Student;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use Faker\Factory as faker;


class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    // Route::get('/projects_show/{id}',[App\Http\Controllers\projectController::class,'get_data']);

    public function test_projects_view(): void
    {
        $student_id=Student::all('id')->first()->id;
        $response=$this->get('/projects_show/'.$student_id);
        $response->assertStatus(200);
    }


    
    // Route::post('addProject/{id}',[App\Http\Controllers\projectController::class,'addProject']);

    public function test_addProject(): void
    {
        $student_id=Student::all('id')->first()->id;

        $project=new Projects();
        $project->title='AddedProject';
        $project->description='Description for project from unit testing';
        $project->student_id=$student_id;

        $project->save();
        

        $this->assertDatabaseHas('projects',[
            'title'=>$project->title,
            'description' =>$project->description,
        ]);
    }


// Route::post('edit_project/{id}',[App\Http\Controllers\projectController::class,'edit_project']);

    public function test_edit_project():void
    {
        $student = new Student();
        $student->name = 'Pray';
        $student->email = 'pray@gmail.com';
        $student->address = 'East Mumbai';
        $student->save();

        $project=new Projects();
        $project->title='AddedProject';
        $project->description='Description for project from unit testing';
        $project->student_id=$student->id;

        $project->save();


        $project->title='updated_project';
        $project->description='updated_Description for project from unit testing';
        $project->student_id=$student->id;


        $response=$this->post(route('projects.edit',$project->id),[
            'title'=>$project->title,
            'description'=>$project->description,
        ]);

        $this->assertDatabaseHas('projects',[
            'id'=>$project->id,
            'title'=>$project->title,
            'description'=>$project->description
        ]);

    }

    
// Route::get('delete_project/{id}',[App\Http\Controllers\projectController::class,'delete_project']);

    public function test_delete_project() :void
    {
        $student = new Student();
        $student->name = 'Daby';
        $student->email = 'Daby@gmail.com';
        $student->address = 'Dab East Mumbai';
        $student->save();

        $project=new Projects();
        $project->title='Delete Project ';
        $project->description='Description for project from unit testing delete project';
        $project->student_id=$student->id;
        $project->save();

        $response=$this->get(route('projects.delete',$project->id));
        $response->assertRedirect();
        $this->assertFalse(Projects::where('id',$project->id)->exists());
    }
}

