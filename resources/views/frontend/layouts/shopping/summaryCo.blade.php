@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
@endsection

@section('title', 'Summary Order')

@section('content')
    <main>
        <section id="co" class=" bg-light">
            <div class="ornaments position-relative">
                {{-- <div class="ornament position-absolute">
                    <img src="ecommerce/img/starorn.svg" alt="" width="100px">
                </div>
                <div class="ornament2 position-absolute">
                    <img src="ecommerce/img/starorn.svg" alt="" width="100px">
                </div> --}}
            </div>
            <div class="container py-5">
                <div class="row g-3 g-md-5 position-relative justify-content-center " style="z-index: 10;">
                    <div class="col-md-10 col-lg-8 order-md-last">
                        <div class="mb-3 card border-0 bg-white rounded-5">
                            <div class="card-header text-center rounded-5">
                                <h5 class="mb-0 fw-700 py-1">Your Order</h5>
                            </div>
                            <div class="card-body ">
                                <ul class="px-3 ">
                                    @if ($order)


                                        @foreach ($order->item as $data)
                                            {{-- {{ dd($product) }} --}}

                                            <li class="d-flex justify-content-between mb-3">
                                                <div class="">
                                                    <h6 class="my-0">
                                                        <?php  $product = App\Models\Product::find($data->product_id)?>
                                                        {{ $product->name ?? 'data not found' }} 
                                                        {{-- @foreach ($product as $prd)
                                                            
                                                        @endforeach --}}
                                                    </h6>

                                                    <small class="text-muted" style="color: #676767; opacity: 50%;">Rp.
                                                        {{ number_format($data->price,  2) }}</small>
                                                    <small class="text-muted" style="color: #676767; opacity: 50%;">x
                                                        {{ $data->quantity }}</small>
                                                </div>

                                                <span class="text-muted">Rp.
                                                    {{ number_format(floatval($data->quantity * $data->price), 2) }}
                                                </span>

                                            </li>

                                            {{-- @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp --}}
                                        @endforeach

                                        <li class=" total mb-3 d-flex justify-content-between">
                                            <div class="">
                                                <h6 class="my-0 mb-3">Total</h6>
                                            </div>
                                            <span class="text-muted">Rp.
                                                {{ $order->total ?? 'data not found' }}</span>
                                        </li>
                                    @else
                                        <div class="row">
                                            <div class="col-md-12 mycard py-5 text-center">
                                                <div class="mycards">
                                                    <h4>Your order is currently empty.</h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- !total -->


                                    <hr class="rounded-5 my-0">
                                    <hr class="my-1">

                                    <li class=" mt-4 d-flex justify-content-between mb-2 border-bottom-0">
                                        <div class="col-4">
                                            <h6 class="my-0 mb-3">Payment</h6>
                                        </div>
                                        <div class="col">
                                            <span
                                                class="text-muted fw-light">{{ $order->payment->name ?? 'data not found' }}
                                                {{ $order->payment->account_number ?? ' ' }}</span>
                                        </div>
                                    </li>

                                    <li class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                                        <div class="col-4">
                                            <h6 class="my-0">Messsage</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted fw-light">{{ $order->note ?? 'no message' }}</span>
                                        </div>

                                    </li>
                                    <li class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                                        <div class="col-4">
                                            <h6 class="my-0">Shipping Address</h6>
                                        </div>
                                        <div class="col">
                                            <span
                                                class="text-muted fw-light">{{ $order->address->name . ' : ' . $order->address->address ?? 'data not found' }}
                                                {{-- <br> {{ $order->address->city->name . ', ' . $order->address->province->name }} --}}
                                            </span>
                                        </div>

                                    </li>
                                    <li class="d-flex justify-content-between mb-3 pb-3">
                                        <div class="col-4">
                                            <h6 class="my-0">Shipment</h6>
                                        </div>
                                        <div class="col">
                                            <span
                                                class="text-muted text-end fw-light">{{ $order->courier->name ?? 'data not found' }}</span>
                                        </div>

                                    </li>

                                    <li class="status d-flex justify-content-between mb-3 pb-3 border-bottom-0">
                                        <div class="">
                                            <h6 class="my-0">Status</h6>
                                        </div>
                                        <div class="">
                                            <span class="text-end ">Your order was accepted</span>
                                        </div>

                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
