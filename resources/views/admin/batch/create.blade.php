@extends('layouts.master')
@section('title')
  Batch
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Batch</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-12">
          <div class="card-box">
              <h4 class="m-t-0 header-title">Add a New Batch</h4>

              <div class="row">
                  <div class="col-12">
                      <div class="p-20 mt-5">
                          <form action="{{ route('batch.store') }}" method="post" class="form-horizontal" role="form">
                            @csrf
                              <div class="form-group row">
                                  <label class="col-2 col-form-label">Batch Name</label>
                                  <div class="col-10">
                                      <input type="text" class="form-control" name="batch_name">
                                      @error ('batch_name')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-2 col-form-label">Cource Name</label>
                                  <div class="col-10">
                                      <select class="form-control" name="cource_id">
                                        <option value="">--select--</option>
                                        @foreach($cources as $cource)
                                          <option value="{{ $cource->id }}">{{ $cource->cource_name }}</option>
                                        @endforeach
                                      </select>
                                      @error ('cource_id')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-outline-success btn-block">Add New Batch</button>

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
