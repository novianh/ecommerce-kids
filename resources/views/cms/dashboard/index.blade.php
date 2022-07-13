@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class="fas fa-columns"></i> Dashboard</h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row mt-5">

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Incoming Order</p>
                        <h4 class="mb-0">{{ $order ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="{{ route('Morder.index') }}">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Product Display</p>
                        <h4 class="mb-0">{{ $product ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="{{ route('product.index') }}">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Customer</p>
                        <h4 class="mb-0">{{ $user ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-money"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Cash</p>
                        <h4 class="mb-0">Rp. {{ number_format($total, 2) ?? '-' }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <a href="">

                        <p class="mb-0">More Info <i class="far fa-arrow-alt-circle-right"></i></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection