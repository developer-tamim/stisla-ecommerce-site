@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Prduct Variants</h1>
        </div>
        
        <div class="mb-3">
            <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Products Variants</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i
                                        class="fa-solid fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">

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