@extends('layouts.master')
@section('title')
  Attendance
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">All Batch</li>
  </ol>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All Batch List</h4>

                <table id="datatable" class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Batch Name</th>
                        <th>Total Student</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($batches as $batch)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $batch->batch_name }}</td>
                          <td>{{ $batch->students->count() }}</td>
                          <td>
                            <a href="{{ route('all-attendance-by-batch',$batch->id) }}" class="btn btn-info btn-sm">View</a>
                          </td>
                        </tr>
                      @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->



@endsection
