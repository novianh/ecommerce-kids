@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i>Add Image Thumbnail</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('thumbnail.store', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="id_category"  value="{{ $product->id_category }}">
                        <input type="hidden" name="name"  value="{{ $product->name }}">
                        <input type="hidden" name="sku" value="{{ $product->sku }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="quantity" value="{{ $product->quantity }}">
                        <input type="hidden" name="status" value="{{ $product->status }}">
                        <input type="hidden" name="desc" value="{{ $product->desc }}">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image Thumbnail <small class="text-warning">*(square and potrait only, max height: 600px)</small></label>
                            <input type="file" id="image"
                                class="dropify @error('img_thumbnail') is-invalid @enderror" id="input-file-now"
                                name="img_thumbnail" data-errors-position="outside" data-max-file-size="4M"
                                data-allowed-file-extensions="jpeg png jpg svg gif"  data-allowed-formats="portrait square" data-max-height="600"/>
                            @error('img_thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
                        {{-- <button type="reset" class="btn btn-danger" id="submit">Reset</button> --}}
                        <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });
    </script>
@endpush
