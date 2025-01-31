<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //all blog
    public function index(){
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }//end method

    //create
    public function create(){
        $categories = Category::get();
        return view('admin.blog.create',compact('categories'));
    }

    //store
    public function store(Request $request){

        //image upload
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/blog_images/',$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }

        $blog = new Blog;
        $blog->category_id = $request->category_id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->title_en);
        $blog->desc_en = $request->desc_en;
        $blog->desc_bn = $request->desc_bn;
        $blog->image =  $imagePath;
        $blog->save();
        return redirect()->route('admin.blog.index')->with('message','Blog Created Successfully');
    }

    //edit
    public function edit($id){
        $blog = Blog::find($id);
        $categories = Category::get();
        return view('admin.blog.edit',compact('blog','categories'));
    }//end method

    //update
    public function update(Request $request,$id){
        $blog = Blog::find($id);
        //image upload
        if($request->image){
            if(File::exists($blog->image)){
                unlink($blog->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/blog_images/',$imageName);
            $imagePath = 'upload/blog_images/'.$imageName;
        }


        $blog->category_id = $request->category_id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->slug);
        $blog->desc_en = $request->desc_en;
        $blog->desc_bn = $request->desc_bn;
        $blog->status = $request->status;
        if(!empty($request->image)){
            $blog->image =  $imagePath;
        }

        $blog->save();
        return redirect()->route('admin.blog.index')->with('message','Blog Updated Successfully');
    }

    //delete
    public function delete($id){
        $blog = Blog::find($id);
        
        if(File::exists($blog->image)){
            unlink($blog->image);
        }

        $blog->delete();
        return redirect()->back()->with('message','Blog Deleted Successfully');
    }



}
