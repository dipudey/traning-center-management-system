<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cource;
use App\Model\Batch;
use App\Model\Student;
use Carbon\Carbon;
use Image;

class StudentController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permission:student');
    }

    public function index(){
      return view('admin.student.index',[
        'students' => Student::latest()->get()
      ]);
    }

    public function create(){
      return view('admin.student.create',[
        'cources' => Cource::all(),
      ]);
    }

    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:students,email',
        'cource_id' => 'required',
        'batch_id' => 'required',
        'fathers_name' => 'required',
        'mothers_name' => 'required',
        'phone' => 'required|numeric',
        'sex' => 'required',
        'parmanent_address' => 'required',
        'picture' => 'required|mimes: jpg,png,jpeg'
      ],[
        'cource_id.required' => "Cource Name Field is required",
        'batch_id.required' => "Batch Name Field is required",
        'sex.required' => "Gender Field Is Required"
      ]);

      $std_id = Student::insertGetId([
        'name' => $request->name,
        'email' => $request->email,
        'student_id_number' => uniqid(),
        'cource_id' => $request->cource_id,
        'batch_id' => $request->batch_id,
        'fathers_name' => $request->fathers_name,
        'mothers_name' => $request->mothers_name,
        'phone' => $request->phone,
        'gurdian_number' => $request->gurdian_number,
        'sex' => $request->sex,
        'graduation' => $request->graduation,
        'parmanent_address' => $request->parmanent_address,
        'present_address' => $request->present_address,
        'created_at' => Carbon::now()
      ]);

      $picture = $request->file('picture');
      $new_name = $std_id.".".$picture->getClientOriginalExtension();
      $upload_location = base_path("public/uploads/students/".$new_name);
      Image::make($picture)->resize(128,128)->save($upload_location);
      Student::find($std_id)->update([
        'picture' => $new_name,
      ]);
      return back()->with('message',"New Student Added Successfully");
    }

    public function view($student_id){
      return view('admin.student.view',[
        'student' => Student::find($student_id),
      ]);
    }

    public function edit($student_id){
      return view('admin.student.edit',[
        'student' => Student::find($student_id),
        'cources' => Cource::all(),
        'batches' => Batch::where('cource_id',Student::find($student_id)->cource_id)->latest()->get()
      ]);
    }

    public function update(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'cource_id' => 'required',
        'batch_id' => 'required',
        'fathers_name' => 'required',
        'mothers_name' => 'required',
        'phone' => 'required|numeric',
        'sex' => 'required',
        'parmanent_address' => 'required',
        'picture' => 'mimes: jpg,png,jpeg'
      ],[
        'cource_id.required' => "Cource Name Field is required",
        'batch_id.required' => "Batch Name Field is required",
        'sex.required' => "Gender Field Is Required"
      ]);

      if ($request->file('picture')) {
        $delete_location = base_path("public/uploads/students/".Student::find($request->id)->picture);
        unlink($delete_location);

        //new uploads
        $picture = $request->file('picture');
        $new_name = $request->id.".".$picture->getClientOriginalExtension();
        $upload_location = base_path("public/uploads/students/".$new_name);
        Image::make($picture)->resize(128,128)->save($upload_location);
        Student::find($request->id)->update([
          'picture' => $new_name,
        ]);
      }

      Student::find($request->id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'cource_id' => $request->cource_id,
        'batch_id' => $request->batch_id,
        'fathers_name' => $request->fathers_name,
        'mothers_name' => $request->mothers_name,
        'phone' => $request->phone,
        'gurdian_number' => $request->gurdian_number,
        'sex' => $request->sex,
        'graduation' => $request->graduation,
        'parmanent_address' => $request->parmanent_address,
        'present_address' => $request->present_address,
        'updated_at' => Carbon::now()
      ]);

      return back()->with('message',"Student Information Updated Successfully");

    }

    public function destroy($student_id){
      $delete_location = base_path("public/uploads/students/".Student::find($student_id)->picture);
      unlink($delete_location);
      Student::find($student_id)->delete();
      return back()->with('message',"Student Information Deleted Successfully");
    }

    public function studentCourceWish(){
      return view('admin.student.courceWishStudent',[
        'cources' => Cource::all(),
      ]);
    }

    public function studentBatchWish($cource_id){
      return view('admin.student.batchWishStudent',[
        'batches' => Batch::where('cource_id',$cource_id)->latest()->get(),
      ]);
    }

    public function studentListByBatchWish($batch_id){
      return view('admin.student.studentListByBatchWish',[
        'students' => Student::where('batch_id',$batch_id)->latest()->get()
      ]);
    }


    public function findBatch($cource_id){
      return response()->json([
        'data' => Batch::where('cource_id',$cource_id)->latest()->get()
      ]);
    }
}
