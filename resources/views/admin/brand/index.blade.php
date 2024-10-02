@extends('admin.layouts.master')

@section('title')Product Brand @endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Brand</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Product Brand</div>
        </div>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Brands Data</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.brand.create') }}" class="btn btn-dark">Create New Brand<a/>
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
                let checkbox = $(this);

                $.ajax({
                    url: "{{ route('admin.brand.change-status') }}",
                    method: 'PUT',
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