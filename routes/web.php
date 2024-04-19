<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\studentController;

Route::get('/', function () {
    $records=Student::all();
    return view('formHome')->with('records',$records);
});

Route::get('/admin', function () {
    $records=Student::all();
    return view('form')->with('records',$records);
});

Route::post('store_data',[App\Http\Controllers\studentController::class,'store_data']);

Route::get('delete_record/{id}',[App\Http\Controllers\studentController::class,'delete_record']);

Route::post('edit_record/{id}',[App\Http\Controllers\studentController::class,'edit_record']);

Route::get('view_form/{id}',[App\Http\Controllers\studentController::class,'view_form']);


