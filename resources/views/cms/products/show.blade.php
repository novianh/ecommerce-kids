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
    
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url()->previous() }}" class="btn btn-light " data-dismiss="modal"><i class="fas fa-angle-left"></i> Back</a>
                                <a href="{{ route('gallery.index', $product) }}" class=" btn btn-primary  ml-2"><i
                                        class="fas fa-plus"></i> Add image</a>
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-success ml-2"><i
                                        class="fas fa-edit" data-toggle="modal" data-target="#edit"></i> Edit</a>
                                <a href="{{ route('product.destroy', $product) }}" class="ml-2 btn btn-danger"
                                    onclick="notificationBeforeDelete(event, this)"><i class=" fas fa-trash"></i>
                                    Delete</a>
                                <div class="row justify-content-start mt-3 ">
                                    <div class="col-6 col-lg-3 col-xl-2 text-right text-xl-left text-muted">
                                        <ul class="list-unstyled gap-3 mb-0">
                                            <li>Product Name:</li>
                                            <li>Product SKU:</li>
                                            <li>Product Price:</li>
                                            <li>Product Quantity:</li>
                                            <li>Product Category:</li>
                                            <li>Product Status:</li>
                                            <li>Product Description:</li>

                                        </ul>
                                    </div>
                                    <div class="col-6 col-lg-9 col-xl-10">
                                        <ul class="list-unstyled mb-0">
                                            <li>{{ $product->name }}</li>
                                            <li>{{ $product->sku }}</li>
                                            <li>{{ $product->price }}</li>
                                            <li>{{ $product->quantity }}</li>


                                            <li><span class="badge bg-gradient-info">{{ $product->category->name }}</span></li>

                                            <li>{!! $product->status_label !!}</li>
                                            <li>{{ $product->desc }}</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled">
                                            <li>
                                                Product Image:
                                            </li>
                                        </ul>
                                    </div>
                                    @if ($product->gallery)
                                        @foreach ($product->gallery as $item)
                                            <div class="col-xl-1 col-md-3 col-4"> <img class="img-thumbnail" width="100%"
                                                    src="{{ url('storage/products/' . $item->image) }}" alt="">
                                                <p class="pt-2">{{ $item->image }}</p>
                                                <a href="{{ route('gallery.edit', $item) }}" class=" text-success"><i
                                                        class="fa fa-edit" data-toggle="modal" data-target="#edit"></i></a>
                                                <a href="{{ route('delete', $item->id) }}" class=" text-danger"
                                                    onclick="notificationBeforeDelete(event, this)"><i
                                                        class=" fa fa-trash"></i></a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
