@extends('admin.layouts.master')

@section('title', 'Profile')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
              <div class="card-header">
                <h4>Update Profile</h4>
              </div>
              <div class="card-body">
                    <div class="row">   
                        <div class="form-group col-12">
                            <div class="mb-3">
                                <img src="{{ asset(Auth::user()->image) }}" alt="profile-image" width="150px;"/>
                            </div>
                            <label>Image</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required />
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required />
                        </div>

                    </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
        
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="" action="{{ route('admin.password.update') }}">
                  @csrf
                <div class="card-header">
                  <h4>Update Password</h4>
                </div>
                <div class="card-body">
                      <div class="row">   

                            <div class="form-group col-12">
                                <label>Current Password</label>
                                <input type="password" class="form-control" name="current_password" required />
                            </div>

                            <div class="form-group col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required />
                            </div>
    
                          <div class="form-group col-12">
                              <label>Confirm Password</label>
                              <input type="password" class="form-control" name="password_confirmation" required />
                          </div>
  
                      </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
      </div>

    </div>
  </section>
@endsection