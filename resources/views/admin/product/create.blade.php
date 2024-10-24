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
                                            <option disabled selected>-- Select Sub Category --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="child_category_id">Child Category</label>
                                        <select name="child_category_id" class="form-control child-category" id="child_category_id">
                                            <option disabled selected>-- Select Child Category --</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="brand_id">Brand</label>
                                <span class="text-danger">*</span>
                                <select id="brand_id" class="form-control brand" name="brand_id">
                                    <option selected disabled>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" name="sku" value="{{ old('sku') }}" />
                            </div>                            

                            <div class="form-group">
                                <label for="price">Price
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="178" />
                            </div>

                            <div class="form-group">
                                <label for="offer_price">Offer Price</label>
                                <input type="text" name="offer_price" value="{{ old('offer_price') }}" class="form-control" id="offer_price" placeholder="178" />
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="offer_start_date">Offer Start Date</label>
                                        <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}" class="form-control datepicker" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="offer_end_date">Offer End Date</label>
                                        <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}" class="form-control datepicker" />
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" class="form-control" value="{{ old('qty') }}" min="1" placeholder="12" />
                            </div>

                            <div class="form-group">
                                <label for="video_link">Video Link</label>
                                <input type="text" name="video_link" value="{{ old('video_link') }}" class="form-control" id="video_link" placeholder="https:://youtube.com/yourVideoLink" />
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description
                                    <span class="text-danger">*</span>
                                </label>
                               <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                            </div>                            
                            
                            <div class="form-group">
                                <label for="long_description">Long Description
                                    <span class="text-danger">*</span>
                                </label>
                               <textarea name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                            </div>
                                
                            <div class="form-group">
                                <label for="product_type">Product Type</label>
                                <em class="text-muted text-xs">(Leave "Select Product Type" if you do not want to assign any type)</em>
                                <select name="product_type" class="form-control" id="product_type">
                                    <option selected>--Select Product Type--</option>
                                    <option value="new_arrival">New Arrival</option>
                                    <option value="featured_product">Featured</option>
                                    <option value="top_product">Top Product</option>
                                    <option value="best_product">Best Product</option>
                                </select>
                            </div>                                  
                            
                            <div class="form-group">
                                <label for="seo_title">Seo Title</label>
                               <textarea name="seo_title" class="form-control">{{ old('seo_title') }}</textarea>
                            </div>                            
                            
                            <div class="form-group">
                                <label for="seo_description">Seo Description</label>
                               <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
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