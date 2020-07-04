@extends('layouts.master')
@section('title')
  Batch
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item"><a href="{{ url('batch/all') }}">Batch</a></li>
      <li class="breadcrumb-item active">{{ $cource_name }} Batch List</li>
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
                        <th>Cource Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                      @foreach($batches as $batch)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $batch->batch_name }}</td>
                            <td>{{ $batch->cource->cource_name }}</td>
                            <td>{{ $batch->created_at->format("d-M-Y") }}</td>
                            <td>
                              <div class="btn-group">
                                <a id="batch-edit" data-id="{{ $batch->id }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('batch/delete/'.$batch->id) }}" id="delete" class="btn btn-danger">Delete</a>
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
    <div class="modal fade" id="batch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cource Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('batch.update') }}" method="post" id="update-form">
              @csrf
              <input type="hidden" name="id" id="id" value="">
              <div class="form-group">
                <label for="">Batch Name</label>
                <input type="text" name="batch_name" value="" id="batch_name" class="form-control" required>
              </div>
              <div class="form-group" id="editCource">
                <label for="">Cource Name</label>
                <select class="form-control" name="cource_id" id="cource">

                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" onclick="event.preventDefault();
                          document.getElementById('update-form').submit();">Update</button>
        </div>
      </div>
    </div>


@endsection
