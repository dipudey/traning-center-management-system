<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\Cource;
use App\Model\Batch;
use App\Model\Payment;
use App\Model\PaymentList;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permission:payment');
    }

    public function getPayment(){
      return view('admin.payment.getPayment',[
        'students' => Student::with('cource','batch','payments')->orderBy('id','desc')->get(),
      ]);
    }

    public function addPayment(Request $request){
      // print_r($request->all());
      if (Payment::where('student_id',$request->student_id)->where('cource_id',$request->cource_id)->exists()) {
        // Decrement
        $oldPayment = Payment::where('student_id',$request->student_id)->first();

        $new_due = $oldPayment->due - $request->payment;
        $new_paid = $oldPayment->paid + $request->payment;
        //update payment history
        Payment::where('student_id',$request->student_id)->where('cource_id',$request->cource_id)->update([
          'paid' => $new_paid,
          'due' => $new_due,
        ]);
      }
      else {
        Payment::insert([
          'student_id' => $request->student_id,
          'cource_id' => $request->cource_id,
          'paid' => $request->payment,
          'due' => $request->amount - $request->payment,
          'created_at' => Carbon::now()
        ]);
      }

      PaymentList::insert([
        'student_id' => $request->student_id,
        'cource_id' => $request->cource_id,
        'payment' => $request->payment,
        'created_at' => Carbon::now()
      ]);

      return back()->with('message',"Payment Successfully Done");
    }

    public function courceWisePayment(){
      return view("admin.payment.courceWisePayment",[
        'cources' => Cource::all(),
      ]);
    }

    public function payment($cource_id){
      return view('admin.payment.payment',[
        'payments' => Payment::where('cource_id',$cource_id)->get(),
      ]);
    }

    public function paymentDetails($student_id){
      return view('admin.payment.paymentDetails',[
        'payment_list' => PaymentList::where('student_id',$student_id)->get(),
        'student' => Student::find($student_id),
      ]);
    }
}
