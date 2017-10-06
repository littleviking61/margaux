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

		$('.products', 'section.nouveautes').slick({
		  infinite: true,
		   slidesToShow: 4,
		   slidesToScroll: 4,
		   prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
		   nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
		});
	});

} ( this, jQuery ));