@extends('admin.layouts.master')

@section('title')Product @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Products</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Product</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Products Data</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-dark">Create New Product<a/>
                        </div>
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