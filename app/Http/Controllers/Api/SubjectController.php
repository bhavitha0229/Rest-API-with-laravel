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
    // public function Edit($id){
      
    //     $sclass =Sclass::findOrFail($id);
    //     return response()->json($sclass);

    // }

    // public function Update(Request $request, $id){

    //     Sclass::findOrFail($id)->update([
    //         'class_name' => $request->class_name,
         
    //     ]);
    //     return response('Student Class Updated successfully');

    // }
    // public function Delete($id){

    //     Sclass::findOrFail($id)->delete();
    //     return response('Student Class Deleted successfully');

    // }

}

