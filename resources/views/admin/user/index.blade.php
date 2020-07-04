@extends('layouts.master')
@section('title')
  User
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">All User</li>
  </ol>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All User List</h4>

                <table id="datatable" class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach ($data as $key => $user)
                      <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                               <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                          @endif
                        </td>
                        <td>
                          <div class="btn-group btn-sm">
                            <a class="btn btn-info" id="user-show" data-id="{{ $user->id }}">Show</a>
                            <a class="btn btn-danger" id="delete" href="{!! route('user-delete',$user->id) !!}">Delete</a>
                          </div>
                        </td>
                      </tr>
                      @endforeach

                    <tbody>

                   </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->

    <!-- Modal -->
    <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">Name :</div>
              <div class="col-md-6" id="user-name"></div><br>
              <div class="col-md-6">Email :</div>
              <div class="col-md-6" id="user-email"></div><br>
              <div class="col-md-6">User Role :</div>
              <div class="col-md-6"><span class="badge badge-success" id="user-role"></span></div><br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>


@endsection
