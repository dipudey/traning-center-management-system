@extends('layouts.master')
@section('title')
  Cource
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Cource</li>
  </ol>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All Cource List</h4>

                <table id="datatable" class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Cource Name</th>
                        <th>Cource Duration</th>
                        <th>Cource Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>
                      @foreach($cources as $cource)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $cource->cource_name }}</td>
                            <td>{{ $cource->cource_duration }} (Month)</td>
                            <td>{{ $cource->cource_amount }} Taka</td>
                            <td>
                              <div class="btn-group">
                                <a id="cource-view" data-id ="{{ $cource->id }}" class="btn btn-info" >View</a>
                                <a href="{{ url('edit/cource/'.$cource->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('delete/cource/'.$cource->id) }}" id="delete" class="btn btn-danger">Delete</a>
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
    <div class="modal fade" id="cource-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cource Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-column">
              <div class="p-2">Cource Name : <strong id="cource_name"></strong></div>
              <div class="p-2">Cource Duration : <strong id="cource_duration"></strong>Month</div>
              <div class="p-2">Cource Amount : <strong id="cource_amount"></strong>Taka</div>
              <div class="p-2">Cource details : <span id="cource_details"></span></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>


@endsection
