@extends('layouts.master')
@section('title')
  Student
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">DipuSoftBd It</li>
    <li class="breadcrumb-item"><a href="{{ url('student/all') }}">Students</a></li>
    <li class="breadcrumb-item active">{{ $student->name }}</li>
  </ol>
@endsection
@section('content')

  <div class="row">
    <div class="col-12">
      <a href="{{ url('student/all') }}" class="btn btn-info float-right">Back</a>
    </div>
      <div class="col-12">
          <div class="card-box mt-4">

              <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>

                    </tr>
                    <tr>
                      <td></td>
                      <td class="text-right">
                        <img src="{!! asset('uploads/students/'.$student->picture) !!}" class="mr-5" alt="">
                      </td>
                    </tr>
                  <tr>
                    <td width="45%"><a id="inline-username">Name</a></td>
                    <td width="55%">{{ $student->name }}</td>
                  </tr>
                  <tr>
                      <td>Email Address</td>
                      <td><a id="inline-firstname">{{ $student->email }}</a></td>
                  </tr>
                  <tr>
                      <td>Student Id</td>
                      <td><a id="inline-sex">{{ $student->student_id_number }}</a></td>
                  </tr>
                  <tr>
                      <td>Cource Name</td>
                      <td><a id="inline-group" class="text-success">{{ $student->cource->cource_name }}</a></td>
                  </tr>
                  <tr>
                      <td>Batch Name</td>
                      <td><a id="inline-status" class="text-warning">{{ $student->batch->batch_name }}</a></td>
                  </tr>

                  <tr>
                      <td>Father's Name</td>
                      <td><a id="inline-dob"data-pk="1">{{ $student->fathers_name }}</a></td>
                  </tr>

                  <tr>
                      <td>Mother's Name</td>
                      <td><a id="inline-dob">{{ $student->mothers_name }}</a></td>
                  </tr>

                  <tr>
                      <td>Self Phone Number</td>
                      <td><a id="inline-dob">{{ $student->phone }}</a></td>
                  </tr>

                  <tr>
                      <td>Gurdian Phone Number</td>
                      <td><a id="inline-dob">{{ $student->gurdian_number }}</a></td>
                  </tr>

                  <tr>
                      <td>Gender</td>
                      <td><a id="inline-dob">{{ $student->sex }}</a></td>
                  </tr>

                  <tr>
                      <td>Graduation</td>
                      <td><a id="inline-dob">{{ $student->graduation }}</a></td>
                  </tr>

                  <tr>
                      <td>Parmanent Address</td>
                      <td><a id="inline-dob">{{ $student->parmanent_address }}</a></td>
                  </tr>

                  <tr>
                      <td>Present Address</td>
                      <td><a id="inline-dob">{{ $student->present_address }}</a></td>
                  </tr>


                  </tbody>
              </table>
          </div>
      </div><!-- end col -->
  </div>


@endsection
