@extends('adminlte::page')
@section('title', 'Slider')

@section('content_header')
    <h6> </h6>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'slider')

@section('content')
    <div class="row ">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @isset($hero)
                        <button type="button" class="btn edit btn-block btn-primary mb-3" data-toggle="modal"
                            data-target="#modal-form"><i class="fas fa-edit"></i> edit</button>
                    <h6>NB:</h6>
                    <p> {{ '<span>...</span>' }} make change color</p>
                        <div class="stretch-card">
                            <div class="card bg-light">
                                <div class="card-header bg-light">
                                    <h5>Hero</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <img src="{{ asset('storage/hero/' . $hero->image) }}" alt="..." class="col-2">
                                        <div class="col-10">
                                            <h5>{{ $hero->title }}</h5>
                                            <br>
                                            <small>{{ $hero->desc }}</small>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>New Arrival</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <p>{{ $new->desc ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        @isset($logo)
                        <div class="card bg-light">
                            <div class="card-header bg-light">
                                <h5>Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <img src="{{ asset('storage/logo/' . $logo->logo) }}" alt="..." class="col-md-1 col-2">
                                </div>
                            </div>
                        </div>
                        @endisset
                        @empty($logo)
                        <div class="card bg-light">
                            <div class="card-header bg-light">
                                <h5>Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <small>Data not found</small>
                                </div>
                            </div>
                        </div>
                        @endempty
                    @endisset

                    @empty($hero)
                        <div class="d-flex justify-content-center">
                            <a type="button" class=" btn btn-block tambah m-auto" data-toggle="modal"
                                data-target="#modal-form"><i class="fas fa-plus"></i> ADD</a>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h5 class="">Edit slider</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('slider.store') }}" id="my-awesome-dropzone">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hero->id ?? '' }}">
                            <input type="hidden" name="id_new" value="{{ $new->id ?? '' }}">
                            <input type="hidden" name="id_logo" value="{{ $new->id ?? '' }}">
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername1"
                                        placeholder="Title" value="{{ $hero->title ?? '' }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputEmail1">Description for hero section</label>
                                    <textarea class="form-control  @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                        name="desc" placeholder="Deskripsi singkat">{{ $hero->desc ?? '' }}</textarea>
                                    @error('desc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputEmail1">Description for new arrival section</label>
                                    <textarea class="form-control  @error('desc_new') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                        name="desc_new" placeholder="Deskripsi singkat">{{ $new->desc ?? '' }}</textarea>
                                    @error('desc_new')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @isset($hero)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image <small class="text-warning">*(Landscape /
                                                Square)</small></label>
                                        <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                            id="input-file-now" name="image" data-errors-position="outside"
                                            data-min-width="800" data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif"
                                            data-default-file="{{ url('storage/hero/' . $hero->image) ?? '' }}" />
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endisset
                                @empty($hero)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image <small class="text-warning">*(Landscape /
                                                Square)</small></label>
                                        <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                            id="input-file-now" name="image" data-errors-position="outside"
                                            data-min-width="800" data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif" />
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endempty
                                @isset($logo)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Logo <small class="text-warning">*(Landscape /
                                                Square)</small></label>
                                        <input type="file" class="dropify @error('logo') is-invalid @enderror"
                                            id="input-file-now" name="logo" data-errors-position="outside"
                                             data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif"
                                            data-default-file="{{ url('storage/logo/' . $logo->logo) ?? '' }}" />
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endisset
                                @empty($logo)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Logo <small class="text-warning">*(Landscape /
                                                Square)</small></label>
                                        <input type="file" class="dropify @error('logo') is-invalid @enderror"
                                            id="input-file-now" name="logo" data-errors-position="outside"
                                             data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif" />
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endempty

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
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
