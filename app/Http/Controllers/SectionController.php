<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{

    public function index(){
        $sections = section::all();
        return view('sections.sections', compact('sections'));
    }


    public function store(Request $request){


        $validated = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
        ],

        [
            'section_name.required' => 'يرجى ادخال اسم القسم',
            'section_name.unique' => 'اسم المستخدم مسجل مسبقا',
            'description.required' => 'يرجى ادخال اسم البيان',

        ]
    );

         DB::table('sections')->insert([
                'section_name'=>$request->section_name,
                'description'=>$request->description,
                'Created_by'=>(Auth::user()->name),
            ]);
            session()->flash('Add','تم اضاقة القسم بنجاح');
            return redirect('/sections');

        // $input = section::all();

        // $b_exists = section::where('section_name','=','$section_name')->exists();

        // if($b_exists){
        //     session()->flash('Error','خطأ القسم مسجل مسبقا');
        //     return redirect('/sections');
        // }else{
        //     DB::table('sections')->insert([
        //         'section_name'=>$request->section_name,
        //         'description'=>$request->description,
        //         'Created_by'=>(Auth::user()->name),
        //     ]);

        //     session()->flash('Add','تم اضاقة القسم بنجاح');
        //     return redirect('/sections');
        // }
    }

    public function edit($id){
        $section = db::table('sections')->where('id',$id)->first();
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request,$id){
        db::table('sections')->where('id',$id)->update([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
        ]);

        session()->flash('edit','تم التعديل بنجاح');
        return redirect('/sections');
      }

    public function delete($id){
        db::table('sections')->where('id',$id)->delete();
        session()->flash('delete','تم الحذف بنجاح');
        return redirect('/sections');
    }
}
