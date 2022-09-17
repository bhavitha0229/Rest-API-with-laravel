<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public  function Index(){
        $subject =Subject::latest()->get();
        return response()->json($subject);
    }

    public function Store(Request $request){

        $validatedData = $request->validate([
            'class_id'=> 'required',
            
        ]);
        Subject::insert([
            'class_id' =>$request->class_id,
            'subject_name'=>$request->subject_name,
            'subject_code'=>$request->subject_code
        ]);
        return response('Student Subject inserted successfully');

    }
    public function Edit($id){
      
        $Subject =Subject::findOrFail($id);
        return response()->json($Subject);

    }

    public function Update(Request $request, $id){

        Subject::findOrFail($id)->update([
            'class_id' =>$request->class_id,
            'subject_name'=>$request->subject_name,
            'subject_code'=>$request->subject_code
         
        ]);
        return response('Student Subject Updated successfully');

    }
    public function Delete($id){

        Subject::findOrFail($id)->delete();
        return response('Student Subject Deleted successfully');

    }

}

