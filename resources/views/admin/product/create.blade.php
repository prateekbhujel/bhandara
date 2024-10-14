@extends('admin.layouts.master')

@section('title')Slider-Create @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create New Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Products</a></div>
            <div class="breadcrumb-item">Create Product</div>
        </div>
        
    </div>
    <div class="section-body">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Go Back</a><br />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>create new product</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="thumb_image">Product Image
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="thumb_image" class="form-control" id="thumb_image" />
                            </div>

                            <div class="form-group">
                                <label for="name">Product Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Name of the Product." />
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Category
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="category_id" class="form-control main-category" id="category_id">
                                            <option disabled  selected>-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sub_category_id">Sub Category</label>
                                        <select name="sub_category_id" class="form-control sub-category" id="sub_category_id">
                                            <option>-- Select Sub Category --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="child_category_id">Child Category</label>
                                        <select name="child_category_id" class="form-control child-category" id="child_category_id">
                                            <option>-- Select Child Category --</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="starting_price">Starting Price
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="starting_price" value="{{ old('starting_price') }}" class="form-control" id="starting_price" placeholder="178" />
                            </div>

                            <div class="form-group">
                                <label for="btn_url">Video Url
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="video_link" value="{{ old('video_link') }}" class="form-control" id="btn_url" placeholder="https:://youtube.com/yourVideoLink" />
                            </div>

                            <div class="form-group">
                                <label for="serial">Serial
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="serial" value="{{ old('serial') }}" class="form-control" id="serial" placeholder="SN no. example: 1 or 2 or 3." />
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

@push('scripts')
    <script>
        $(document).ready( function () {

            /** Get Sub Categories **/
            $('body').on('change', '.main-category', function () {
               let id = $(this).val();
               $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        $('.sub-category').html(`<option disabled selected> --- Select Sub Category --- </option>`);
                        
                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`);  
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
               });
            }); 

            /** Get Child Categories **/
            $('body').on('change', '.sub-category', function () {
               let id = $(this).val();
               $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.product.get-childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        $('.child-category').html(`<option disabled selected> --- Select Child Category --- </option>`);
                        
                        $.each(data, function(i, item){
                            $('.child-category').append(`<option value="${item.id}">${item.name}</option>`);  
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
               });
            }); 

        });
    </script>
@endpush