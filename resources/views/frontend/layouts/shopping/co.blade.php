@extends('frontend.layouts.shopping.master')


@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
    <style>
        
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
@section('title', 'CheckOut')

@section('content')



    <main>

        <section id="co" class=" bg-light">
            <div class="ornaments position-relative">
                <!-- <div class="ornament position-absolute">
                                                                   <img src="img/starorn.svg" alt="" width="100px">
                                                                </div> -->
                <!-- <div class="ornament2 position-absolute">
                                                                   <img src="img/starorn.svg" alt="" width="100px">
                                                                </div> -->
            </div>
            <form class="needs-validation" action="{{ route('checkout.store') }}">
                @csrf
                <div class="container py-5">
                    <div class="row g-3 g-md-5 position-relative " style="z-index: 10;">
                        <div class="col-md-5 col-lg-4 order-md-last">
                            <div class="mb-3 card border-0 bg-white rounded-5">
                                <div class="card-header text-center rounded-5">
                                    <h5 class="mb-0 fw-700 py-1">Your Order</h5>
                                </div>
                                @if (isset($cart_data))
                                    @if (Cookie::get('shopping_cart'))
                                        @php $total="0" @endphp
                                        <div class="card-body ">
                                            <ul class="px-3 ">
                                                @foreach ($cart_data as $data)
                                                    <li class="d-flex justify-content-between mb-3">
                                                        <div class="">
                                                            <h6 class="my-0">{{ $data['item_name'] }}</h6>
                                                            <input type="hidden" name="product_name"
                                                                value="{{ $data['item_name'] }}">
                                                            <small class="text-muted"
                                                                style="color: #676767; opacity: 50%;">{{ $data['item_quantity'] }}x</small>
                                                            <input type="hidden" name="quantity"
                                                                value="{{ $data['item_quantity'] }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $data['item_price'] }}">
                                                        </div>
                                                        <span class="text-muted">Rp.
                                                            {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                                                        <input type="hidden" name="subtotal"
                                                            value="{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}">
                                                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                    </li>
                                                @endforeach

                                                <!-- !total -->

                                                <li class="total d-flex justify-content-between">
                                                    <div class="">
                                                        <h6 class="my-0">Total</h6>
                                                    </div>
                                                    <span class="text-muted">Rp. <span
                                                            class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                                                    </span>
                                                    <input type="hidden" name="total" value="{{ $total }}">

                                                </li>
                                                <!-- !total -->

                                            </ul>
                                        </div>
                                    @endif
                                @else
                                    <div class="row">
                                        <div class="col-md-12 mycard py-5 text-center">
                                            <div class="mycards">
                                                <h4>Your cart is currently empty.</h4>
                                                {{-- <a href="{{ url('collections') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8">
                            <h5 class="mb-3 fw-700">Billing</h5>

                            <hr class="my-4">

                            <!-- <h5 class="mb-3">Payment</h5> -->

                            <div class="row">
                                <div class="col-12 mb-1">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Message <small
                                                class="text-secondary">(Opsional)</small></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    </div>
                                </div>
                                <div class=" col-12 mb-3">
                                    <label for="state" class="form-label">Address</label>
                                    <select class="form-select rounded-5 mb-2 text-capitalize" id="address" required
                                        name="address">
                                        <option value="" id="addressOpt">Choose...</option>
                                        @if ($address)
                                            @foreach ($address as $address)
                                                <option value="{{ $address->id }}">{{ $address->name }}</option>
                                            @endforeach
                                        @else
                                            <option>Address is empty</option>
                                        @endif
                                    </select>
                                    <small><a href="javascript:void(0)" class="link align-items-center add" id="style-2"
                                            data-replace="Let's go">
                                            <span>
                                                <i class="fi fi-br-plus-small"></i>
                                                Add Address
                                            </span>
                                        </a></small>
                                </div>
                                <div class="col-md-6 col-12 text-capitalize">
                                    <label for="state" class="form-label">Payment</label>
                                    <select class="form-select rounded-5 text-capitalize" id="state" required
                                        name="payment">
                                        <option value="">Choose...</option>
                                        @foreach ($payment as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" col-12 col-md-6 mt-3 mt-md-0 ">
                                    <label for="state" class="form-label">Courier Service</label>
                                    <select class="form-select rounded-5 text-capitalize" id="state" required
                                        name="courier">
                                        <option value="">Choose...</option>

                                        @foreach ($shipment as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class=" w-100 btn rounded-5" type="submit">Continue to checkout</button>

                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="modalAddress" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                            <button type="button" class="btn rounded-circle close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form class="needs-validation form" novalidate action="{{ route('address.store') }}"
                            method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Address Name</label>
                                        <input type="text" class="form-control" id="email" placeholder="Home"
                                            name="name">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="telephon" class="form-label">Telephone</label>
                                        <input type="tel" class="form-control" id="telephon"
                                            placeholder="089898******" name="telephone">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="1234 Main St" required name="address">
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Address 2 <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" id="address2"
                                            placeholder="Apartment or suite" name="address2">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Province</label>
                                        <select class="form-select rounded-5" id="provinsi" required name="country">
                                            <option value="">Choose...</option>
                                            @foreach ($province as $id)
                                                <option value="{{ $id->code }}">{{ $id->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">City</label>
                                        <select class="form-select rounded-5" id="kota" required name="state">
                                            <option value="">Choose...</option>
                                            <option value="california">California</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder=""
                                            required name="zip">
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>



                                <!-- <h5 class="mb-3">Payment</h5> -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn rounded-5 px-3 btn-save">Save </button>
                                <button type="button" class="btn rounded-5 px-3 btn-update">Update </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var token = '{{ csrf_token() }}'
            var modal = $('.modal')
            var form = $('.form')
            var btnAdd = $('.add'),
                btnSave = $('.btn-save'),
                btnUpdate = $('.btn-update');

            btnAdd.click(function() {
                modal.modal('show')
                form.trigger('reset')
                modal.find('.modal-title').text('Add New Address')
                btnSave.show();
                btnUpdate.hide()
            })

            btnSave.click(function(e) {
                e.preventDefault();
                var data = form.serialize()
                $.ajax({
                    type: "POST",
                    url: "{{ route('address.store') }}",
                    data: data + '&_token=' + token,
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            modal.modal('hide');
                            form.trigger("reset");
                            $('#address').append('<option value="' + data.id + '" selected>' +
                                data.name + '</option>');

                            alertify.set('notifier', 'position', 'top-center');
                            alertify.message('Success').delay(3)

                        } else if (data.error) {
                            console.log(data.error);
                        }
                    },
                }); //end ajax
            })
        });
    </script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#provinsi').on('change', function() {

                axios.post('{{ route('address.storeDropdown') }}', {
                        code: $(this).val()
                    })

                    .then(function(response) {
                        $('#kota').empty();
                        $.each(response.data, function(id, name) {

                            $('#kota').append(new Option(name, id))

                        })

                    });

            });

        });
    </script>
@endsection
