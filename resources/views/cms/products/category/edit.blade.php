@extends('backend.app')
@section('title')
    <i class='mdi mdi-image-area'></i> Add Image Products
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endsection

@section('breadcrumb', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" enctype="multipart/form-data" method="POST" id="addImage"
                            action="{{ route('category.update', $category->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="exampleInputUsername1">Category Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername1"
                                    placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Image</label>
                                <input type="file" id="image" class="dropify @error('image') is-invalid @enderror"
                                    id="input-file-now" name="image" data-errors-position="outside"
                                    data-max-file-size="4M" data-allowed-file-extensions="jpeg png jpg svg gif" data-default-file="{{ url('storage/category/' . $category->image) }}"/>
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
    </div>
@endsection
@section('js')
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Used events
            // var drEvent = $('.dropify').dropify();

            // drEvent.on('dropify.error.imageFormat', function(event, element) {
            //     alert('Image format error message!');
            // });
        });
    </script>
@endsection
