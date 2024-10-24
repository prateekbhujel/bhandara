@extends('admin.layouts.master')

@section('title') Product Sub Category @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Product Sub Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.sub-category.index') }}">Product Sub Category</a></div>
            <div class="breadcrumb-item">Edit Product Sub Category
            </div>
        </div>
        
    </div>
    <div class="section-body">
        <a href="{{ route('admin.sub-category.index') }}" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Go Back</a><br />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>edit product sub category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.sub-category.update', $subCategory->id) }}">
                            @method('PUT')
                            @csrf
                            
                            <div class="form-group">
                                <label for="category_id">Category
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option> --- Select Category --- </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $subCategory->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $subCategory->name) }}" class="form-control" id="name" placeholder="Eg: Camera, T-Shirt, Face Wash." />
                            </div>

                            <div class="form-group">
                                <label for="status">Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ old('status', $subCategory->status) == '1' ? "selected" : "" }}> Active </option>
                                    <option value="0" {{ old('status', $subCategory->status) == '0' ? "selected" : "" }}> Inactive </option>
                                </select>
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