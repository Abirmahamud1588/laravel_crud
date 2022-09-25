<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class crudcontroller extends Controller
{
    public function home(){

        $alluser = crud::get();

        return view('welcome', compact('alluser'));

         }
    public function signin(){

        return view('signin');

         }

         public function insertdata(Request $request){
            $request -> validate([
                'name' => 'required' ,
                'password' => 'required | min:3' ,
                'email' => 'required' ,
                'image' => 'required' ,



            ],
         [  ' name.required' => 'you have to fill the name' ,
           ' password.required' => 'you have to fill the password' ,
           ' password.min' => 'you have to fill the password with 3 character' ,]
        );

          $insert = new crud();

          $insert -> name = $request -> name ;
          $insert -> password = $request -> password ;
          $insert -> email = $request -> email ;
          $image = $request -> file('image') ;

          if($image){

                $image_name = Str::slug($request -> name);
                $image_extention = $image -> getClientOriginalExtension();
                $fname= $image_name.'-'.time().'.'.$image_extention;
                $uppath = 'images/userimg/' ;
                $imgurl = $uppath.$fname;
                $uploaded = $image -> move($uppath,$fname);
                $insert -> image = $imgurl;

          }

          $insert -> save();
          return redirect() -> back() -> with('success', 'data uploaded');

           }

}
