@extends('admin.layouts.master')

@section('title')Product Category @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create New Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></div>
            <div class="breadcrumb-item"> Create Category</div>
        </div>
        
    </div>
    <div class="section-body">
        <a href="{{ route('admin.category.index') }}" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Go Back</a><br />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>create new category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.category.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="icon">Icon
                                    <span class="text-danger">*</span>
                                </label>
                                <div>
                                    <button name="icon" data-icon="{{ old('icon') }}" class="btn btn-primary" data-selected-class="btn-primary" data-unselected-class="btn-muted" role="iconpicker"></button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Eg: Electronics, Men's Fashion, Women's Fashion." />
                            </div>

                            <div class="form-group">
                                <label for="status">Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ old('status') == '1' ? "selected" : "" }}> Active </option>
                                    <option value="0" {{ old('status') == '0' ? "selected" : "" }}> Inactive </option>
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