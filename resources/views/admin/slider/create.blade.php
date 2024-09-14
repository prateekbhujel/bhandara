@extends('admin.layouts.master')

@section('title')Slider-Create @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Slider</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Slider</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="banner">Banner Image</label>
                                <input type="file" name="banner" class="form-control" id="banner" />
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" value="{{ old('type') }}" class="form-control" id="type" placeholder="Type of the Product." />
                            </div>

                            <div class="form-group">
                                <label for="title">title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Title of Product" />
                            </div>

                            <div class="form-group">
                                <label for="starting_price">Starting Price</label>
                                <input type="text" name="starting_price" value="{{ old('starting_price') }}" class="form-control" id="starting_price" placeholder="178" />
                            </div>

                            <div class="form-group">
                                <label for="btn_url">Button Url</label>
                                <input type="text" name="btn_url" value="{{ old('btn_url') }}" class="form-control" id="btn_url" placeholder="https:://example.com" />
                            </div>

                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <input type="text" name="serial" value="{{ old('serial') }}" class="form-control" id="serial" placeholder="SN no. example: 1 or 2 or 3." />
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
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