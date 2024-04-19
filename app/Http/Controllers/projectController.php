<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Student;

use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // 

    function get_data($id){
        // $records=Projects::find($id);
        $records = DB::table('projects')
                ->where('student_id', '=', $id)
                ->get();
        
        // return $records;
        // return view('projects')->with('records',$records);
        // echo $records;
        return view('projects', ['records' => $records,'id'=>$id]);
    }


    function addProject(Request $request,$id){
        $data=new Projects;
        $data->title=$request->input('title');
        $data->description=$request->input('description');
        $data->student_id=$id;

        $data->save();

        return back();

        // return $id;
    }

    function delete_project($id){
        // return "Hello";
        Projects::destroy($id);
        return back();
    }

    function edit_project(Request $request,$id){
        $data= Projects::find($id);

        $data->title=$request->input('title');
        $data->description=$request->input('description');

        $data->save();

        // return $data;
        return back();
    }
}
