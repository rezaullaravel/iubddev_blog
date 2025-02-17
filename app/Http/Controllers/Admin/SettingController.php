<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class SettingController extends Controller
{
    //site setting form
    public function index(){
        $setting = Setting::first();
        return view('admin.site_setting.index',compact('setting'));
    }

    //site setting update
    public function update(Request $request,$id){
        //image upload
        if($request->favicon){


            $file = $request->file('favicon');
            $fileName = rand().'.'.$file->getClientOriginalName();
            $filePath = 'upload/site_images/'.$fileName;

            //create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);

            $image->resize(80,80);
            $image->save(public_path('upload/site_images/').$fileName);
        }

        $setting = Setting::find($id);
        if($request->favicon){
            $setting->favicon =  $filePath;
        }

        $setting->site_email =  $request->site_email;
        $setting->site_phone =  $request->site_phone;
        $setting->site_address =  $request->site_address;
        $setting->save();
        return redirect()->back()->with('message','Site setting updated successfully');

    }//end method
}
