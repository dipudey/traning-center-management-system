@extends('layouts.master')
@section('title')
  Paymet
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Get Payment</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title">All Student List</h4>

              <table id="datatable" class="table table-bordered mt-4">
                  <thead>
                  <tr>
                      <th>Student Id</th>
                      <th>Student Name</th>
                      <th>Picture</th>
                      <th>Phone Number</th>
                      <th>Cource</th>
                      <th>Batch</th>
                      <th>Fee</th>
                      <th>Paid</th>
                      <th>Due</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>


                  <tbody>
                    @foreach($students as $student)
                      <tr>
                          <td>{{ $student->student_id_number }}</td>
                          <td>{{ $student->name }}</td>
                          <td>
                            <img src="{{ asset('uploads/students/'.$student->picture) }}" height="80" alt="">
                          </td>
                          <td>{{ $student->phone }}</td>
                          <td>{{ $student->cource->cource_name }}</td>
                          <td>{{ $student->batch->batch_name }}</td>
                          <td>{{ $student->cource->cource_amount }}</td>
                          <td>
                            @isset($student->payments->paid)
                              {{ $student->payments->paid }}
                            @endisset
                          </td>
                          <td>
                            @isset($student->payments->due)
                              {{ $student->payments->due }}
                            @endisset
                          </td>
                          <td>
                            @isset($student->payments->due)
                              @if ($student->payments->due == 0)
                                <span class="badge badge-success">Paid</span>
                              @else
                                <span class="badge badge-danger">Unpaid</span>
                              @endif
                            @else
                                <span class="badge badge-danger">Unpaid</span>
                            @endisset
                            {{-- @if ($student->payment->due == 0)
                              <span class="badge badge-success">Paid</span>
                            @else
                              <span class="badge badge-danger">Unpaid</span>
                            @endif --}}
                          </td>
                          <td>
                            @isset($student->payments->due)
                              @if ($student->payments->due != 0)
                                <div class="btn-group">
                                  <a id="getPayment" data-id="{{ $student->id }}" data-amount="{{ $student->cource->cource_amount }}" data-cource_id="{{ $student->cource_id }}" class="btn btn-primary" >Get Payment</a>
                                </div>
                              @else
                                <div class="btn-group">
                                  <a href="{{ route('payment-details',$student->id) }}" class="btn btn-info" >Details</a>
                                </div>
                              @endif
                            @else
                              <div class="btn-group">
                                <a id="getPayment" data-id="{{ $student->id }}" data-amount="{{ $student->cource->cource_amount }}" data-cource_id="{{ $student->cource_id }}" class="btn btn-primary" >Get Payment</a>
                              </div>
                            @endisset
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
            <input type="hidden" name="cource_id" value="" id="cource_id">
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
