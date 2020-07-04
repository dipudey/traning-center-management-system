@extends('layouts.master')
@section('title')
  Attendance
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">All Attendance</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="header-title">All Attendance</h4>
              <a href="{!! route('all-attendance-by-batch',$batch_id) !!}" class="float-right btn btn-primary">Back</a>
              <div class="text-center mt-4 mb-4">
                  <h3>Attendance Date is : {{ $date }}</h3>
              </div>


              <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Student Name</th>
                      <th>Student Id</th>
                      <th>Student Picture</th>
                      <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>

                      @foreach ($attendances as $row)
                        <tr>

                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $row->student->name }}</td>
                          <td>{{ $row->student->student_id_number }}</td>
                          <td>
                            <img src="{{ asset('uploads/students/'.$row->student->picture) }}" alt="">
                          </td>
                          <td>
                            @if ($row->action == 0)
                              <span class="badge badge-danger">Absent</span>
                            @else
                              <span class="badge badge-success">Present</span>
                            @endif
                          </td>
                        </tr>
                      @endforeach

                  </tbody>
              </table>

          </div>
      </div><!-- end col -->
  </div>


@endsection
