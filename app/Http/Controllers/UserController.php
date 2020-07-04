<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use DB;
use Hash;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permission:user');
    }

    public function index(Request $request){
      $data = User::orderBy('id','DESC')->get();
      return view('admin.user.index',compact('data'));
    }

    public function create(){
      return view('admin.user.create',[
        'roles' => Role::pluck('name','name')->all()
      ]);
    }

    public function store(Request $request){
      $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return back()->with('message','User created successfully');
    }

    public function show($id){
      return response()->json([
        'data' => User::find($id),
        'role' => User::find($id)->getRoleNames()
      ]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('message','User deleted successfully');
    }
}
