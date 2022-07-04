@extends('frontend.layouts.shopping.master')


@section('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/co.css') }}">
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
                                                    <h6 class="my-0">{{ $data['item_name']}}</h6>
                                                    <small class="text-muted"
                                                        style="color: #676767; opacity: 50%;">{{ $data['item_quantity']}}x</small>
                                                </div>
                                                <span class="text-muted">Rp. {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                                                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                            </li>
                                            @endforeach

                                            <!-- !total -->

                                            <li class="total d-flex justify-content-between">
                                                <div class="">
                                                    <h6 class="my-0">Total</h6>
                                                </div>
                                                <span class="text-muted">Rp. <span
                                                    class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span> </span>
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
                        <form class="needs-validation">
                            <hr class="my-4">

                            <!-- <h5 class="mb-3">Payment</h5> -->

                            <div class="row">
                                <div class="col-12 mb-1">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Message <small
                                                class="text-secondary">(Opsional)</small></label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class=" col-12 mb-3">
                                    <label for="state" class="form-label">Address</label>
                                    <select class="form-select rounded-5 mb-2" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                    <small><a href="#" class="link align-items-center" id="style-2"
                                            data-replace="Let's go" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span>
                                                <i class="fi fi-br-plus-small"></i>
                                                Add Address
                                            </span>
                                        </a></small>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="state" class="form-label">Payment</label>
                                    <select class="form-select rounded-5" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                </div>
                                <div class=" col-12 col-md-6 mt-3 mt-md-0">
                                    <label for="state" class="form-label">Courier Service</label>
                                    <select class="form-select rounded-5" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class=" w-100 btn rounded-5" type="submit">Continue to checkout</button>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                            <button type="button" class="btn rounded-circle close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder=""
                                            value="" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder=""
                                            value="" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="you@example.com">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="telephon" class="form-label">Telephone</label>
                                        <input type="tel" class="form-control" id="telephon"
                                            placeholder="089898******">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="1234 Main St" required>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Address 2 <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" id="address2"
                                            placeholder="Apartment or suite">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select rounded-5" id="country" required>
                                            <option value="">Choose...</option>
                                            <option>United States</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <select class="form-select rounded-5" id="state" required>
                                            <option value="">Choose...</option>
                                            <option>California</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder=""
                                            required>
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>

                                <!-- <h5 class="mb-3">Payment</h5> -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn rounded-5 px-3">Save </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
