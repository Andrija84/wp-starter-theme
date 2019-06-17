(function($) {
	
	//AOS activate animation when enter viewport
	AOS.init();
	
	//Nicescroll fixed
	$("html").niceScroll();

    //Swiper slider init
    var swiper = new Swiper('.logo-swiper-container', {
      spaceBetween: -45,
	  slidesPerView: 4,
      slidesPerColumn: 2,
	
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
	  autoplay: {
        delay: 3000,
      },
	  
	  breakpoints: {
    // when window width is <= 320px
    320: {
      slidesPerView: 1,
      spaceBetween: 10
    },
    // when window width is <= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is <= 640px
    640: {
      slidesPerView: 3,
      spaceBetween: 30
    }
    }

    });
	
	

	//Scroll class, scroll to DIV
	$(".scroll").click(function(event){

		event.preventDefault();

		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top - 60;

		$('html, body').animate({scrollTop:target_top}, 1200);
	});
	
	
	
	//Open/Close burger mobile menu
  $('.burger, .overlay,.main-menu-list li > a').click(function(){
	  $('.burger').toggleClass('clicked');
	  $('.overlay').toggleClass('show');
	  $('nav').toggleClass('show');
	  $('.main-menu-list').toggleClass('show');
	  $('body').toggleClass('overflow');
});



	$('[data-fancybox=""]').fancybox({
		
		beforeShow: function() {
			$('').addClass('');
		},
		
		buttons: [
		//"zoom",
		//"share",
		//"slideShow",
		//"fullScreen",
		//"download",
		//"thumbs",
		"close"
		],
		arrows: true,
		
		btnTpl: {
	  

		// Arrows
		arrowLeft:
		  '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left">' +
		  '<div><img src=""></img></div>' +
		  "</button>",

		arrowRight:
		  '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right">' +
		  '<div><img src=""></img></div>' +
		  "</button>",

		
	  },
	});

	
})( jQuery );





