<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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


            $file = $request->file('image');
            $fileName = rand().'.'.$file->getClientOriginalName();
            $filePath = 'upload/blog_images/'.$fileName;

            //create image manager with desired driver
             $manager = new ImageManager(new Driver());
             $image = $manager->read($file);

             $image->resize(500,400);
             $image->save(public_path('upload/blog_images/').$fileName);
        }

        $blog = new Blog;
        $blog->category_id = $request->category_id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->title_en);
        $blog->desc_en = $request->desc_en;
        $blog->desc_bn = $request->desc_bn;
        $blog->image =  $filePath;
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
            // $image = $request->image;
            // $imageName = rand().'.'.$image->getClientOriginalName();
            // $image->move('upload/blog_images/',$imageName);
            // $imagePath = 'upload/blog_images/'.$imageName;
            $file = $request->file('image');
            $fileName = rand().'.'.$file->getClientOriginalName();
            $filePath = 'upload/blog_images/'.$fileName;

            //create image manager with desired driver
             $manager = new ImageManager(new Driver());
             $image = $manager->read($file);

             $image->resize(500,400);
             $image->save(public_path('upload/blog_images/').$fileName);
        }


        $blog->category_id = $request->category_id;
        $blog->title_en = $request->title_en;
        $blog->title_bn = $request->title_bn;
        $blog->slug = Str::slug($request->slug);
        $blog->desc_en = $request->desc_en;
        $blog->desc_bn = $request->desc_bn;
        $blog->status = $request->status;
        $blog->is_popular = $request->is_popular;
        if(!empty($request->image)){
            $blog->image =  $filePath;
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

     //ck editor image upload and update
     public function uploadCkeditor(Request $request){
        // Check if there is a file in the request
        if($request->hasFile('upload')){
            // Get the old image URL from the request if available
            $oldImageUrl = $request->input('oldImage');

            // Delete the old image if it exists
            if ($oldImageUrl && file_exists(public_path($oldImageUrl))) {
                unlink(public_path($oldImageUrl));
            }

            // Upload the new image
            $image = $request->file('upload');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/ckeditor_images/'), $imgName);
            $url = url('upload/ckeditor_images/' . $imgName); // Generate the full URL

            return response()->json([
                'url' => $url, // Provide the URL to the uploaded image
                'uploaded' => true // Indicate successful upload
            ]);
        }
    }



}
