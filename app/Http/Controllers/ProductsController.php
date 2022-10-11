<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $sections = section::all();
        $products = products::all();
        return view('products.products', compact('sections', 'products'));
    }


    public function store(Request $request)
    {


        $validated = $request->validate(
            [
                'Product_name' => 'required|unique:products|max:255',
                'description' => 'required',
            ],

            [
                'Product_name.required' => 'يرجى ادخال اسم المنتج',
                'Product_name.unique' => 'اسم المنتج مسجل مسبقا',
                'description.required' => 'يرجى ادخال اسم الوصف',

            ]
        );

        DB::table('products')->insert([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $request->section_id,

        ]);
        session()->flash('Add', 'تم اضاقة المنتج بنجاح');
        return redirect('/products');
    }

    public function edit($id)
    {
        $sections = section::all();
       
        $product = db::table('products')->where('id', $id)->first();
        return view('products.edit', compact('product','sections'));
    }

    public function update(Request $request, $id)
    {



        db::table('products')->where('id', $id)->update([
            'Product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);

        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect('/products');
    }

    public function delete($id)
    {
        db::table('sections')->where('id', $id)->delete();
        session()->flash('delete', 'تم الحذف بنجاح');
        return redirect('/products');
    }
}
