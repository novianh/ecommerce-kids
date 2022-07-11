@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">

@endsection

@section('title', 'Your Histories Order')

@section('content')
    <main>
        <section id="co" class=" ">
            <div class="bg-light mb-5">
                @if (isset($order))
                    <div class="row justify-content-md-center justify-content-lg-start">
                        @foreach ($order as $item)
                            <div class="col-lg-4 col-md-8 col-12">
                                <div class="container py-5 px-5">
                                    <div class="row position-relative justify-content-center " style="z-index: 10;">
                                        <div class="col-11 order-md-last">
                                            <div class="mb-3 card border-0 bg-white rounded-5">
                                                <div class="card-header text-center rounded-5">
                                                    <h5 class="mb-0 fw-700 py-1">Your Order
                                                        ({{ date('d/m/Y', strtotime($item->created_at)) }})
                                                    </h5>
                                                </div>
                                                <div class="card-body ">
                                                    <div class="text-center upload-ref">
                                                        @if (isset($item->transfer))
                                                            <img src="{{ asset('storage/transfer/' . $item->transfer->transfer) }}"
                                                                alt="" class="col-lg-4 col-6 mb-3">
                                                            <br>
                                                        @endif

                                                        <a href="{{ route('order.summary.edit', $item) }}"
                                                            class="btn rounded-5 px-3 mb-3">Upload
                                                            transfer reference</a>
                                                    </div>
                                                    <ul class="px-3 ">
                                                        @foreach ($item->item as $data)
                                                            <li class="d-flex justify-content-between mb-3">
                                                                <div class="">
                                                                    <h6 class="my-0">
                                                                        <?php $product = App\Models\Product::find($data->product_id); ?>
                                                                        {{ $product->name ?? 'data not found' }}

                                                                    </h6>

                                                                    <small class="text-muted"
                                                                        style="color: #676767; opacity: 50%;">Rp.
                                                                        {{ number_format($data->price, 2) }}</small>
                                                                    <small class="text-muted"
                                                                        style="color: #676767; opacity: 50%;">x
                                                                        {{ $data->quantity }}</small>
                                                                </div>

                                                                <span class="text-muted">Rp.
                                                                    {{ number_format(floatval($data->quantity * $data->price), 2) }}
                                                                </span>

                                                            </li>
                                                        @endforeach
                                                        <li class=" total mb-3 d-flex justify-content-between">
                                                            <div class="">
                                                                <h6 class="my-0 mb-3">Total</h6>
                                                            </div>
                                                            <span class="text-muted">Rp.
                                                                {{ number_format($item->total, 2) ?? 'data not found' }}</span>
                                                        </li>

                                                        <!-- !total -->


                                                        <hr class="rounded-5 my-0">
                                                        <hr class="my-1">
                                                        <li class=" mt-4 d-flex justify-content-between border-bottom-0">
                                                            <div class="col-4">
                                                                <h6 class="my-0 mb-3">Transaction Number</h6>
                                                            </div>
                                                            <div class="col">
                                                                <span class="text-muted fw-light">:
                                                                    {{ $item->transaction_number ?? ' ' }}</span>
                                                            </div>
                                                        </li>

                                                        <li
                                                            class=" mt-4 mb-3 d-flex justify-content-between border-bottom-0">
                                                            <div class="col-4">
                                                                <h6 class="my-0">Payment</h6>
                                                            </div>
                                                            <div class="col">
                                                                <span class="text-muted fw-light">:
                                                                    {{ $item->payment->name ?? 'data not found' }}
                                                                    {{ $item->payment->account_number ?? ' ' }}</span>
                                                            </div>
                                                        </li>

                                                        <li class="mb-3  d-flex justify-content-between border-bottom-0">

                                                            <div class="col-4">
                                                                <h6 class="my-0">Messsage</h6>
                                                            </div>
                                                            <div class="col">
                                                                <span class="text-muted fw-light">:
                                                                    {{ $item->note ?? '-' }}</span>
                                                            </div>

                                                        </li>
                                                        <li
                                                            class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                                                            <div class="col-4">
                                                                <h6 class="my-0">Address </h6>
                                                            </div>
                                                            <div class="col">
                                                                <span class="text-muted fw-light">:
                                                                    {{ $item->address->name . ' : ' . $item->address->address ?? 'data not found' }}

                                                                </span>
                                                            </div>

                                                        </li>
                                                        <li class="d-flex justify-content-between mb-3 pb-3">
                                                            <div class="col-4">
                                                                <h6 class="my-0">Shipment</h6>
                                                            </div>
                                                            <div class="col">
                                                                <span class="text-muted text-end fw-light">:
                                                                    {{ $item->courier->name ?? 'data not found' }}</span>
                                                            </div>

                                                        </li>

                                                        <li
                                                            class="status d-flex justify-content-between mb-3 pb-3 border-bottom-0">
                                                            <div class="">
                                                                <h6 class="my-0">Status</h6>
                                                            </div>
                                                            <div class="status">
                                                                <span
                                                                    class="text-end child-status">{!! $item->status_front ?? '-' !!}</span>
                                                            </div>

                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11 text-center">
                            @isset($order)
                                {{ $order->links() }}
                            @endisset
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your order is currently empty.</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>



@endsection
