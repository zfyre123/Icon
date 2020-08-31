jQuery(document).ready(function($) {

// //filter toggle
// $('#filter-toggle').on('click', function(e){
//   e.preventDefault(); 
//   $('#products-all').toggleClass('collapsed');
// });

// //sticky filter toggle
// if( $('body').hasClass('post-type-archive-product') || $('body').hasClass('tax-product_cat')){
// var productStart = $('#products-all').offset().top -75;

// var filterPacementTop = $('#toggle-placeholder').offset().top - productStart;
// var filterPacementLeft = $('#toggle-placeholder').offset().left;
// console.log(filterPacementTop);


// $(window).on('scroll', function(){
  
//     if ($(window).scrollTop() >= productStart) {
//         $('#filter-toggle').addClass('sticky');
//         $('#filter-toggle').css({
//           'top': filterPacementTop, 
//         });
//     } else {
//         $('#filter-toggle').removeClass('sticky');
//         $('#filter-toggle').css({
//           'top': '0px',
//         });
//     }
// });

// }

//PAGE UP - FOOTER
$(window).on("scroll", function() {
  var scrollHeight = $(document).height();
  var scrollPosition = $(window).height() + $(window).scrollTop();
  if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
      // when scroll to bottom of the page
      $('#page-up').addClass('show');
  } else {
      $('#page-up').removeClass('show');    
  }
});
//GO TO TOP
$('#page-up').click(function(){
  $('html, body').animate({scrollTop:0}, 700);
    return false;
}); 


//ANIMATIONS
wow = new WOW(
    {
        boxClass:     'wow',
        animateClass: 'animated',
        offset:       0, 
        mobile:       false, 
        live:         true
    }
)
wow.init();


///////////sticky nav main

// var stickyTop = $('.sticky-grab').offset().top + 10;

// $(window).on( 'scroll', function(){
//     if ($(window).scrollTop() >= stickyTop) {
//         $('.sticky-grab').addClass('sticky');
//     } else {
//         $('.sticky-grab').removeClass('sticky');
//     }
// });





//FAQ
  $('body').on('click', '#accordion-faq .card .btn-link', function() {
    $(this).parent().parent('.card').toggleClass("open-card");
  });


//SLICK
  $('.home-slider').slick({
    dots: true,
    swipeToSlide: true,
    //appendDots: '.appendDots',
    fade: false,
    arrows: false,
    infinite: true,
    autoplay: true,
    draggable: true,
    speed: 900,
    swipeToSlide: true,
    autoplaySpeed: 4000
  })




//PRODUCTS SLIDER
$('.products-slider').slick({
  dots: true,
  speed: 900,
  slidesToShow: 4,
  arrows: true,
  slidesToScroll: 4,
  //centerMode: true,
  //centerPadding: '15px',
  infinite: false,
  rows: 0,
  variableWidth: false,
  responsive: [
    // {
    //   breakpoint: 1199,
    //   settings: {
    //     dots: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 3
    //   }
    // },
    {
      breakpoint: 991,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 768,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 420,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
})


//STEPS SLIDER
$('.steps-slider').slick({
  dots: false,
  arrows: false,
  speed: 900,
  slidesToShow: 3,
  autoplay: false,
 // slidesToScroll: 3,
  //centerMode: true,
  //centerPadding: '15px',
  infinite: false,
  variableWidth: false,
  rows: 0,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
})


$('.shop-cat-slider').slick({
  dots: false,
  speed: 900,
  slidesToShow: 8,
 // slidesToScroll: 3,
  //centerMode: true,
  //centerPadding: '15px',
  rows: 0,
  infinite: false,
  variableWidth: false,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 991,
      settings: {
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 768,
      settings: {
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 575,
      settings: {
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
})


$('.promo-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  autoplaySpeed: 3000,
  rows: 0,
  arrows: true,
  autoplay: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  centerMode: true,
  variableWidth: false
})


$('.testimonial-slider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  rows: 0,
  arrows: true,
  autoplay: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  variableWidth: false
})




$(window).load(function(){
  if ($(window).width() >= 991){  
    $('.products-slider').slick('resize');
  } 
});
$(window).resize(function(){
  if ($(window).width() >= 991){  
    $('.products-slider').slick('resize');
  } 
}); 




$('.nav-right .fa-search').click(function(){
    $('#search-bar').toggleClass('open');
});

//HAMBURGER
$('#mobile-btn').click(function(){
    $('#off-canvas-nav').addClass('open');
});
$('#mobile-trigger-close').click(function(){
    $('#off-canvas-nav').removeClass('open');
});




//MOVES INBODY LINKS
$('.move-link, .move-link a').click(function(){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    });
    return false;
}); 




//POP UP
// function createCookie(name,value,days) {
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime()+(days*24*60*60*1000));
//         var expires = "; expires="+date.toGMTString();
//     }
//     else var expires = "";
//     document.cookie = name+"="+value+expires+"; path=/";
// }

// function readCookie(name) {
//     var nameEQ = name + "=";
//     var ca = document.cookie.split(';');
//     for(var i=0;i < ca.length;i++) {
//         var c = ca[i];
//         while (c.charAt(0)==' ') c = c.substring(1,c.length);
//         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
//     }
//     return null;
// }

// function eraseCookie(name) {
//     createCookie(name,"",-1);
// }

//CREATE COOKIE
// jQuery(document).ready(function() {
//     var visited = readCookie('visited');
//     if (!visited || visited !== "true" && $('#verify').hasClass("verified")) {
//       setTimeout(function(){
//         $('#pop-up').addClass('show');
// 		    $('#fyre').addClass('fixed');
//       }, 500);
//     }
// });
// 
// 
// jQuery(document).ready(function() {
//     var verified = readCookie('age_verification_plus_cookie'),
// 		newsletter = readCookie('visited');
//     // if the user has been verified
//     if (verified) {
// 		// if verified and newsletter cookie expired
// 		if(!newsletter){
// 			setTimeout(function(){
// 					$('#pop-up').addClass('show');
// 					$('#fyre').addClass('fixed');
// 			}, 2000);
// 		}
//     } else {
// 		// if the user is not verified wait for the button click to fire popup
// 		$('#verify-submit').on('click', function(){
// 			setTimeout(function(){
// 				$('#pop-up').addClass('show');
// 				$('#fyre').addClass('fixed');
// 			}, 2000);
// 		});
//     }
// });

// $("#close-pop-up").on('click', function() {
//   createCookie('visited', "true", 5);
//     $('#pop-up').removeClass('show');
// 	  $('#fyre').removeClass('fixed');
// });





}); 
