(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away
		// 
		// 
		$('.slides','.slideshow').slick({
			 arrows: false,
			 dots: true,
			 autoplay: true,
			 autoplaySpeed: 3000,
		});

		var gallery = $('.woocommerce-product-gallery');
		if (gallery.length > 0) {
			$('figure', gallery)
				.addClass('slider-for')
				.clone()
				.appendTo(gallery)
				.addClass('slider-nav')
				.removeClass('slider-for');

			$('.slider-for').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  asNavFor: '.slider-nav',
			  prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
			  nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
			});
			$('.slider-nav').slick({
			  arrows: false,
			  slidesToShow: 3,
			  slidesToScroll: 1,
			  asNavFor: '.slider-for',
			  centerMode: true,
			  focusOnSelect: true
			});
		}

		$('.products', 'section.nouveautes').slick({
		  infinite: true,
		   slidesToShow: 4,
		   slidesToScroll: 4,
		   prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
		   nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
		});
	});

} ( this, jQuery ));