@extends('layouts.master')
@section('title')
  Profile
@endsection
@section('breadcrumb')
  <ol class="breadcrumb">
      <li class="breadcrumb-item">DipuSoftBd It</li>
      <li class="breadcrumb-item active">Profile</li>
  </ol>
@endsection
@section('content')

  <div class="row">
      <div class="col-sm-12">
          <!-- meta -->
          <div class="profile-user-box card-box bg-custom">
              <div class="row">
                  <div class="col-sm-6">
                      <span class="pull-left mr-3">
                        @if ($user->picture)
                          <img src="{{ asset('uploads/users/'.$user->picture) }}" alt="" class="thumb-lg rounded-circle">
                        @else
                          <img src="{{ asset('dashboard_assets') }}/assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle">
                        @endif
                      </span>
                      <div class="media-body text-white">
                          <h4 class="mt-1 mb-1 font-18">{{ $user->name }}</h4>
                          <p class="font-16 text-light">
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                 {{ $v }}
                              @endforeach
                            @endif
                          </p>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="text-right">
                          <a href="#editProfile" class="btn btn-light waves-effect">
                              <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <!--/ meta -->
      </div>
  </div>
  <!-- end row -->


  <div class="row">
      <div class="col-md-4">
          <!-- Personal-Information -->
          <div class="card-box">
              <h4 class="header-title mt-0 m-b-20">Personal Information</h4>
              <div class="panel-body">
                  <p class="text-muted font-13">
                      Hye, I’m  {{ $user->name }}. I am a
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                           {{ $v }}
                        @endforeach
                      @endif
                      in this Company.I am join in this company in {{ $user->created_at->format('d-M-Y') }}
                  </p>

                  <hr/>

                  <div class="text-left">
                      <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{ $user->name }}</span></p>

                      <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{ $user->phone?$user->phone:'' }}</span></p>

                      <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{ $user->email }}</span></p>


                  </div>

              </div>
          </div>
          <!-- Personal-Information -->

      </div>


      <div class="col-md-8">

          <div class="row">

              <div class="col-sm-12">
                  <div class="card-box tilebox-one" id="editProfile">
                    <div class="card-title">Update Profile</div>
                    <form action="{!! route('profile.update') !!}" method="post" class="mt-4" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly>
                      </div>

                      <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                      </div>

                      <div class="form-group row">
                          <label class="col-3 col-form-label">Profil Picture</label>
                          <div class="col-9">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="{{ asset('dashboard_assets') }}/assets/images/small/img-1.jpg" alt="image" />
                                  </div>
                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    @if ($user->picture)
                                      <img src="{{ asset('uploads/users') }}/{{ $user->picture }}" alt="image" />
                                    @endif
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
                              <div class="alert alert-info"><strong>Notice!</strong> The image formate must Be png,jpg,jpeg and image size less than 1MB</div>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-success btn-block">Update Profile</button>
                    </form>
                  </div>
              </div><!-- end col -->


          </div>
          <!-- end row -->

      </div>
      <!-- end col -->

  </div>
  <!-- end row -->

@endsection
