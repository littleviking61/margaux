var mapLoaded = false;

function initMap(){
	mapLoaded = true;
}

(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away
		// 
		$(document).on( 'click', '.switch a[href="#switch"]', function(e){
			e.preventDefault();
			$('.switch a[href="#search"]').removeClass('active');
			$('div.search-bar').removeClass('active');
			$(this).toggleClass('active');
			$('.header, body').toggleClass('active');
		});

		$(document).on( 'click', '.switch a[href="#search"]', function(e){
			e.preventDefault();
			$('.switch a[href="#switch"]').removeClass('active');
			$('.header, body').removeClass('active');

			$(this).toggleClass('active');
			$('div.search-bar input').focus();
			$('div.search-bar').toggleClass('active');
		});

		$(document).on( 'click', '.prdctfltr-shop .prdctfltr_filter_title', function(e){
			$(this).toggleClass('active');
			$('.prdctfltr_wc', '.prdctfltr-shop').toggleClass('active');
		});
		// 
		// 
		$('.thumbnail.gallery', '.single-post').slick({
				autoplay: true,
			 	autoplaySpeed: 3000,
			 	prevArrow: '<button class="prev"><span><i class="maricon-arrow"></i></span></button>',
			  nextArrow: '<button class="next"><span><i class="maricon-arrow"></i></span></i></button>',
		});

		$('.slides','.slideshow').slick({
			 arrows: false,
			 dots: true,
			 autoplay: true,
			 autoplaySpeed: 3000,
			 slidesToShow: 1,
		   slidesToScroll: 1,
			 responsive: [
		    {
		      breakpoint: 950,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    }
		   ]
		});

		var gallery = $('.woocommerce-product-gallery');
		if (gallery.length > 0) {

			// ajoute la class pour le slider
			$('figure', gallery).addClass('slider-for')
			// if more than one picture add nav picture
			if($('figure > div', gallery).length > 1){
		
				$('figure', gallery)
					.clone()
					.appendTo(gallery)
					.addClass('slider-nav')
					.removeClass('slider-for');
			}

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
		   slidesToShow: 4,
		   slidesToScroll: 4,
			 responsive: [
		    {
		      breakpoint: 950,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		      }
		    },
		    {
		      breakpoint: 675,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		   ]
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