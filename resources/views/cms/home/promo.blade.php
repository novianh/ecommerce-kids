@extends('adminlte::page')
@section('title', 'Promo')

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
                    @isset($promo)
                        <button type="button" class="btn edit btn-block btn-primary mb-3" data-toggle="modal"
                            data-target="#modal-form"><i class="fas fa-edit"></i> edit</button>

                        <div class="stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Value</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">Image</th>
                                            
                                            <td><img src="{{ asset('storage/promo/' . $promo->image) }}" alt=""
                                                class="rounded-5 shadow-lg col-5" width="100%"></td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Title</th>
                                            <td>{!! $promo->title !!}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Discount</th>
                                            <td>{{ $promo->discount }}%</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Icon</th>
                                            <td><img src="{{ asset('storage/promo/icon/' . $promo->icon) }}"
                                                alt="ornament" class="mx-auto mb-3 col-4 col-md-5" width="100%"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    {{-- <section id="discount" class="py-lg-5 ">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-7 col-xl-8 ">

                                                    <img src="{{ asset('storage/promo/' . $promo->image) }}" alt=""
                                                        class="rounded-5 shadow-lg" width="100%">

                                                </div>
                                                <div class="col-12 col-md-5 col-xl-4 text-center mt-4 mt-md-0">
                                                    <div class="wrapper rounded-5 py-5">
                                                        <img src="{{ asset('storage/promo/icon/' . $promo->icon) }}"
                                                            alt="ornament" class="mx-auto mb-3 col-4 col-md-5" width="100%">
                                                        <p class="text-uppercase mb-4"><br> SALE {{ $promo->discount }}%</p>
                                                        <h1 class="text-capitalize mb-4">{{ $promo->title }}</h1>
                                                        <div class=" d-block">
                                                            <button type="button"
                                                                class="btn btn-info rounded-5 px-4 shadow-lg">Discover
                                                                Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section> --}}

                                </div>
                            </div>
                        </div>
                    @endisset

                    @empty($promo)
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
                            <h5 class="">Edit promo</h5>
                        </div>
                        <form class="forms-sample" enctype="multipart/form-data" method="POST"
                            action="{{ route('promo.store') }}" id="my-awesome-dropzone">
                            @csrf
                            <input type="hidden" name="id" value="{{ $promo->id ?? '' }}">
                            <div class="card-body">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername1"
                                        placeholder="Title" value="{{ $promo->title ?? '' }}">
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleInputUsername1">Discount</label>
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                    <input type="text" name="discount"
                                        class="form-control @error('discount') is-invalid @enderror"
                                        id="exampleInputUsername1" placeholder="50" value="{{ $promo->discount ?? '' }}">
                                    @error('discount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @isset($promo)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Icon</label>
                                        <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                            id="input-file-now" name="icon" data-errors-position="outside"
                                            data-min-width="800" data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif"
                                            data-default-file="{{ url('storage/promo/icon/' . $promo->icon) ?? '' }}" />
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endisset
                                @empty($promo)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Icon</label>
                                        <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                            id="input-file-now" name="icon" data-errors-position="outside"
                                            data-min-width="800" data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif" />
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endempty
                                @isset($promo)
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image <small
                                                class="text-warning">*(Landscape)</small></label>
                                        <input type="file" class="dropify @error('desc') is-invalid @enderror"
                                            id="input-file-now" name="image" data-errors-position="outside"
                                            data-min-width="800" data-max-file-size="4M"
                                            data-allowed-file-extensions="jpeg png jpg svg gif"
                                            data-default-file="{{ url('storage/promo/' . $promo->image) ?? '' }}" />
                                        @error('desc')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endisset
                                @empty($promo)
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
