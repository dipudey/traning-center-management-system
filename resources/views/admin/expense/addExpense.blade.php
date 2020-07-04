@extends('layouts.master')
@section('title')
  Expense
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Expense</li>
  </ol>
@endsection
@section('content')

  <!-- Form row -->
  <div class="row">
      <div class="col-md-10 m-auto">
          <div class="card-box mt-4">
              <h4 class="m-t-0 header-title">Add Your Daily Expense</h4>


              <form action="{!! route('expense-store') !!}" method="post" class="mt-5">
                @csrf

                  <div class="form-group">
                      <label for="amount" class="col-form-label">Expense Amount</label>
                      <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Expense Amount">
                      @error ('amount')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="expense_details" class="col-form-label">Expense Amount</label>
                      <textarea id="expense_details" name="expense_details" rows="4" class="form-control"></textarea>
                      @error ('expense_details')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <button type="submit" class="mt-3 btn btn-info btn-block">Add Student</button>
              </form>
          </div>
      </div>
  </div>
  <!-- end row -->


@endsection
