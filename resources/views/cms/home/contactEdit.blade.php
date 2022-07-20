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
        <div class="card-header">
            <h5>Social</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('social.update', $social->id) }}" method="post" id="my-awesome-dropzone"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="exampleInputUsername1" placeholder="e.g Instagram" required
                        value="{{ $social->name ?? old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputUsername1">Url</label>
                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                        id="exampleInputUsername1" placeholder="e.g www.instagram/.." required
                        value="{{ $social->url ?? old('url') }}">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Icon <small class="text-warning">*(Square)</small></label>
                    <input type="text" class="form-control @error('desc') is-invalid @enderror" name="icon" value="{{ $social->icon }}"
                        />
                    @error('icon')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-light" type="button" data-dismiss="modal">back</a>
                    <button type="reset" class="btn btn-warning mx-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
