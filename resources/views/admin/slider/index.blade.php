@extends('admin.layouts.master')

@section('title')Slider @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Slider</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sliders Data</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-dark">Create New Slider<a/>
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