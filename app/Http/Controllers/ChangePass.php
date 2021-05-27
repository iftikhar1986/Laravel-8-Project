<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChangePass extends Controller
{
     public function changePassword(){


         return view('admin.body.changes_password');
     }

     public function updatePassword(Request $request){

         $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed'
         ]);

         $hashPassword = Auth::user()->password;
         if(Hash::check($request->oldpassword,$hashPassword)){
             $user = User::find(Auth::id());
             $user->password = Hash::make($request->password);
             $user->save();
             Auth::logout();
             return redirect()->route('login')->with('success','Password Is Changed  Successfully');

         }else{
             return redirect()->back()->with('error','Current Password is Invalid');
         }
     }

     public function profileUpdate(){
       if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
       }
     }

     public function updateUser(Request $request){
         $user = User::find(Auth::user()->id);
         if($user){
             $user->name = $request['name'];
             $user->email = $request['email'];
            //$user->profile_photo_path = $request['profile_photo_path'];
            $user->profile_photo_path  = $request->image->store('public/profile-photos', 'public');

             $user->save();
             return redirect()->back()->with('success','Updated Successfully');

         }else{
             return redirect()->back();
         }
     }
}
