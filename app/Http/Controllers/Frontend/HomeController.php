<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //home page
    public function index(){
        return view('frontend.home');
    }//end method

    //blog details
    public function blogDetails($id,$slug){
        $blog = Blog::find($id);
        $categories = Category::select('id','slug','name_en','name_bn')->get();
        return view('frontend.pages.blog_details',compact('blog','categories'));
    }//end method
}
