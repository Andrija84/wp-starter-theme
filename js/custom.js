(function($) {

	//AOS activate animation when enter viewport
	 AOS.init();

	//Nicescroll fixed
	//$("html").niceScroll();

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

    //Sticky header
		$(window).scroll(function (event) {
				var scroll = $(window).scrollTop();
				//console.log(scroll);
				if (scroll > 365 ){
					//$('header').css('background-color','rgba(245, 245, 245, 1)');
					$('header').addClass('sticky');
				}
				 if (scroll < 200){
					//$('header').css('background-color','rgba(245, 245, 245, 1)');
					$('header').removeClass('sticky');
				}

		});


    //Fancybox / Lightbox
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



	//RANDOMIZE SECTIONS
	var cards = $("SECTION_CLASS");
	for(var i = 0; i < cards.length; i++){
		var target = Math.floor(Math.random() * cards.length -1) + 1;
		var target2 = Math.floor(Math.random() * cards.length -1) +1;
		cards.eq(target).before(cards.eq(target2));
	}




})( jQuery );
