<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Cource;
use App\Model\Batch;
use App\Model\Attendance;
use Carbon\Carbon;
use DB;

class AttendanceController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permission:attendance');
    }

    public function showCources(){
      return view("admin.attendance.courceShow",[
        'cources' => Cource::all(),
      ]);
    }

    public function showBatch($cource_id){
      return view('admin.attendance.batchShow',[
        'batches' => Batch::where('cource_id',$cource_id)->latest()->get()
      ]);
    }

    public function takeAttendance($batch_id){
      return view('admin.attendance.takeAttendance',[
        'students' => Student::where('batch_id',$batch_id)->get(),
        'batch_id' => $batch_id,
      ]);
    }

    public function storeAttendance(Request $request){

      foreach($request->id as $student_id){
        if (Attendance::where('student_id',$student_id)->where('attendance_date',date("Y-m-d"))->exists()) {
          return back()->with([
            'type' => 'error',
            'message' => "Attendance Already Taken"
          ]);
        }
        else {
          if (isset($request->action[$student_id])) {
            Attendance::insert([
              'student_id' => $student_id,
              'batch_id' => $request->batch_id,
              'action' => $request->action[$student_id],
              'attendance_date' => date("Y-m-d"),
              'created_at' => Carbon::now()
            ]);
          }
          else {
            Attendance::insert([
              'student_id' => $student_id,
              'batch_id' => $request->batch_id,
              'action' => 0,
              'attendance_date' => date("Y-m-d"),
              'created_at' => Carbon::now()
            ]);
          }
        }
      }
      return redirect()->route('take-attendance')->with('message',"Attendance Successfully Taken");
    }


    public function allAttendance(){
      return view("admin.attendance.allAttendanceByCource",[
        'cources' => Cource::all(),
      ]);
    }

    public function allAttendanceByCource($cource_id){
      return view('admin.attendance.allAttendanceByBatch',[
        'batches' => Batch::where('cource_id',$cource_id)->latest()->get()
      ]);
    }

    public function allAttendanceByBatch($batch_id){
      return view('admin.attendance.attendanceDate',[
        'dates' => DB::table('attendances')
        ->select(\DB::raw('CAST(attendance_date as date) as attendance_date'))
        ->distinct('attendance_date')
        ->where('batch_id',$batch_id)->get(),
        'batch_id' => $batch_id,
      ]);
    }

    public function attendanceView($batch_id,$date){
      return view('admin.attendance.allAttendance',[
        'date' => $date,
        'batch_id' => $batch_id,
        'attendances' => Attendance::where('attendance_date',$date)->where('batch_id',$batch_id)->get()
      ]);
    }
}
