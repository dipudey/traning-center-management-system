@extends('layouts.master')
@section('title')
  User
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Add User</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="m-t-0 header-title">Add a New User</h4>

              <div class="row">
                  <div class="col-12">
                      <div class="p-20 mt-5">
                          <form action="{{ route('user-store') }}" method="post" class="form-horizontal" role="form">
                            @csrf

                            <div class="form-group row">
                                <label class="col-2 col-form-label">User Name</label>
                                <div class="col-10">
                                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                             </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">User Email</label>
                                <div class="col-10">
                                  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Confirm Password</label>
                                <div class="col-10">
                                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">User Email</label>
                                <div class="col-10">
                                  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                </div>
                             </div>

                              <div class="form-group row">
                                  <label class="col-2 col-form-label">User Role</label>
                                  <div class="col-10">
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                  </div>
                               </div>

                              <button type="submit" class="btn btn-outline-success btn-block">Add New User</button>

                          </form>
                      </div>
                  </div>

              </div>
              <!-- end row -->

          </div> <!-- end card-box -->
      </div><!-- end col -->
  </div>
  <!-- end row -->



@endsection
