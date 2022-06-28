@extends('adminlte::page')
@section('title', 'Details')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> Details Product</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <style>
        li:not(:last-child) {
            margin-bottom: 5px;
        }
    </style>
@endpush

@section('breadcrumb', 'Products')


@section('content')

    <a href="{{ url()->previous() }}" class="btn btn-secondary " data-dismiss="modal"><i class="fas fa-angle-left"></i> Back</a>
    <div class="row text-secondary">
        <div class="col-md-6">
            <div class="card mt-5" data-animation="false">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h4 class="mb-0">Product</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-body">
                    <div class=" row justify-content-start">
                        <div class="col-6 col-lg-5 text-start text-xl-left text-muted">
                            <ul class="list-unstyled gap-3 mb-0">
                                <li>Product Name:</li>
                                <li>Product SKU:</li>
                                <li>Product Price:</li>
                                <li>Product Quantity:</li>
                                <li>Product Category:</li>
                                <li>Product Status:</li>


                            </ul>
                        </div>
                        <div class="col-6 col-lg-7">
                            <ul class="list-unstyled mb-0">
                                <li>{{ $product->name }}</li>
                                <li>{{ $product->sku }}</li>
                                <li>{{ $product->price }}</li>
                                <li>{{ $product->quantity }}</li>


                                <li><span class="badge bg-info">{{ $product->category->name }}</span></li>

                                <li>{!! $product->status_label !!}</li>



                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer">
                    <ul class="list-unstyled">
                        <li>Product Description:</li>
                    </ul>
                    <p>{{ $product->desc }}</p>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card mt-5" data-animation="true">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-eye-dropper"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h4 class="mb-0">Entity</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-body text-start">
                    <div class="d-flex mt-n6 mx-auto justify-content-center">
                        <a href="{{ route('entity.index', $product) }}" class="text-primary " data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title=" Add entity"><i class="fas fa-plus-square text-lg"></i></a>

                    </div>
                    <div class="mt-4 row justify-content-start">
                        <div class="col-5 mb-3">
                            <ul class="list-unstyled gap-3 mb-0 text-dark fw-bold">
                                <li>Color:</li>

                            </ul>
                        </div>
                        <div class="col-4 mb-3">
                            <ul class="list-unstyled gap-3 mb-0 text-dark fw-bold">
                                <li>Size:</li>

                            </ul>
                        </div>
                        <div class="col-3 mb-3">
                            <ul class="list-unstyled gap-3 mb-0 text-dark fw-bold">
                                <li>Action:</li>

                            </ul>
                        </div>
                        @if ($product->entity)
                            @foreach ($product->entity as $item)
                                <div class="col-5 text-right text-xl-left text-muted">
                                    <ul class="list-unstyled gap-3 mb-0 ">
                                        <li><span class="text-dark"> </span>{{ $item->color }}</li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list-unstyled mb-0">
                                        <li><span class="text-dark"> </span> {{ $item->size }}</li>
                                    </ul>
                                </div>
                                <div class="col-3 d-flex">
                                    <a href="{{ route('entity.edit', $item) }}" class=" text-success border-0"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <i class="fa fa-edit text-lg"></i>
                                    </a>
                                    <a href="{{ route('entity.delete', $item) }}" onclick="notificationBeforeDelete(event, this)" class="ms-3 text-danger border-0"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <i class="fa fa-trash text-lg"></i>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr class="dark horizontal my-0">
            </div>

        </div>
        <div class="col-md-12  grid-margin stretch-card">
            <div class="card mt-5" data-animation="true">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h4 class="mb-0">Product Images</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-body text-start">
                    <div class="d-flex mt-n6 mx-auto justify-content-center">
                        <a href="{{ route('gallery.index', $product) }}" class="text-primary  ml-2"
                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title=" Add
                                image"><i class="fas fa-plus-square  text-lg"></i></a>
                    </div>
                    <div class="mt-4 row text-center ">
                        @if ($product->gallery)
                            @foreach ($product->gallery as $item)
                                <div class=" col-xl-1 col-lg-2 col-4"> <img class="img-thumbnail" width="100%"
                                        src="{{ url('storage/products/' . $item->image) }}" alt="">
                                    <p class="pt-2"><small>{{ $item->image }}</small></p>
                                    <a href="{{ route('gallery.edit', $item) }}" class=" text-success"><i
                                            class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Edit"></i></a>
                                    <a href="{{ route('delete', $item->id) }}" class="text-danger ml-3"
                                        onclick="notificationBeforeDelete(event, this)" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Delete"><i class=" fa fa-trash"></i></a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr class="dark horizontal my-0">
                </div>

            </div>
        </div>

    @endsection

    @section('js')
        <form action="" id="delete-form" method="post">
            @method('delete')
            @csrf
        </form>
        <script>
            function notificationBeforeDelete(event, el) {
                event.preventDefault();
                if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                }
            }
        </script>

    @endsection
