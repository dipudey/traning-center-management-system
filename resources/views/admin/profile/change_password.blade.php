@extends('layouts.master')
@section('title')
  Change Password
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">change password</li>
  </ol>
@endsection
@section('content')

  <div class="row">
    <div class="col-md-10 m-auto">
      <div class="card">
        <div class="card-header">Change Password</div>
      </div>
      <div class="card-body">
        <form action="{!! route('password.update') !!}" method="post">
          @csrf

          <div class="form-group">
            <label for="">Old Password</label>
            <input type="password" name="old_password" class="form-control">
            @if (session('passwordError'))
              <span class="text-danger">{{ session('passwordError') }}</span>
            @endif
            @error ('old_password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="">New Password</label>
            <input type="password" name="password" class="form-control">
            @error ('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            @if (session('samePassword'))
              <span class="text-danger">{{ session('samePassword') }}</span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
            @error ('password_confirmation')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn-success">Change</button>
        </form>
      </div>
    </div>
  </div>

@endsection
