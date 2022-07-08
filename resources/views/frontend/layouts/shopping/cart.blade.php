@extends('frontend.layouts.shopping.master')

@section('title', 'Cart')

@section('style')

@endsection

@section('content')

    <main>

        <section id="cart" class=" bg-light mb-5">
            <div class="ornaments position-relative">
                <div class="ornament position-absolute">
                    <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
                <div class="ornament2 position-absolute">
                    <img src="{{ asset('ecommerce/img/starorn.svg') }}" alt="" width="100px">
                </div>
            </div>
            <div class="container py-5">
                @if (isset($cart_data))
                    @if (Cookie::get('shopping_cart'))
                        @php $total="0" @endphp
                        <div class="bg-white p-5 rounded-5 position-relative" style="z-index: 10;">
                            <div class="col-md-12 text-right mb-3">
                                <a href="javascript:void(0)" class="clear_cart font-weight-bold link">Clear Cart</a>
                            </div>
                            <ul class="responsive-table text-md-center mb-0 p-0" id="product" role="list"
                                aria-live="assertive">
                                <li class="table-header table">
                                    <div class="col col-1-row">Product</div>
                                    <div class="col col-2-row">Price</div>
                                    <div class="col col-3-row">Quantity</div>
                                    <div class="col col-4-row">Subtotal</div>
                                    <div class="col col-4-row">Remove</div>
                                </li>


                                @foreach ($cart_data as $data)
                                    <li class="table-row align-items-center mb-0 cartpage">
                                        <div class="col col-1-row" data-label="Product">
                                            <div class="row justify-content-md-center gap-md-2 gap-0 align-items-center">
                                                <div class="col-md-3">
                                                    <img src="{{ url('storage/products/thumbnail/' . $data['item_image']) ?? 'https://via.placeholder.com/250x250/5fa9f8/ffffff' }}"
                                                        alt=""
                                                        class="img-fluid d-none d-md-block rounded-4 my-3 shadow-sm ">
                                                </div>
                                                <div class="col-md-6 mt-sm-2 text-start text-lg-center">
                                                    {{ $data['item_name'] ?? 'Product Name' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-2-row" data-label="Price">Rp.
                                            {{ number_format($data['item_price']) }}</div>
                                        <div class="col col-3-row" data-label="Quantity">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-10 col-xl-8">
                                                    {{-- <input type="number"
                                                    class=" form-control rounded-5 text-center mx-auto mt-md-0"
                                                    value="{{ $data['item_quantity'] }}" min="1" max="5" style="width: 100% ;"> --}}
                                                    <input type="hidden" class="product_id"
                                                        value="{{ $data['item_id'] }}">
                                                    <div class="input-group quantity">
                                                        <div class="input-group-prepend decrement-btn changeQuantity rounded-0"
                                                            style="cursor: pointer ">
                                                            <span class="input-group-text"
                                                                style="border: 3px solid rgb(244 191 191)">-</span>
                                                        </div>
                                                        <input type="text" class="qty-input form-control rounded"
                                                            maxlength="2" value="{{ $data['item_quantity'] }}">
                                                        <div class="input-group-append increment-btn changeQuantity"
                                                            style="cursor: pointer">
                                                            <span class="input-group-text"
                                                                style="border: 3px solid rgb(244 191 191)">+</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-4-row" data-label="Subtotal">
                                            {{ number_format($data['item_quantity'] * $data['item_price']) }}</div>
                                        <div class="col col-4-row">
                                            <a class="text-decoration-none text-center delete_cart_data"
                                                style="cursor: pointer;" href="#">
                                                <i class="fi fi-sr-trash"></i>
                                            </a>
                                        </div>
                                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                    </li>
                                @endforeach

                                <li class=" align-items-center mb-0 mt-4">
                                    <div class="col col-1-row d-none d-md-block"></div>
                                    <div class="col col-2-row d-none d-md-block"></div>
                                    <div class="col col-3-row  d-none d-md-block">
                                        Total
                                    </div>
                                    <div class="col col-4-row" data-label="Total">Rp. <span
                                            class="cart-grand-price-viewajax">{{ number_format($total) }}</span></div>
                                    <div class="col col-4-row">
                                        @if (Auth::user())
                                            <a href="{{ route ('checkout') }}" class="btn px-3 btn-sm rounded-5 text-white">Checkout</a>
                                        @else
                                        <a href="{{ route ('login') }}" class="btn px-3 btn-sm rounded-5 text-white">Checkout</a>
                                            {{-- you add a pop modal for making a login --}}
                                        @endif

                                        {{-- <a href="co.html" class="btn px-3 btn-sm rounded-5 text-white">Checkout</a> --}}
                                    </div>
                                </li>
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


        </section>
    </main>
@endsection

@section('js')
    <!-- JavaScript -->

    <script>
        $(document).ready(function() {

            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

        });

        // Update Cart Data
        $(document).ready(function() {

            $('.changeQuantity').click(function(e) {
                e.preventDefault();

                var quantity = $(this).closest(".cartpage").find('.qty-input').val();
                var product_id = $(this).closest(".cartpage").find('.product_id').val();
                console.log(product_id)

                var data = {
                    "_token": "{{ csrf_token() }}",
                    'quantity': quantity,
                    'product_id': product_id,
                };

                $.ajax({
                    url: "{{ route('update-to-cart') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response)
                        window.location.reload();
                    }
                });
            });

        });

        // Delete Cart Data
        $(document).ready(function() {

            $('.delete_cart_data').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest(".cartpage").find('.product_id').val();

                var data = {
                    "_token": "{{ csrf_token() }}",
                    "product_id": product_id,
                };

                $.ajax({
                    url: "{{ route('delete-from-cart') }}",
                    type: 'DELETE',
                    data: data,
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

        });

        // Clear Cart Data
        $(document).ready(function() {

            $('.clear_cart').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('clear-cart') }}",
                    type: 'GET',
                    success: function(response) {
                        window.location.reload();
                        // console.log(response)
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);

                    }
                });

            });

        });
    </script>
@endsection
