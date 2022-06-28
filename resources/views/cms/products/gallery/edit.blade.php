@extends('adminlte::page')
@section('title', 'Edit Image')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> Edit Image</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" id="addImage"
                        action="{{ route('gallery.update', $image->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control"
                                id="disableTextInput" value="{{ $image->id }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="product_id" id="product_id" class="form-control"
                                id="disableTextInput" value="{{ $image->product_id }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Image</label>
                            <input type="file" id="image" class="dropify @error('image') is-invalid @enderror"
                                id="input-file-now" name="image" data-errors-position="outside" data-max-file-size="4M"
                                data-allowed-file-extensions="jpeg png jpg svg gif" data-default-file="{{ url('storage/products/' . $image->image) }}" />
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
                        {{-- <button type="reset" class="btn btn-danger" id="submit">Reset</button> --}}
                        <a href="{{ url()->previous() }}" class="btn btn-light" data-dismiss="modal">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection