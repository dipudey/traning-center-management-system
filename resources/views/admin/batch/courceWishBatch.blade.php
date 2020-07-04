@extends('layouts.master')
@section('title')
  Batch
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item"><a href="{{ url('batch/all') }}">Batch</a></li>
      <li class="breadcrumb-item active">courceWishBatch List</li>
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
                        <th>Cource Name</th>
                        <th>Total Batch</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($cources as $cource)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $cource->cource_name }}</td>
                          <td>{{ $cource->batch->count() }}</td>
                          <td>
                            <a href="{{ route('cource.wish.batch.list',$cource->id) }}" class="btn btn-success">View</a>
                          </td>
                        </tr>
                      @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->



@endsection
