@extends('layouts.master')
@section('title')
  Attendance
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">All Attendance Date</li>
  </ol>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All Attendance Date List</h4>

                <table id="datatable" class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($dates as $date)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $date->attendance_date }}</td>
                          <td>
                            <a href="{{ url('attendance/view/batch/'.$batch_id.'/date/'.$date->attendance_date) }}" class="btn btn-success">Details</a>
                          </td>
                        </tr>
                      @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->



@endsection
