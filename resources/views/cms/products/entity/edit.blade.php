@extends('adminlte::page')
@section('title', 'Edit Entity Image')

@section('content_header')
    <h1>

        <i class='mdi mdi-image-area'></i> Edit Entity Products
    </h1>
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
                        action="{{ route('entity.update', $entity->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" id="disableTextInput"
                                value="{{ $entity->id }}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="product_id" id="product_id" class="form-control"
                                id="disableTextInput" value="{{ $entity->product_id }}">
                        </div>

                        <div
                            class="input-group input-group-static input-group-lg @error('color') is-invalid @enderror my-3">
                            <label for="exampleInputUsername1" class="">Color</label>
                            <input type="text" name="color" class="form-control" id="exampleInputUsername1"
                                value="{{ old('color') ?? $entity->color }}">
                        </div>
                        @error('color')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="input-group input-group-static input-group-lg @error('size') is-invalid @enderror my-3">
                            <label for="exampleInputUsername1" class="">Size</label>
                            <input type="text" name="size" class="form-control" required id="exampleInputUsername1"
                                value="{{ old('size') ?? $entity->size }}">
                        </div>
                        @error('size')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
                        <button type="reset" class="mr-2 btn btn-warning" id="submit">Reset</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
