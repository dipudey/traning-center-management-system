@extends('layouts.master')
@section('title')
  Student
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item"><a href="{{ url('student/all') }}">Students</a></li>
      <li class="breadcrumb-item active">Add Students</li>
  </ol>
@endsection
@section('content')

  <!-- Form row -->
  <div class="row">
      <div class="col-md-12">
          <div class="card-box">
              <h4 class="m-t-0 header-title">Add Student Information</h4>


              <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data" class="mt-5">
                @csrf
                  <div class="form-group">
                      <label for="name" class="col-form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Student Name">
                      @error ('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="email" class="col-form-label">Email Address</label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Enter Student Email Address">
                      @error ('email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="inputEmail4" class="col-form-label">Cource Name</label>
                          <select name="cource_id" class="form-control select2" id="cource-select">
                              <option value="">Select</option>
                              @foreach($cources as $cource)
                                <option value="{{ $cource->id }}">{{ $cource->cource_name }}</option>
                              @endforeach
                          </select>
                          @error ('cource_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                          <label for="inputPassword4" class="col-form-label">Batch Name</label>
                          <select name="batch_id" class="form-control select2" id="batch-select">

                          </select>
                          @error ('batch_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="fathers_name" class="col-form-label">Fathers Name</label>
                      <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                      @error ('fathers_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="mothers_name" class="col-form-label">Mothers Name</label>
                      <input type="text" name="mothers_name" class="form-control" id="mothers_name">
                      @error ('mothers_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="phone" class="col-form-label">Mobile Number</label>
                          <input type="text" class="form-control" id="phone" name="phone">
                          @error ('phone')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                          <label for="gurdian_number" class="col-form-label">Gurdian Number</label>
                          <input type="text" name="gurdian_number" class="form-control" id="gurdian_number">
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="sex" class="col-form-label">Gender</label>
                          <select name="sex" class="form-control select2" id="cource-select">
                              <option value="">Select</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                          </select>
                          @error ('sex')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group col-md-6">
                          <label for="graduation" class="col-form-label">Graduation</label>
                          <select name="graduation" class="form-control select2" id="cource-select">
                              <option value="">Select</option>
                              <option value="jsc">JSC</option>
                              <option value="ssc">SSC</option>
                              <option value="hsc">HSC</option>
                              <option value="diploma">Diploma</option>
                              <option value="bsc">BSC</option>
                              <option value="msc">MSC</option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="parmanent_address" class="col-form-label">Parmanent Address</label>
                      <input type="text" name="parmanent_address" class="form-control" id="parmanent_address">
                      @error ('parmanent_address')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="present_address" class="col-form-label">Present Address</label>
                      <input type="text" name="present_address" class="form-control" id="present_address">
                  </div>

                  <div class="form-group row">
                      <label class="col-3 col-form-label">Image Upload</label>
                      <div class="col-9">
                          <div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                  <img src="{{ asset('dashboard_assets') }}/assets/images/small/img-1.jpg" alt="image" />
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                              <div>
                                  <button type="button" class="btn btn-custom btn-file">
                                      <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                      <input type="file" name="picture" class="btn-light" />
                                  </button>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                              </div>
                          </div>
                          @error ('picture')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <div class="alert alert-info"><strong>Notice!</strong> The image formate must Be png,jpg,jpeg and image size less than 1MB</div>
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block">Add Student</button>
              </form>
          </div>
      </div>
  </div>
  <!-- end row -->

@endsection
