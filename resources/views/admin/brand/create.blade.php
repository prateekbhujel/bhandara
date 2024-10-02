@extends('admin.layouts.master')

@section('title')Brand-Create @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create New Brand</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Brands</a></div>
            <div class="breadcrumb-item">Create Brand</div>
        </div>
        
    </div>
    <div class="section-body">
        <a href="{{ route('admin.brand.index') }}" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Go Back</a><br />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>create new brand</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="logo">Brand Logo
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="logo" class="form-control" id="logo" />
                            </div>

                            <div class="form-group">
                                <label for="name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="type" placeholder="Type of the Product." />
                            </div>

                            <div class="form-group">
                                <label for="status">Is Featured
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="is_featured" class="form-control" id="is_featured">
                                    <option value="0" {{ old('is_featured') == '0' ? "selected" : "" }}> No </option>
                                    <option value="1" {{ old('is_featured') == '1' ? "selected" : "" }}> Yes </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ old('status') == '1' ? "selected" : "" }}> Active </option>
                                    <option value="0" {{ old('status') == '0' ? "selected" : "" }}> InActive </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-dark">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection