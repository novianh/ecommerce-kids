$(document).ready(function () {
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

$(document).ready(function () {
    $(".add-to-cart-btn").click(function (e) {
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
            success: function (response) {
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
        success: function (response) {
            // console.log(response)
            $(".basket-item-count").html("");
            var parsed = jQuery.parseJSON(response);
            var value = parsed; //Single Data Viewing
            $(".basket-item-count").append(
                $(
                    '<span class="badge badge-pill text-dark">' +
                        value["totalcart"] +
                        "</span>"
                )
            );
        },
    });
}
