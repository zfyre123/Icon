jQuery(document).ready(function($) {


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

//TOP BAR
// $(window).on("resize", function () {
//   //HEIGHT OF TOP BAR
//   $top_bar = $('#nav-banner').outerHeight();
//   $neg_top_bar = $top_bar - ($top_bar * 2);
//   $('#nav-banner').css('top', $neg_top_bar);
//   $('#body-contents').css('marginTop', $top_bar );
// }).resize();

$(document).ready(bannerHeight);
$(window).on('resize',bannerHeight);

function bannerHeight() {
  //HEIGHT OF TOP BAR
  $top_bar = $('#nav-banner').outerHeight();
  $neg_top_bar = $top_bar - ($top_bar * 2);
  $('#nav-banner').css('top', $neg_top_bar);
  $('#body-contents').css('marginTop', $top_bar );
}




//INTRO W/ COOKIE
// $(window).ready(function() {
//     setTimeout(function(){
//       $('#loader').hide(); 
//     }, 500);
// });

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

//CREATE COOKIE
$(window).ready(function() {
    var visited = readCookie('visited');
    //if NOT visited 
    if (!visited || visited !== "true") {
      $('#intro-vid').addClass('show');
      $('#intro-vid video').play();
      createCookie('visited', "true", 15);
    }
});

$('#intro-vid video').on('ended',function(){
   $(this).parent().removeClass('show');
   $('#loader').hide(); 
   createCookie('visited', "true", 15);
});

$(window).ready(function() {
  var visited = readCookie('visited');
  //if visited 
  if (visited) {
    setTimeout(function(){
      $('#loader').hide(); 
    }, 500);
  } else {
    setTimeout(function(){
      $('#loader').hide(); 
    }, 400);
  }
});


//sticky nav main

// var stickyTop = $('.sticky-grab').offset().top + 10;

// $(window).on( 'scroll', function(){
//     if ($(window).scrollTop() >= stickyTop) {
//         $('.sticky-grab').addClass('sticky');
//     } else {
//         $('.sticky-grab').removeClass('sticky');
//     }
// });




//STEPS SLIDER
$('.podcasts-slider').slick({
  dots: false,
  arrows: true,
  speed: 900,
  slidesToShow: 2,
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
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
})


//RESETS SLICK
// $(window).load(function(){
//   if ($(window).width() >= 991){  
//     $('.products-slider').slick('resize');
//   } 
// });
// $(window).resize(function(){
//   if ($(window).width() >= 991){  
//     $('.products-slider').slick('resize');
//   } 
// }); 




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




//MODAL
  $('#myModal-story').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var name = button.data('header'); // Extract info from data-* attributes
    var content = button.data('content');
    var link = button.data('link');
    //var gradient = button.data('gradient');
    var modal = $(this);  

    modal.find('.story-title').text(name.replace('<br>', ''));
    modal.find('.story-content').html( content.replace(/(?:\r\n|\r|\n)/g, '') );
    //modal.find('.modal-body .btn').attr("href", link);  
    modal.find('.story-link').html('<a class="btn red-btn" target="_blank" href="'+ link +'">Learn More</a>');  

  });

  $('#myModal-story').on('hidden.bs.modal', function () {
    var modal = $(this);
    modal.find('.story-title').text('');
    modal.find('.story-content').text('');
    modal.find('.story-link').html('');
    //modal.find('.modal-body .btn').attr("href", '');   
    //modal.find('.modal-content').css('background', '');
  });


  $('.modal-btn .btn').click(function(){
      $('#myModal-story').modal("hide");
  });

  // slick call for sermons
  $(document).ready(function() {
    var slickOpts = {
      slidesToShow: 3,
      //rows: 2,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            // rows: 2,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            // rows: 3,
          }
        }
      ],
      easing: 'swing',
      speed: 700,
      dots: true,
      appendDots: $(".slide-m-dots"),
      prevArrow: $(".slide-m-prev"),
      nextArrow: $(".slide-m-next"),
      customPaging: function(slick,index) {
        return '<a>' + (index + 1) + '</a>';
      }
    };
    // Init slick carousel
    $('#carousel').slick(slickOpts);
  });


}); 
