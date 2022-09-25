<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\fileExists;

class crudcontroller extends Controller
{
    public function home(){

        $alluser = crud::get();

        return view('home', compact('alluser'));

         }
    public function signin(){

        return view('signin');

         }
    public function dataedit($id){

        $datashow= crud::where('id',$id)->first();
        return view('dataedit',compact('datashow'));

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
          $insert -> password = Hash::make($request -> password)  ;
          $insert -> email =  $request -> email ;
          $image = $request -> file('image') ;

          if($image){

                $image_name = Str::slug($request -> name);
                $image_extention = $image -> getClientOriginalExtension();
                $fname= $image_name.'-'.time().'.'.$image_extention;
                $uppath = 'images/userimg/' ;
                $imgurl = $uppath.$fname;
                $uploaded = $image -> move($uppath,$fname);
                $insert -> image = $fname  ;

          }

          $insert -> save();
          return redirect() -> back() -> with('success', 'data uploaded');

           }




           public function updatedata(Request $request,$id){

            $dataupdate= crud::where('id',$id)->first();
            $request -> validate([
                'name' => 'required' ,

                'email' => 'required' ,




            ],  [
                ' name.required' => 'you have to fill the name' ,
               ]
        );
        $dataupdate -> name = $request -> name ;
          $dataupdate -> email = $request -> email ;
             if($request->hasFile('image'))
             {
                 unlink(public_path('images/userimg/'.$dataupdate->image));

                 $image = $request -> file('image') ;
          if($image){

            $image_name = Str::slug($request -> name);
            $image_extention = $image -> getClientOriginalExtension();
            $fname= $image_name.'-'.time().'.'.$image_extention;
            $uppath = 'images/userimg/' ;
            $imgurl = $uppath.$fname;
            $uploaded = $image -> move($uppath,$fname);
            $dataupdate -> image = $fname  ;

      }

             }







          $dataupdate -> update();
          return redirect() -> back() -> with('success', 'data updated');

           }


           //del
           public function datadel($id){

            $data = crud::where('id',$id)->first();


      if(file_exists(public_path('images/userimg/'.$data->image)))
      {

        unlink(public_path('images/userimg/'.$data->image));
      }


            $data -> delete();
            return redirect()->route('home')->with('success', 'data delted');

             }

}
