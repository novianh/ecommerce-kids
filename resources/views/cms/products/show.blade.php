@extends('backend.app')
@section('title')
    <i class='mdi mdi-image-area'></i> Details Product
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <style>
        li:not(:last-child) {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('breadcrumb', 'Products')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start ">
                        <div class="col-6 col-lg-3 col-xl-2 text-right text-xl-left text-muted">
                            <ul class="list-unstyled gap-3 mb-0">
                                <li>Product Name:</li>
                                <li>Product SKU:</li>
                                <li>Product Price:</li>
                                <li>Product Quantity:</li>
                                <li>Product Description:</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled mb-0">
                                <li>{{ $product->name }}</li>
                                <li>{{ $product->sku }}</li>
                                <li>{{ $product->price }}</li>
                                <li>{{ $product->quantity }}</li>
                                <li>{{ $product->desc }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
