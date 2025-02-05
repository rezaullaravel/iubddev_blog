<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageSettingController extends Controller
{
    //set bangla
    public function setBangla(){
       Session::forget('lang');
       Session::put('lang','bangla');
       return redirect()->back();
    }

      //set english
      public function setEnglish(){
        Session::forget('lang');
        Session::put('lang','english');
        return redirect()->back();
      }
}
