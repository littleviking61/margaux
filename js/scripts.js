var mapLoaded = false;

function initMap(){
	mapLoaded = true;
}

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

		$('.gallery ul', 'main').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
			nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
		})

		$('.products', 'section.nouveautes').slick({
		  infinite: true,
		   slidesToShow: 4,
		   slidesToScroll: 4,
		   prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
		   nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
		});

		// google map
		var geocoder;
		var map;
	 	var bcde = 'abcd';

		function initMap() {
			var lat = 48.10692299999999;
			var lng = -1.6781899999999723;
			var zoom = parseFloat($('#map').data('zoom'));
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(lat, lng);
			var mapOptions = {
				zoom: zoom,
				center: latlng
			}
			map = new google.maps.Map(document.getElementById('map'), mapOptions);

			geocoder.geocode( { 'placeId': 'ChIJ0X1_PMvfDkgR3c5plSo6L_E'}, function(results, status) {
			  if (status == 'OK') {
			    map.setCenter(results[0].geometry.location);
			    var marker = new google.maps.Marker({
			        map: map,
			        position: results[0].geometry.location,
			    });
			  }
			});

		}

		function checkInit() {
			if(mapLoaded) {
				if($('#map').length > 0 ) initMap();
			}else{
				if(bcde !== 'abcd') clearTimeout(bcde);
				bcde = setTimeout(checkInit, 500);
			}
		}

		checkInit();
	});

} ( this, jQuery ));