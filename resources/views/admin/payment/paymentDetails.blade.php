@extends('layouts.master')
@section('title')
  Payment
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Pyament Details</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="header-title">Payment Details</h4>
              <a href="{!! route('payment-all',$student->cource_id) !!}" class="float-right btn btn-primary">Back</a>
              <div class="text-center mt-4 mb-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-6">Name :</div>
                        <div class="col-6">{{ $student->name }}</div>
                        <div class="col-6 mt-2">Student Id :</div>
                        <div class="col-6">{{ $student->student_id_number }}</div>
                        <div class="col-6 mt-2">Cource Name :</div>
                        <div class="col-6">{{ $student->cource->cource_name }}</div>
                        <div class="col-6 mt-2">Batch Name :</div>
                        <div class="col-6">{{ $student->batch->batch_name }}</div>
                      </div>
                    </div>
                  </div>
              </div>


              <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>
                          Sl
                      </th>
                      <th>Month</th>
                      <th>Date</th>
                      <th>Amount</th>
                  </tr>
                  </thead>

                  <tbody>

                    @foreach ($payment_list as $payment)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $payment->created_at->format("M") }}</td>
                        <td>{{ $payment->created_at->format("d-m-Y") }}</td>
                        <td>{{ $payment->payment }}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td class="text-danger">Total = </td>
                      <td class="text-danger">{{ $payment_list->sum('payment') }}</td>
                    </tr>

                  </tbody>
              </table>
          </div>
      </div><!-- end col -->
  </div>


@endsection
