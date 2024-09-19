@extends('admin.layouts.master')

@section('title') Product Child Category @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Product Child Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.child-category.index') }}">Product Child Category</a></div>
            <div class="breadcrumb-item"> Create Product Child Category</div>
        </div>
        
    </div>
    <div class="section-body">
        <a href="{{ route('admin.child-category.index') }}" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Go Back</a><br />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>create product child category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.child-category.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="category_id">Category
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="category_id" class="form-control main-category" id="category_id">
                                    <option readonly disabled selected> --- Select Category --- </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="sub_category_id" class="form-control sub-category" id="sub_category_id">
                                    <option readonly disabled selected> --- Select Sub Category --- </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Eg: DSLR, Blue T-shirt, Fair and Lovely." />
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
            $('body').on('change', '.main-category', function () {
               let id = $(this).val();
               $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-sub-categories') }}",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                        $('.sub-category').html(`<option readonly disabled selected> --- Select Sub Category --- </option>`);
                        
                        $.each(data, function(i, item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`);  
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