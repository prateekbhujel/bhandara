@extends('admin.layouts.master')

@section('title')Slider @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Slider</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Full Width</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-dark">Create New<a/>
                        </div>
                    </div>
                    <div class="card-body p-0">

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection