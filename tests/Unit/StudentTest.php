<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\Student;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_login_form(){
        $response=$this->get('/');
        $response->assertStatus(200);
    }

    public function test_user_duplication(){
        $user1=Student::make([
            'name'=>'John Doe',
            'email'=>'johndoe@gmail.com',
            'address'=>'Us'
        ]);

        $user2=Student::make([
            'name'=>'Dary',
            'email'=>'dary@gmail.com',
            'address'=>'Uk'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }


    // public function test_it_stores_new_users(){
    //     $response=$this->post('store_data',[
    //         'name'=>'Dary',
    //         'email'=>'dary@gmail.com',
    //         'address'=>'Uk'
    //     ]);

    //     $response->assertRedirect('/');
    // }

    public function test_delete_user(): void
    {
        // Assuming Student model is imported
        $student = new Student();
        $student->name = 'dummyUser';
        $student->email = 'dummyEmail@gmail.com';
        $student->address = 'UNO';
        $student->save(); // Save the student to get an ID

        $response = $this->get('delete_record/'.$student->id);

        // echo $student->id;

        $response->assertRedirect('/');
    }

    
// Route::post('edit_record/{id}',[App\Http\Controllers\studentController::class,'edit_record']);
    public function test_edit_user(): void{
        $student = new Student();
        $student->name = 'Ana';
        $student->email = 'AnaEmail@gmail.com';
        $student->address = 'Britain Uk';

        $student->save();

        $response = $this->post('edit_record/'.$student->id,[
            'name'=>'Ana_updated',
            'email'=>'Ana_updated@gmail.com',
            'address'=>'Britain Uk Updated',
        ]);

        // echo $student->id;
        $response->assertRedirect('/');

        $this->assertDatabaseHas('students',[
            'name'=>'Ana_updated',
        ]);
    }


    // Route::get('view_form/{id}',[App\Http\Controllers\studentController::class,'view_form']);

    public function test_view_user(): void
    {
        $student_id=Student::all('id')->first()->id;
        echo $student_id;

        $response=$this->get('view_form/'.$student_id );
        $response->assertStatus(200);
    }


}
