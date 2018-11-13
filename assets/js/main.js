(function ($) {
    "use strict";
          
    // pagination
    $('.pagination_area ul.page-numbers').addClass('pagination'); 
    $('.widget_search .search-form .search-field').attr('placeholder','Enter Your Keyword'); 
    // comments
    $('.comment-respond .comment-form').wrapInner( "<ul></ul>" );
    $('.comment-respond .comment-form .form-submit input.submit').addClass('cmn-btn2'); 
          
})(jQuery); 
