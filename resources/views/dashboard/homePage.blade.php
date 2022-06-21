@extends('backend.app')
@section('title')
    <i class='mdi mdi-home'></i> Management Main Cover
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('template/vendor/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('home.store') }}" id="my-awesome-dropzone">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="exampleInputUsername1" placeholder="Title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                name="desc"></textarea>
                            @error('desc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="dropify form-control-file" data-height="300" />
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('template/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
