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
              <h4 class="header-title">Expense List</h4>
              <a href="{{ route('expense-add') }}" class="float-right btn btn-success">Add New Expense</a>
              <div class="text-center mt-4 mb-4">
                  <h4>All Expense Of {{ Carbon\Carbon::now()->format("d/M/Y") }}</h4>
              </div>


              <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Expense Details</th>
                      <th>Expense Amount</th>
                      <th>Expense Time</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                      @foreach ($todayExpenses as $expense)
                        <tr>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $expense->expense_details }}</td>
                          <td>{{ $expense->amount }}</td>
                          <td>{{ $expense->expense_time }}</td>
                          <td>
                            <div class="btn-group">
                              <a id="expense_edit" data-id="{{ $expense->id }}" class="btn btn-info">Edit</a>
                              <a href="{!! route('expense-delete',$expense->id) !!}" class="btn btn-danger" id="delete">Delete</a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total</b> = </td>
                        <td>{{ $todayExpenses->sum('amount') }}</td>
                      </tr>
                  <tbody>

                  </tbody>
              </table>

          </div>
      </div><!-- end col -->
  </div>


  <!-- Modal -->
  <div class="modal fade" id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Expense Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('expense-update') }}" method="post" id="expense-update">
            @csrf
            <input type="hidden" name="id" id="id" value="">
            <div class="form-group">
              <label for="">Expense Amount</label>
              <input type="text" name="amount" value="" id="amount" class="form-control" required>
            </div>
            <div class="form-group" id="editCource">
              <label for="">Expense Details</label>
              <textarea name="expense_details" rows="4" class="form-control" id="expense_details"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                        document.getElementById('expense-update').submit();">Update</button>
      </div>
    </div>
  </div>


@endsection
