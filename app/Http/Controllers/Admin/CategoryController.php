<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //category list
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    //create
    public function create(){
        return view('admin.category.create');
    }//end method

    //store
    public function store(Request $request){
       $category = new Category();
       $category->name_en = $request->name_en;
       $category->slug = Str::slug($request->name_en);
       $category->name_bn = $request->name_bn;
       $category->save();
       return redirect()->route('admin.category.index')->with('message','Category Created Successfully');
    }//end method

    //edit
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }//end method

    //update
    public function update(Request $request){
        $id = $request->id;
        $category = Category::find($id);
        $category->name_en = $request->name_en;
       $category->slug = $request->slug;
       $category->name_bn = $request->name_bn;
       $category->save();
       return redirect()->route('admin.category.index')->with('message','Category Updated Successfully');
    }//end method

    //delete
    public function delete($id){
        Category::find($id)->delete();
        return redirect()->back()->with('message','Category Deleted Successfully');
    }//end method
}
