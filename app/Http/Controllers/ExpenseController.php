<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Expense;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('permission:expense');
    }

    public function addExpense(){
      return view('admin.expense.addExpense');
    }

    public function expenseStore(Request $request){
      $request->validate([
        'amount' => 'required|numeric',
        'expense_details' => 'required'
      ]);

      Expense::insert([
        'amount' => $request->amount,
        'expense_details' => $request->expense_details,
        'expense_time' => date("Y-m-d"),
        'expense_month' => date("F"),
        'created_at' => Carbon::now()
      ]);
      return back()->with('message',"New Expense Add Successfully");
    }

    public function todayExpense(){
      return view('admin.expense.todayExpense',[
        'todayExpenses' => Expense::where('expense_time',date('Y-m-d'))->get()
      ]);
    }

    public function show($id){
      return response()->json([
        'data' => Expense::find($id)
      ]);
    }

    public function update(Request $request){
      Expense::find($request->id)->update([
        'amount' => $request->amount,
        'expense_details' => $request->expense_details
      ]);
      return back()->with('message',"Today Expense is Updated");
    }

    public function monthlyExpense(){
      $month = date("F");
      return redirect('expense/monthly/'.$month);
    }

    public function month($month){
      return view('admin.expense.expenseMonthly',[
        'month' => $month,
        'expenseList' => Expense::where('expense_month',$month)->get(),
      ]);
    }

    public function destroy($id){
      Expense::find($id)->delete();
      return back()->with('message',"Expense Deleted Successfully");
    }
}
