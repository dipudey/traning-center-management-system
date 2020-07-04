<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use Hash;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $user = Auth::user();
      return view('admin.profile.index',[
        'user' => $user,
      ]);
    }

    public function update(Request $request){
      if ($request->file('picture')) {
        if (Auth::user()->picture) {
          $delete_location = base_path('public/uploads/users/'.Auth::user()->picture);
          unlink($delete_location);
          $file_name = $request->file('picture');
          $name = Auth::id().".".$file_name->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/users/".$name);
          Image::make($file_name)->resize(255,215)->save($upload_location);
          User::find(Auth::id())->update([
            'picture' => $name
          ]);
        }
        else {
          $file_name = $request->file('picture');
          $name = Auth::id().".".$file_name->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/users/".$name);
          Image::make($file_name)->resize(255,215)->save($upload_location);
          User::find(Auth::id())->update([
            'picture' => $name
          ]);
        }
      }

      User::find(Auth::id())->update([
        'name' => $request->name,
        'phone' => $request->phone,
      ]);
      return back()->with('message',"Profile Updated Successfully");

    }

    public function changePassword(){
      return view('admin.profile.change_password');
    }

    public function passwordUpdate(Request $request){
      $request->validate([
        'old_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
      ]);

      if($request->old_password == $request->password) {
        return back()->with('samePassword','Your Old Password Can Not Be Your New Password.');
      }
      if (Hash::check($request->old_password,Auth::user()->password)) {
        User::find(Auth::id())->update([
          'password' => Hash::make($request->password),
        ]);
        return back()->with('message','Password Changed Successfully');
      }
      else {
        return back()->with('passwordError','Old Password Does Not Mathch.');
      }

    }

}
