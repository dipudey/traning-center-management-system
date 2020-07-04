@extends('layouts.master')
@section('title')
  Expense
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Today Expense List</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="header-title">Monthly Expense List</h4>
              <div class="text-center mt-4 mb-4">
                  <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav mr-auto">

                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='January'?'bg-success':'' }}" href="{{ url('expense/monthly/January') }}">January <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='February'?'bg-success':'' }}" href="{{ url('expense/monthly/February') }}">February <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='March'?'bg-success':'' }}" href="{{ url('expense/monthly/March') }}">March <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='April'?'bg-success':'' }}" href="{{ url('expense/monthly/April') }}">April <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='May'?'bg-success':'' }}" href="{{ url('expense/monthly/May') }}">May <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='June'?'bg-success':'' }}" href="{{ url('expense/monthly/June') }}">June <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='July'?'bg-success':'' }}" href="{{ url('expense/monthly/July') }}">July <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='August'?'bg-success':'' }}" href="{{ url('expense/monthly/August') }}">August <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='September'?'bg-success':'' }}" href="{{ url('expense/monthly/September') }}">September <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='October'?'bg-success':'' }}" href="{{ url('expense/monthly/October') }}">October <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='November'?'bg-success':'' }}" href="{{ url('expense/monthly/November') }}">November <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item mr-2">
                        <a class="nav-link btn btn-outline-success {{ $month=='December'?'bg-success':'' }}" href="{{ url('expense/monthly/December') }}">December <span class="sr-only">(current)</span></a>
                      </li>


                    </ul>
                  </nav>
              </div>


              <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Expense Details</th>
                      <th>Expense Amount</th>
                      <th>Expense Time</th>
                  </tr>
                  </thead>
                      @forelse ($expenseList as $expense)
                        <tr>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $expense->expense_details }}</td>
                          <td>{{ $expense->amount }}</td>
                          <td>{{ $expense->expense_time }}</td>
                        </tr>
                      @empty
                        <tr class="text-center">
                          <td colspan="50"><span class="text-danger"> No Expense Available </span></td>
                        </tr>
                      @endforelse
                      <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total</b> = </td>
                        <td><b>{{ $expenseList->sum('amount') }}</b></td>
                      </tr>
                  <tbody>

                  </tbody>
              </table>

          </div>
      </div><!-- end col -->
  </div>



@endsection
