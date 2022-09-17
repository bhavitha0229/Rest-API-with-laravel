<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;


class SectionController extends Controller
{
    public  function Index(){
        $Section =Section::latest()->get();
        return response()->json($Section);
    }

    public function Store(Request $request){

        $validatedData = $request->validate([
            'class_id'=> 'required',
            
        ]);
        Section::insert([
            'class_id' =>$request->class_id,
            'section_name'=>$request->section_name
        ]);
        return response('Student Section inserted successfully');

    }
    public function Edit($id){
      
        $Section =Section::findOrFail($id);
        return response()->json($Section);

    }

    public function Update(Request $request, $id){

        Section::findOrFail($id)->update([
            'class_id' =>$request->class_id,
            'section_name'=>$request->section_name
           
         
        ]);
        return response('Student Section Updated successfully');

    }
    public function Delete($id){

        Section::findOrFail($id)->delete();
        return response('Student Section Deleted successfully');

    }

}

