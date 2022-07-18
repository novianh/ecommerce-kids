@extends('adminlte::page')
@section('title', 'What')

@section('content_header')
    <h6> </h6>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'slider')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @isset($wwd)
                        <button type="button" class="btn edit btn-block btn-primary mb-3" data-toggle="modal"
                            data-target="#modal-form"><i class="fas fa-edit"></i> edit</button>

                        <div class="stretch-card">
                            
                                    <div class="row">
                                        <div class="col-6 ">
                                            
                                            <div class="card bg-light">
                                                <div class="card-header bg-light">
                                                    <h5>Left Section </h5>
                                                    <hr class="dark horizontal my-0">
                                                </div>
                                                <div class="card-body ">
                                                    <div class="row">
                                                        <img src="{{ asset('storage/wwd/' . $wwd->image1) }}" alt="..."
                                                            class="col-3" width="100%">
                                                        <div class="col-9">
                                                            <h5>Title: {{ $wwd->title1 }}</h5>
                                                            <br>
                                                            <small>Description: {{ $wwd->desc1 }}</small>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            
                                        </div>
                                        <div class="col-6 ">
                                            <div class="card bg-light">
                                                <div class="card-header bg-light">
                                                    <h5>Right Section </h5>
                                                    <hr class="dark horizontal my-0">
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <img src="{{ asset('storage/wwd/' . $wwd->image2) }}" alt="..."
                                                            class="col-3" width="100%">
                                                        <div class="col-9">
                                                            <h5>Title: {{ $wwd->title2 }}</h5>
                                                            <br>
                                                            <small>Description: {{ $wwd->desc2 }}</small>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                           
                        </div>
                    </div>
                @endisset
                @empty($wwd)
                    <div class="d-flex justify-content-center">

                        <a type="button" class=" btn btn-block tambah m-auto" data-toggle="modal" data-target="#modal-form"><i
                                class="fas fa-plus"></i> ADD</a>
                    </div>
                @endempty
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">What We Do Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="{{ route('wwd.store') }}" id="my-awesome-dropzone">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3 ms-3 card card-plain">
                                    <div class="card-header bg-light">
                                        <h6>Left Content</h6>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $wwd->id ?? '' }}">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleInputUsername1">Title</label>
                                            <input type="text" name="title1"
                                                class="form-control @error('title1') is-invalid @enderror"
                                                id="exampleInputUsername1" placeholder="Title"
                                                value="{{ $wwd->title1 ?? '' }}">
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control  @error('desc1') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                                name="desc1" placeholder="Description">{{ $wwd->desc1 ?? '' }}</textarea>
                                            @error('desc')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        @isset($wwd)
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Image <small class="text-warning">*(Landscape
                                                        )</small></label>
                                                <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                                    id="input-file-now" name="image1" data-errors-position="outside"
                                                     data-max-file-size="4M"
                                                    data-allowed-file-extensions="jpeg png jpg svg gif"
                                                    data-default-file="{{ url('storage/wwd/' . $wwd->image1) ?? '' }}" />
                                            </div>
                                        @endisset
                                        @empty($wwd)
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Image<small class="text-warning">*(Landscape
                                                        )</small></label>
                                                <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                                    id="input-file-now" name="image1" data-errors-position="outside"
                                                     data-max-file-size="4M"
                                                    data-allowed-file-extensions="jpeg png jpg svg gif" />

                                            </div>
                                        @endempty

                                    </div>

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="card card-plain mt-3 me-3">
                                    <div class="card-header bg-light">
                                        <h6>Right Content</h6>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $wwd->id ?? '' }}">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleInputUsername1">Title</label>
                                            <input type="text" name="title2"
                                                class="form-control @error('title2') is-invalid @enderror"
                                                id="exampleInputUsername1" placeholder="Title"
                                                value="{{ $wwd->title2 ?? '' }}">
                                            @error('title2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea class="form-control  @error('desc2') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                                name="desc2" placeholder="Description">{{ $wwd->desc2 ?? '' }}</textarea>
                                            @error('desc2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        @isset($wwd)
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Image<small
                                                        class="text-warning">*(Landscape)</small></label>
                                                <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                                    id="input-file-now" name="image2" data-errors-position="outside"
                                                     data-max-file-size="4M"
                                                    data-allowed-file-extensions="jpeg png jpg svg gif"
                                                    data-default-file="{{ url('storage/wwd/' . $wwd->image2) ?? '' }}" />

                                            </div>
                                        @endisset
                                        @empty($wwd)
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Image <small
                                                        class="text-warning">*(Landscape)</small></label>
                                                <input type="file" class="dropif @error('image') is-invalid @enderror"
                                                    id="input-file-now" name="image2" data-errors-position="outside"
                                                     data-max-file-size="4M"
                                                    data-allowed-file-extensions="jpeg png jpg svg gif" />
                                            </div>
                                        @endempty

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
            $('.dropif').dropify();

            // Used events
            // var drEvent = $('.dropify').dropify();

            // drEvent.on('dropify.error.imageFormat', function(event, element) {
            //     alert('Image format error message!');
            // });

        });
    </script>
@endsection
