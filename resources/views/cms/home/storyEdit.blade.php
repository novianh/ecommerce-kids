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

    <div class="card ">
        <div class="card-header pb-0 text-left">
            <h5 class="">Story Edit</h5>
        </div>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('about.story.update', $story->id) }}"
            id="my-awesome-dropzone">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputUsername1">Title</label>
                    <input type="text" name="title" required class="form-control @error('title') is-invalid @enderror"
                        id="exampleInputUsername1" placeholder="Title" value="{{ $story->title }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputUsername1">Year</label>
                    <input type="text" name="year" required class="form-control @error('year') is-invalid @enderror"
                        id="exampleInputUsername1" placeholder="2020" value="{{ $story->year }}">
                    @error('year')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                        name="desc" placeholder="Description" required>{{ $story->desc }}</textarea>
                    @error('desc')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-light" type="button">Back</a>
                <button class="btn btn-warning mx-3" type="reset">Reset</button>
                <button type="submit" class="btn btn-primary mr-2">Update</button>
            </div>
        </form>

    </div>

@endsection
