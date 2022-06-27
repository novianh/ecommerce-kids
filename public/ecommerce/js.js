
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

