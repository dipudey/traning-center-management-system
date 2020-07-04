@extends('layouts.master')
@section('title')
  Dashboard
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Dashboard</li>
  </ol>
@endsection
@section('content')

  <div class="row text-center">
      <div class="col-sm-6 col-lg-6 col-xl-3">
          <div class="card-box widget-flat border-custom bg-custom text-white">
              <i class="fi-layers"></i>
              <h3 class="m-b-10">{{ $total_cource }}</h3>
              <p class="text-uppercase m-b-5 font-13 font-600">Total Cources</p>
          </div>
      </div>
      <div class="col-sm-6 col-lg-6 col-xl-3">
          <div class="card-box bg-primary widget-flat border-primary text-white">
              <i class="fi-archive"></i>
              <h3 class="m-b-10">{{ $total_batch }}</h3>
              <p class="text-uppercase m-b-5 font-13 font-600">Total Batch</p>
          </div>
      </div>
      <div class="col-sm-6 col-lg-6 col-xl-3">
          <div class="card-box widget-flat border-success bg-success text-white">
              <i class="fi-help"></i>
              <h3 class="m-b-10">{{ $total_student }}</h3>
              <p class="text-uppercase m-b-5 font-13 font-600">Total Student</p>
          </div>
      </div>
      <div class="col-sm-6 col-lg-6 col-xl-3">
          <div class="card-box bg-danger widget-flat border-danger text-white">
              <i class="fi-delete"></i>
              <h3 class="m-b-10">{{ $total_due }} /=</h3>
              <p class="text-uppercase m-b-5 font-13 font-600">Total Due</p>
          </div>
      </div>
  </div>
  <!-- end row -->


@endsection
