@extends('frontend.layouts.shopping.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/dropify/dist/css/dropify.min.css') }}">
    <style>
        .dropify-wrapper {
            border-radius: 2rem;
        }

        .file-icon p {
            font-family: 'Baloo Bhaijaan 2', cursive;
            font-size: 1.5rem;
        }

        span.file-icon::before {
            margin-bottom: 1rem;
        }
        ul {
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }

        .content-slider li {
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }

        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }
        .ajs-message{
            background-color: rgb(140 192 222);
            color: #FFF;
        }
        .ajs-message.ajs-visible{
            border-radius: 2rem;
            text-align: center
        }
    </style>
@endsection

@section('title', 'Edit Summary Order')

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
                            <div class="card-body">
                                <div class="text-center upload-ref">
                                    @if (isset($order->transfer))
                                        <img src="{{ asset('storage/transfer/' . $order->transfer->latest()->first()->transfer) }}"
                                            alt="" class="col-lg-3 col-6 mb-3">
                                            <br>
                                    @endif
                                    <a href="" id="btnUpload" class="btn rounded-5 px-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Upload transfer reference</a>
                                </div>

                                <ul class="px-3 ">
                                    @if ($order)


                                        @foreach ($order->item as $data)
                                            {{-- {{ dd($product) }} --}}

                                            <li class="d-flex justify-content-between mb-3">
                                                <div class="">
                                                    <h6 class="my-0">
                                                        <?php $product = App\Models\Product::find($data->product_id); ?>
                                                        {{ $product->name ?? 'data not found' }}
                                                        {{-- @foreach ($product as $prd)
                                                            
                                                        @endforeach --}}
                                                    </h6>

                                                    <small class="text-muted" style="color: #676767; opacity: 50%;">Rp.
                                                        {{ number_format($data->price, 2) }}</small>
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
                                                {{ number_format($order->total, 2) ?? 'data not found' }}</span>
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

                                    <li class=" mt-4 d-flex justify-content-between border-bottom-0">
                                        <div class="col-4">
                                            <h6 class="my-0 mb-3">Transaction Number</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted fw-light">:
                                                {{ $order->transaction_number ?? ' ' }}</span>
                                        </div>
                                    </li>
                                    <li class=" my-3 d-flex justify-content-between border-bottom-0">
                                        <div class="col-4">
                                            <h6 class="my-0 my-0">Payment</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted fw-light"> :
                                                {{ $order->payment->name ?? 'data not found' }}
                                                {{ $order->payment->account_number ?? ' ' }}</span>
                                        </div>
                                    </li>

                                    <li class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                                        <div class="col-4">
                                            <h6 class="my-0">Messsage</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted fw-light">: {{ $order->note ?? 'no message' }}</span>
                                        </div>

                                    </li>
                                    <li class="mb-3 mt-3 d-flex justify-content-between border-bottom-0">

                                        <div class="col-4">
                                            <h6 class="my-0">Shipping Address</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted fw-light">:
                                                {{ $order->address->name . ' : ' . $order->address->address ?? 'data not found' }}
                                                {{-- <br> {{ $order->address->city->name . ', ' . $order->address->province->name }} --}}
                                            </span>
                                        </div>

                                    </li>
                                    <li class="d-flex justify-content-between mb-3 pb-3">
                                        <div class="col-4">
                                            <h6 class="my-0">Shipment</h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-muted text-end fw-light">:
                                                {{ $order->courier->name ?? 'data not found' }}</span>
                                        </div>

                                    </li>

                                    <li class="status d-flex justify-content-between mb-3 pb-3 border-bottom-0">
                                        <div class="">
                                            <h6 class="my-0">Status</h6>
                                        </div>
                                        <div class="status">
                                            @isset($order->transfer)
                                                <span class="text-end child-status">
                                                    Waiting response from seller
                                                </span>
                                            @endisset
                                            @empty($order->transfer)
                                                <span class="text-end child-status">

                                                    Waiting for payment
                                                </span>
                                            @endempty
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn rounded-circle close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <div class="text-center mb-3" id="wrapper">

                            <div class="mb-3 text-center file">
                                <input type="file" id="image"
                                    class="rounded-5 dropify @error('image') is-invalid @enderror" id="input-file-now"
                                    name="transfer" data-errors-position="outside" data-max-file-size="4M"
                                    data-allowed-file-extensions="jpeg png jpg svg gif" />
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnSend" class="btn rounded-5 px-3">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('ecommerce/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });


        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var token = '{{ csrf_token() }}'
            var input = $('input[type="file"]')
            var file = $('.file')
            var wrapper = $('#wrapper')
            var modal = $('.modal')
            var form = $('.form')
            orderDetailId = '{{ $order->id }}'
            status = 1

            $('#btnUpload').click(function() {
                modal.modal('show')
                form.trigger('reset')
                modal.find('.modal-title').text('Upload transfer reference')
            })


            $('#btnSend').click(function(e) {
                e.preventDefault();
                var files = input[0].files;
                console.log(files);

                if (files.length > 0) {
                    // var fileName = e.target.files[0].name;
                    var fd = new FormData();
                    var data = input.prop('files')[0];
                    fd.append('file', files[0]);
                    fd.append('_token', token);
                    fd.append('status', status)
                    fd.append('order_detail_id', orderDetailId)

                    console.log();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('order.summary.update') }}",
                        method: 'POST',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                modal.modal('hide')

                                alertify.set('notifier', 'position', 'top-center');
                                alertify.message('uploaded succsess').delay(3);

                                window.location.reload()
                            } else if (data.error) {
                                console.log(data.error);
                            }
                        },
                    }); //end ajax

                } else {
                    alert("Please select a file.");
                }
            });
        });
    </script>
@endsection
