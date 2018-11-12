(function ($) {
    "use strict";
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(2) a').html('<i class="fa fa-shopping-basket"></i>');
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(2)').append('<span>Add to Cart</span>');
    // $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(3) a').html('<i class="fa fa-files-o"></i>'); 
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(3)').append('<span>Add to compare</span>');
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(4) a').html('<i class="fa fa-heart"></i>');
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(4)').not('.demo-3').append('<span>Add to wishlist</span>');
 
    $('.demo-2.featured-area .featured-overlay-rht ul a.add_to_cart_button,.demo-3.featured-area .featured-overlay-rht ul a.add_to_cart_button').click(function() {
        $(this).removeClass("loading"); 
    });
    $(".featured-area.demo-2 .col-md-8.splft .featured-item:nth-child(3n)").addClass("ilast");
    $(".home_blog_area.blog_page_area.demo-3 .blog-section2:nth-child(3n)").addClass("ilast");
    $(".blog_page_area .demo3blog .blog-section2:nth-child(3n)").addClass("ilast");
    $('.demo-2.featured-area .featured-overlay-rht ul li:nth-child(2) a').live( "click", function() {
      setTimeout(function(){ 
        $('.cas-pop').fadeIn();
      }, 3000);
      setTimeout(function(){ 
        $('.cas-pop').fadeOut();
      }, 5000);
    });


    $('.quantity').on('click', '.plus', function(e) {
        var input = $(this).prev('input.qty');
        var val = parseInt(input.val());
        input.val( val+1 ).change();
    });
    $('.quantity').on('click', '.minus', 
        function(e) {
        var input = $(this).next('input.qty');
        var val = parseInt(input.val());
        if (val > 0) {
            input.val( val-1 ).change();
        } 
    });  
 
    // owl carousel
      $('.owl-carousel').owlCarousel({
        stagePadding: 400,
        margin: 20,
        nav: true,
        loop: true,
        items: 1,
        responsive: {
          0: {
            stagePadding: 100,
          },
          481: {
            stagePadding: 150,
          },
          601: {
            stagePadding: 250,
          },
          1000: {
            stagePadding: 280,
          },
          1281: {
            stagePadding: 400,
          }
        }
      });
      
 
        /*=========================================================================
         ===  countdown
         ========================================================================== */
        if ( $('#cas-pro-countdown').length ) {
            var dataTime = $('#cas-pro-countdown').data('date'); // Date Format : Y/m/d
            $('#cas-pro-countdown').countdown(dataTime, function(event) {
                var $this = $(this).html(event.strftime(''
                         
                    + '<ul> '
                    + '<li><h5>%D</h5> <h6> Days </h6></li> '
                    + '<li><h5>%H</h5> <h6> Hours </h6></li> '
                    + '<li><h5>%M</h5> <h6> Minutes </h6></li> '
                    + '<li><h5>%S</h5> <h6> Seconds </h6></li>'
                    + '<li></li>'
                    + '</ul>'
                ));
            });
        }
        if ( $('#cas-pro3-countdown').length ) {
            var dataTime = $('#cas-pro3-countdown').data('date'); // Date Format : Y/m/d
            $('#cas-pro3-countdown').countdown(dataTime, function(event) {
                var $this = $(this).html(event.strftime(''
                         
                    + '<ul> '
                    + '<li>%D <span> Days </span></li> '
                    + '<li>%H <span> Hours </span></li> '
                    + '<li>%M <span> Minutes </span></li> '
                    + '<li>%S <span> Seconds </span></li>'
                    + '<li></li>'
                    + '</ul>'
                ));
            });
        }
     
// pagination
$('.pagination_area ul.page-numbers').addClass('pagination'); 
$('.widget_search .search-form .search-field').attr('placeholder','Enter Your Keyword'); 
// comments
$('.comment-respond .comment-form').wrapInner( "<ul></ul>" );
$('.comment-respond .comment-form .form-submit input.submit').addClass('cmn-btn2'); 
   
// post slider 
$('.slider-area .carousel-inner .item:first-child').addClass('active'); 
$('.slider-area .carousel .carousel-indicators li:first-child').addClass('active'); 
      
// testimonial slider 
$('#tcb-testimonial-carousel .carousel-inner .item:first-child, #testimonial-carousel .carousel-inner .item:first-child').addClass('active');  
    
// Quantity  
$(".ddd").on("click", function () {
    var $button = $(this);
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();
    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);
});
// product detais
$('.thumbnails .zoom').click(function(e){
      e.preventDefault();
      var photo_fullsize =  $(this).find('img').attr('src');
      $('.woocommerce-main-image img').attr('src', photo_fullsize);
});

    $( document ).ajaxComplete(function() { 
        $('.quantity').on('click', '.plus', function(e) {
            var input = $(this).prev('input.qty');
            var val = parseInt(input.val());
            input.val( val+1 ).change();
        });
        $('.quantity').on('click', '.minus', 
            function(e) {
            var input = $(this).next('input.qty');
            var val = parseInt(input.val());
            if (val > 0) {
                input.val( val-1 ).change();
            } 
        });  
    }); 
 

 
})(jQuery); 
