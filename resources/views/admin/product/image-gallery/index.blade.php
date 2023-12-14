@extends('admin.layout.master')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Prduct Image Gallery</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product: {{$product->name}}</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.product-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Image <code>(Multiple image supported)</code></label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    <input type="hidden" name="product" class="" value="{{$product->id}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Products</h4>

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
