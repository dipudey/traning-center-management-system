<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cource;
use Carbon\Carbon;

class CourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:cource');
    }

    public function index(){
      return view('admin.cource.index',[
        'cources' => Cource::all()
      ]);
    }

    public function create(){
      return view('admin.cource.create');
    }

    public function store(Request $request){
      Cource::insert([
        'cource_name' => $request->cource_name,
        'cource_duration' => $request->cource_duration,
        'cource_amount' => $request->cource_amount,
        'cource_details' => $request->cource_details,
        'created_at' => Carbon::now()
      ]);
      return back()->with('message','New Cource Add Successfully');
    }

    public function view($cource_id){
      return response()->json([
        'data' => Cource::find($cource_id)
      ]);
    }

    public function edit($cource_id){
      return view('admin.cource.edit',[
        'data' => Cource::find($cource_id)
      ]);
    }

    public function update(Request $request){
      Cource::find($request->id)->update([
        'cource_name' => $request->cource_name,
        'cource_duration' => $request->cource_duration,
        'cource_amount' => $request->cource_amount,
        'cource_details' => $request->cource_details,
        'created_at' => Carbon::now()
      ]);
      return redirect('all/cource')->with('message','Cource Updated Successfully');
    }

    public function destroy($cource_id){
      Cource::find($cource_id)->delete();
      return back()->with('message',"Cource Deleted Successfully");
    }
}
