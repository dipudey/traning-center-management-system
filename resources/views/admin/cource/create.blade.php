@extends('layouts.master')
@section('title')
  Cource
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ url('all/cource') }}">All Cource</a></li>
      <li class="breadcrumb-item active">Add Cource</li>
  </ol>
@endsection
@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 m-auto">
        <div class="card mt-3">
          <div class="card-header">
            <div class="card-title">Add Cource</div>
          </div>
          <div class="card-body">
            <form action="{!! route('cource.store') !!}" method="post">
              @csrf
              <div class="form-group">
                <label class="form-label">Cource Name</label>
                <input type="text" name="cource_name" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="form-label">Cource Duration</label>
                <input type="text" name="cource_duration" class="form-control" required>
                <small id="emailHelp" class="form-text text-muted"> You will give how may month this cource time</small>
              </div>
              <div class="form-group">
                <label class="form-label">Cource Amount</label>
                <input type="text" name="cource_amount" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="form-label">Cource Details</label>
                <textarea name="cource_details" rows="5" class="form-control" required></textarea>
              </div>
              <button type="submit" class="btn btn-outline-success btn-block"> Add Cource </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
