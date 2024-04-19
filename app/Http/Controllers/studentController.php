<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Projects;


class studentController extends Controller
{
    //
    function store_data(Request $request){
        $data=new Student;
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->address=$request->input('address');

        $data->save();

        // return back();

        return Redirect('/');
    }
    
    function delete_record($id){
        DB::table('projects')->where('student_id', $id)->delete();
        Student::destroy($id);
        return back();
    }
    
    function edit_record(Request $request,$id){

        $data= Student::find($id);

        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->address=$request->input('address');

        $data->save();

        return redirect('/');
    }

    function view_form($id){
        $data=Student::find($id);
        $projects=DB::table('projects')
        ->where('student_id', '=', $id)
        ->get();

        // return [$projects,$data];
        // return view('viewprofile',['data'=>$data,'projects',$projects]);
        return view('viewprofile')->with('data',$data)->with('projects',$projects);

    }
}
