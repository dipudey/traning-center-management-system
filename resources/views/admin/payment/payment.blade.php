@extends('layouts.master')
@section('title')
  Paymet
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Payment Details</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title">All Payment List</h4>

              <table id="datatable" class="table table-bordered mt-4">
                  <thead>
                  <tr>
                      <th>Student Id</th>
                      <th>Student Name</th>
                      <th>Picture</th>
                      <th>Phone Number</th>
                      <th>Batch</th>
                      <th>Fee</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    @foreach($payments as $payment)
                      <tr>
                          <td>{{ $payment->student->student_id_number }}</td>
                          <td>{{ $payment->student->name }}</td>
                          <td>
                            <img src="{{ asset('uploads/students/'.$payment->student->picture) }}" height="80" alt="">
                          </td>
                          <td>{{ $payment->student->phone }}</td>
                          <td>{{ $payment->student->batch->batch_name }}</td>
                          <td>{{ $payment->student->cource->cource_amount }}</td>
                          <td>{{ $payment->paid }}</td>
                          <td>{{ $payment->due }}</td>
                          <td>
                            @if ($payment->due == 0)
                              <span class="badge badge-success">Paid</span>
                            @else
                              <span class="badge badge-danger">Unpaid</span>
                            @endif
                          </td>
                          <td>
                            <div class="btn-group">
                              <a href="{{ route('payment-details',$payment->student_id) }}" class="btn btn-info" >Details</a>
                            </div>
                          </td>
                      </tr>
                    @endforeach
                 </tbody>
              </table>
          </div>
      </div>
  </div> <!-- end row -->

  <!-- Modal -->
  <div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Get Paymet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{!! route('payment.add') !!}" method="post" id="payment-form">
            @csrf
            <input type="hidden" name="student_id" value="" id="addStd">
            <input type="hidden" name="amount" value="" id="amount">
            <div class="form-group">
              <label for="payment">Amount</label>
              <input type="text" name="payment" id="payment" placeholder="Enter amount" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                        document.getElementById('payment-form').submit();">Submit</button>
      </div>
    </div>
  </div>


@endsection
