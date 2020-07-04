@extends('layouts.master')
@section('title')
  Attendance
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Take Attendance</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="header-title">Take Attendance</h4>
              <a href="" class="float-right btn btn-primary">Back</a>
              <div class="text-center mt-4 mb-4">
                  <h3>ToDay is {{ Carbon\Carbon::now()->format("d-M-Y") }}</h3>
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

                    <form action="{!! route('submit-attendance') !!}" method="post" id="attendance">
                      @csrf
                      <input type="hidden" name="batch_id" value="{{ $batch_id }}">
                      @foreach ($students as $student)
                        <tr>

                          <td>{{ $loop->index + 1 }}</td>
                          <td>
                            {{ $student->name }}
                              <input type="hidden" name="id[{{ $student->id }}]" value="{{ $student->id }}">
                          </td>
                          <td>{{ $student->student_id_number }}</td>
                          <td>
                            <img src="{{ asset('uploads/students/'.$student->picture) }}" alt="">
                          </td>
                          <td>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="{{ $student->id }}" name="action[{{ $student->id }}]" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="{{ $student->id }}">Present</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="{{ $student->student_id_number }}" name="action[{{ $student->id }}]" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="{{ $student->student_id_number }}">Absent</label>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </form>

                  </tbody>
              </table>
              <button type="button" class="btn btn-success mt-4 float-right" onclick="event.preventDefault();
                            document.getElementById('attendance').submit();">Add Attendance</button>
          </div>
      </div><!-- end col -->
  </div>


@endsection
