;(function( $ ) {

    "use strict";

    /* ===================
     Page reload
     ===================== */
    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    });

    // grab an element
    var myElement = document.querySelector("#headroom");
    $( '#header' ).css('height',$( '#header' ).outerHeight());

    window.addEventListener('resize',function(){
        $( '#header' ).css('height','');
        $( '#header' ).css('height',$( '#header' ).outerHeight());
    });

    // construct an instance of Headroom, passing the element
    var headroom  = new Headroom(myElement,{
        offset : 280
    });
    // initialise
    headroom.init();

    /* ===================
     Search Toggle
     ===================== */
    $('#header-search .search-toggle').click(function(e){
        e.preventDefault();
        $('#header-cart .cartform').removeClass('active');
        $('#header-search .searchform').toggleClass('active').find('.search-field').focus();
    });
    $('#header-search .search-submit').click(function(e){
        if( $(this).parent().find('.search-field').val() == '' ) {
            e.preventDefault();
            $(this).parent().parent().removeClass('active');
        }

    });

    /* ===================
     Cart Toggle
     ===================== */
    $('#header-cart .cart-toggle').click(function(e){
        e.preventDefault();
        $('#header-search .searchform').removeClass('active');
        $('#header-cart .cartform').toggleClass('active');
    });

    var nav1 = new KoalaNav("site-navigation",{
        // The type of icon to use for the mobile toggle button.
        // "hamburger" or "arrow"
        btnIcon: 'arrow',
        // The position of the mobile toggle button icon.
        // "left" or "right"
        btnPosition: 'left',
        // The width (in pixels) of when the mobile menu should be displayed
        mobileWidth: 500
    });

    /* ====================
     Scroll To Top
     ====================== */
    /* Check to see if the window is top if not then display button */
    $(window).scroll(function(){
        if ($(this).scrollTop() > 1000) {
            $('.scroll_top').fadeIn();
        } else {
            $('.scroll_top').fadeOut();
        }
    });
    /* Click event to scroll to top */
    $('.scroll_top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    $(document).ready(function() {
        $('#nav-expander').on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('nav-expanded');
        });
        $('#nav-close').on('click', function(e) {
            e.preventDefault();
            $('body').removeClass('nav-expanded');
        });
    });
    document.addEventListener("touchstart", function(){}, true);

})( jQuery );
