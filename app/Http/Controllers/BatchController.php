<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cource;
use App\Model\Batch;
use Carbon\Carbon;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:batch');
    }

    public function index(){
      return view('admin.batch.index',[
        'batches' => Batch::all()
      ]);
    }

    public function create(){
      return view('admin.batch.create',[
        'cources' => Cource::all()
      ]);
    }

    public function store(Request $request){
      $request->validate([
        'batch_name' => 'required|unique:batches,batch_name',
        'cource_id' => 'required'
      ],[
        'cource_id.required' => "Select a Cource"
      ]);

      Batch::insert([
        'batch_name' => $request->batch_name,
        'cource_id' => $request->cource_id,
        'created_at' => Carbon::now()
      ]);
      return back()->with('message',"New Batch Added Successfully");
    }

    public function edit($batch_id){
      return response()->json([
        'data' => Batch::find($batch_id),
        'cources' => Cource::all()
      ]);
    }

    public function update(Request $request){
      Batch::find($request->id)->update([
        'batch_name' => $request->batch_name,
        'cource_id' => $request->cource_id,
        'updated_at' => Carbon::now()
      ]);
      return back()->with('message',"Batch Updated Successfully");
    }

    public function destroy($batch_id){
      Batch::find($batch_id)->delete();
      return back()->with('message',"Batch Deleted Successfully");
    }

    public function courceWishBatch(){
      return view('admin.batch.courceWishBatch',[
        'cources' => Cource::all(),
      ]);
    }

    public function courceWishBatchList($cource_id){
      return view('admin.batch.courceWishBatchList',[
        'batches' => Batch::where('cource_id',$cource_id)->latest()->get(),
        'cource_name' => Cource::find($cource_id)->cource_name,
      ]);
    }
}
