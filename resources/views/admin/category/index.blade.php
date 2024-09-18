@extends('admin.layouts.master')

@section('title')Product Category @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Product Category</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category Data</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-dark">Create New Category<a/>
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

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                let checkbox = $(this); // Keep a reference to the checkbox

                $.ajax({
                    url: "{{ route('admin.category.change-status') }}",
                    method: 'PUT', // Ensure this matches your route definition
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);

                        // Update the status text and badge class
                        let statusLabel = checkbox.closest('.custom-switch').find('.badge');
                        statusLabel.text(data.statusText);
                        statusLabel.removeClass('badge-success badge-danger');
                        statusLabel.addClass(data.statusClass);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        toastr.error('An error occurred while updating the status.');
                    }
                });
            });
        });

    </script>
@endpush