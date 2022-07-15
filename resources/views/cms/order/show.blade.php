@extends('adminlte::page')
@section('title', 'Category')

@section('content_header')
    <h1><i class='mdi mdi-image-area'></i> </h1>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <style>
        .dataTables_length label {
            padding: 0 2rem;
        }

        .dataTables_wrapper .row:nth-child(3) {
            padding: 0 2rem;
        }
    </style>
@endpush

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card mt-5" data-animation="false">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="text-end pt-1">
                        <h4 class="mb-0">{{ $order->user->name }}</h4>
                        <small>{{ $order->created_at }}</small>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="col">
                            <h6>Order Detail:</h6>
                            <table class="table text-capitalize text-center mb-5">
                                <thead>
                                    <th>transaction number</th>
                                    <th>Address</th>
                                    <th>payment</th>
                                    <th>shipment</th>
                                    <th>status</th>
                                    <th>total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->transaction_number ?? '-' }}</td>
                                        <td>{{ $order->address->address ?? '-' }}</td>
                                        <td>{{ $order->payment->name ?? '-' }}</td>
                                        <td>{{ $order->courier->name ?? '-' }}</td>
                                        <td>{!! $order->status_label !!}</td>
                                        <td>{{ number_format($order->total) ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>Product Order Detail:</h6>
                            <table class="table text-capitalize  text-center table-bordered ">
                                <thead>
                                    <th class="text-start">Product Name</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                    @foreach ($order->item as $item)
                                        <tr>
                                            <?php
                                            
                                            $product = App\Models\Product::find($item->product_id);
                                            ?>

                                            <td class="text-start align-middle">
                                                <img src="{{ asset('storage/products/thumbnail/' . $product->img_thumbnail) }}"
                                                    alt="..." width="50rem" class="ms-2">
                                                <small class="ms-2">
                                                    {{ $product->name ?? '-' }}
                                                </small>
                                            </td>
                                            <td class="align-middle">Rp. {{ number_format($item->price, 2) ?? '-' }} x
                                                {{ $item->quantity ?? '-' }}</td>
                                            <td class="align-middle">Rp. {{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="text-end">Total: </td>
                                        <td class=" bg-info">Rp. {{ number_format($order->total, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr class="dark horizontal my-0">
                    <div class="card-footer">
                        <ul class="list-unstyled">
                            <li>Note:</li>
                        </ul>
                        <p>{{ $order->note }}</p>
                        <ul class="list-unstyled">
                            <li>Transfer Reference:</li>
                        </ul>
                        @isset($order->transfer)
                            <p><img src="{{ asset('storage/transfer/' . $order->transfer->transfer) }}" alt=""
                                    class="col-lg-3 col-md-4 col-12"></p>
                        @endisset
                        @empty($order->transfer)
                            -
                        @endempty
                    </div>
                </div>

            </div>
        </div>
    @endsection
