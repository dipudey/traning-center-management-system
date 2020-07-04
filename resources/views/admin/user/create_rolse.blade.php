@extends('layouts.master')
@section('title')
  User
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Add Role</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="m-t-0 header-title">Add a New User Role</h4>

              <div class="row">
                  <div class="col-12">
                      <div class="p-20 mt-5">

                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="form-group">
                                <label for="">User Role Name</label>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="">Permission</label>
                                <div class="row">
                                  @foreach($permission as $value)
                                      <div class="col-md-3">
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                      </div>
                                  @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Add</button>

                          {!! Form::close() !!}

                      </div>
                  </div>

              </div>
              <!-- end row -->

          </div> <!-- end card-box -->
      </div><!-- end col -->
  </div>
  <!-- end row -->



@endsection
