@extends('layouts.master')
@section('title')
  Role
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">All User Roles</li>
  </ol>
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">All User Role List</h4>

                <table id="datatable" class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Role Name</th>
                        <th>Permission</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                      @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                              @php
                                $role = Spatie\Permission\Models\Role::find($role->id);
                                $rolePermissions = Spatie\Permission\Models\Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                    ->where("role_has_permissions.role_id",$role->id)
                                    ->get();
                              @endphp
                              @if(!empty($rolePermissions))
                                  @foreach($rolePermissions as $v)
                                      <label class="badge badge-success">{{ $v->name }},</label>
                                  @endforeach
                              @endif
                            </td>
                            <td>
                              <a href="{!! route('roles.destroy',$role->id) !!}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                            document.getElementById('delete').submit();">Delete</a>
                              <form id="delete" action="{{ route('roles.destroy',$role->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('delete')
                              </form>
                            </td>
                        </tr>
                        @endforeach

                    <tbody>

                   </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->



@endsection
