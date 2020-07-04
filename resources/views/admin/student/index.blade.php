@extends('layouts.master')
@section('title')
  Student
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Students</li>
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
                      <th>SL NO</th>
                      <th>Student Name</th>
                      <th>Student Id</th>
                      <th>Picture</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                  </tr>
                  </thead>


                  <tbody>
                    @foreach($students as $student)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->student_id_number }}</td>
                          <td>
                            <img src="{{ asset('uploads/students/'.$student->picture) }}" height="80" alt="">
                          </td>
                          <td>{{ $student->phone }}</td>
                          <td>
                            <div class="btn-group">
                              <a  href="{{ url('student/view/'.$student->id) }}" class="btn btn-info" >View</a>
                              <a href="{{ url('student/edit/'.$student->id) }}" class="btn btn-success">Edit</a>
                              <a href="{{ url('student/delete/'.$student->id) }}" id="delete" class="btn btn-danger">Delete</a>
                            </div>
                          </td>
                      </tr>
                    @endforeach
                 </tbody>
              </table>
          </div>
      </div>
  </div> <!-- end row -->


@endsection
