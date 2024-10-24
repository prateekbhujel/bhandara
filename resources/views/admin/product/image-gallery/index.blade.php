@extends('admin.layouts.master')

@section('title')Products Image Gallery @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product Image Gallery</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Product Image Gallery</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Upload Image</h4>
                    </div>
                    <div class="card-body p-2">
                        <form action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Image <code>(Multiple image uploads are supported!)</code></label>
                                <input type="file" name="" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-info ml-2">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Images</h4>
                    </div>
                    <div class="card-body p-2">
                        {{ $dataTable->table() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush