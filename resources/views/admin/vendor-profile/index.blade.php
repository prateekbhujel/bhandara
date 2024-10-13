@extends('admin.layouts.master')

@section('title')Vendor Profile @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Vendor Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Update Vendor</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>update vendor details</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.vendor-profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}

                            <div class="my-3 badge bg-warning text-dark">
                                <i class="fas fa-clock me-2"></i> Last Updated On: 
                                <span id="lastUpdated">{{ $profile->updated_at->diffForHumans() ?? 'Not Updated' }}</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Preview</label>
                                <br>
                                <img width="200px;" src="{{ asset($profile->banner ?? 'no-image.jpg') }}" alt="preview-image" />
                            </div>
                            <div class="form-group">
                                <label for="banner">Banner
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="banner" class="form-control" id="banner" />
                            </div>


                            <div class="form-group">
                                <label class="phone">Phone Number (Write With Country Code)
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-phone"></i>
                                    </div>
                                  </div>
                                  <input type="text" name="phone" class="form-control phone-number" value="{{ old('phone', $profile->phone) }}">
                                </div>
                              </div>

                            <div class="form-group">
                                <label for="email">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="form-control" id="email" placeholder="jhondoe@email.com" />
                            </div>

                            <div class="form-group">
                                <label for="address">Address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="address" value="{{ old('address', $profile->address) }}" class="form-control" id="address" placeholder="21 Jump Street, NY, USA" />
                            </div>

                            <div class="form-group">
                                <label for="description">Description
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="summernote" name="description">{{ old('description', $profile->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="fb_link">Facebook Link
                                </label>
                                <input type="text" name="fb_link" value="{{ old('fb_link', $profile->fb_link) }}" class="form-control" id="fb_link" placeholder="https://facebook.com/jhondoe" />
                            </div>                            
                            
                            <div class="form-group">
                                <label for="wa_link">WhatsApp Link
                                </label>
                                <input type="text" name="wa_link" value="{{ old('wa_link', $profile->wa_link) }}" class="form-control" id="wa_link" placeholder="https://wa.me/+9779862500130" />
                            </div>                            
                            
                            <div class="form-group">
                                <label for="insta_link">Instagram Link
                                </label>
                                <input type="text" name="insta_link" value="{{ old('insta_link', $profile->insta_link) }}" class="form-control" id="insta_link" placeholder="https://instagram.com/jhon.doe" />
                            </div>                            
                            
                            <div class="form-group">
                                <label for="tw_link">Twitter/X Link
                                </label>
                                <input type="text" name="tw_link" value="{{ old('tw_link', $profile->tw_link) }}" class="form-control" id="tw_link" placeholder="https://x.com/jhondoe" />
                            </div>

                            <button type="submit" class="btn btn-dark">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection