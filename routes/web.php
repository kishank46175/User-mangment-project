<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\studentController;


Route::get('/', function () {
    $records=Student::all();
    return view('form')->with('records',$records);
});

Route::post('store_data',[App\Http\Controllers\studentController::class,'store_data']);

Route::get('delete_record/{id}',[App\Http\Controllers\studentController::class,'delete_record']);

Route::post('edit_record/{id}',[App\Http\Controllers\studentController::class,'edit_record']);

Route::get('view_form/{id}',[App\Http\Controllers\studentController::class,'view_form']);



//projects
// Route::get('/projects_show/{id}',[App\Http\Controllers\projectController::class,'projects_show']);

// Route::get('/projects_show/{id}',function(string $id){
//     //can use with also

//     return view('projects')->with('id',$id);
// });

Route::get('/projects_show/{id}',[App\Http\Controllers\projectController::class,'get_data']);

Route::post('addProject/{id}',[App\Http\Controllers\projectController::class,'addProject']);



Route::post('edit_project/{id}',[App\Http\Controllers\projectController::class,'edit_project'])->name('projects.edit');



Route::get('delete_project/{id}',[App\Http\Controllers\projectController::class,'delete_project'])->name('projects.delete');