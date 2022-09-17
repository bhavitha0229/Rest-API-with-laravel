<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public  function Index(){
        $Student =Student::latest()->get();
        return response()->json($Student);
    }

    public function Store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:students|max:25'
            // 'email' => 'required|unique:students|max:25'
            
        ]);
        Student::insert([
            'class_id' =>$request->class_id,
            'section_id' =>$request->section_id,
            'name' =>$request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'photo' =>$request->photo,
            'gender' =>$request->gender,
            'created_at'=> Carbon::now()
            
        ]);
        return response('Student  inserted successfully');

    }
    public function Edit($id){
      
        $Student =Student::findOrFail($id);
        return response()->json($Student);

    }

    public function Update(Request $request, $id){

        Student::findOrFail($id)->update([
           'class_id' =>$request->class_id,
            'section_id' =>$request->section_id,
            'name' =>$request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'photo' =>$request->photo,
            'gender' =>$request->gender,
            'created_at'=> Carbon::now()
         
        ]);
        return response(' Student Updated successfully');

    }
    public function Delete($id){

        Student::findOrFail($id)->delete();
        return response('Student Deleted successfully');

    }

}
