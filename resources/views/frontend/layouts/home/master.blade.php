<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Ecommerce</title>
    <!-- input number -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('ecommerce/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('ecommerce/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('ecommerce/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('ecommerce/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('ecommerce/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('ecommerce/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('ecommerce/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('ecommerce/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('ecommerce/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('ecommerce/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('ecommerce/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('ecommerce/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('ecommerce/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('ecommerce/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ecommerce/img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- uicons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>

    <link rel="stylesheet" href="{{ asset('ecommerce/style/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ecommerce/style/main.css') }}">

    <!-- overlay -->
    <link rel="stylesheet" href="{{ asset('ecommerce/node_modules/@ciar4n/izmir/izmir.min.css') }}">

    <!-- slider-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    @yield('style')
    <link rel="stylesheet" href="{{ asset('ecommerce/style/caraousel.css') }}">
</head>

<body>
    {{-- header --}}
    @include('frontend.layouts.home.partials.header')

    @yield('content')

    @include('frontend.layouts.home.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: false,
                margin: 30,
                nav: false,
                navText: [
                    "<div class='nav-btn prev-slide'></div>",
                    "<div class='nav-btn next-slide'></div>",
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    400: {
                        items: 1,
                        stagePadding: 50,
                    },
                    500: {
                        items: 1,
                        stagePadding: 130,
                    },
                    600: {
                        items: 2,
                        stagePadding: 30,
                    },
                    700: {
                        items: 2,
                        stagePadding: 60,
                    },
                    1000: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                        stagePadding: 0,
                    },
                },
            });
        });

        $(document).ready(function() {
            $(".add-to-cart-btn").click(function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                var product_id = $(this)
                    .closest(".product_data")
                    .find(".product_id")
                    .val();
                var quantity = $(this)
                    .closest(".product_data")
                    .find(".qty-input")
                    .val();

                $.ajax({
                    url: "{{ route('add-to-cart') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        quantity: quantity,
                        product_id: product_id,
                    },
                    success: function(response) {
                        // alertify.set('notifier', 'position', 'top-right');
                        // alertify.success(response.status);
                        // console.log(response.status)
                        window.location.reload();
                    },
                });
            });
            cartload();
        });

        function cartload() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/user/load-cart-data",
                method: "GET",
                success: function(response) {
                    // console.log(response)
                    jQuery(".basket-item-count").html("");
                    var parsed = jQuery.parseJSON(response);
                    var value = parsed; //Single Data Viewing
                    jQuery(".basket-item-count").append(
                        jQuery(
                            '<span class="badge badge-pill text-dark">' +
                            value["totalcart"] +
                            "</span>"
                        )
                    );
                },
            });
        }
    </script>

    @yield('js')
</body>

</html>
