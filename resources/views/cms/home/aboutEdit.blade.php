@extends('adminlte::page')
@section('title', 'About')

@section('content_header')
    <h6> </h6>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'slider')

@section('content')

    <div class="card">
        <div class="card-header pb-0 text-left">
            <h5 class="">About</h5>
        </div>
        <form class="forms-sample" enctype="multipart/form-data" method="POST"
            action="{{ route('about.update', $about->id) }}" id="my-awesome-dropzone">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputUsername1">Icon subtitle</label>
                    <input type="text" name="subtitle" value="{{ $about->subtitle }}"
                        class="form-control @error('subtitle') is-invalid @enderror" id="exampleInputUsername1"
                        placeholder="subtitle" required>
                    @error('subtitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Icon <small class="text-warning">*(Square)</small></label>
                    <input type="file" class="dropify @error('desc') is-invalid @enderror" id="input-file-now"
                        name="icon" data-errors-position="outside" data-allowed-formats="square" data-max-file-size="4M"
                        data-allowed-file-extensions="jpeg png jpg svg gif"
                        data-default-file="{{ url('storage/about/' . $about->icon) ?? '' }}" />
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-light" type="button">Back</a>
                <button type="submit" class="btn btn-primary mx-2">Submit</button>
                <button type="reset" class="btn btn-primary ">Submit</button>
            </div>
        </form>

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
