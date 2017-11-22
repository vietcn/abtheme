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

    $(document).ready(function(){
        /* Menu */
        var $menu = $('.main-navigation');
        $menu.find('ul.sub-menu > li').each(function(){
            var $submenu = $(this).find('>ul');
            if($submenu.length == 1){
                $(this).hover(function(){
                    if($submenu.offset().left + $submenu.width() > $(window).width()){
                        $submenu.addClass('back');
                    }else if($submenu.offset().left < 0){
                        $submenu.addClass('back');
                    }
                }, function(){
                    $submenu.removeClass('back');
                });
            }
        });

        /* Menu drop down */
        $('.main-navigation li.menu-item-has-children').append('<span class="main-menu-toggle"></span>');
        $('.menu-item-has-children > a').on('click', function(){
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });
        $('.main-menu-toggle').on('click', function(){
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });
        /* Menu mobile */
        $("#main-menu-mobile .open-menu").on('click',function(){
            $(this).toggleClass('opened');
            $('#site-navigation').toggleClass('navigation-open');
        })

        /* =================
         Carousel
         =================== */
        $(".cms-carousel").each(function() {

            // VC 4.4 adds an empty div .vc_row-full-width somehow, get rid of them
            $(this).find('> .vc_row-full-width').remove();

            $(this).owlCarousel({
                margin: parseInt($(this).attr('data-margin')),
                loop: $(this).attr('data-loop') === 'true' ? true : false,
                nav: $(this).attr('data-nav') === 'true' ? true : false,
                mouseDrag: $(this).attr('data-mousedrag') === 'true' ? true : false,
                navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
                dots: $(this).attr('data-dots') === 'true' ? true : false,
                autoplay : $(this).attr('data-autoplay') === 'false' ? false : $(this).attr('data-autoplay'),
                responsive:{
                    0:{
                        items:parseInt($(this).attr('data-xsmall-items'))
                    },
                    768:{
                        items:parseInt($(this).attr('data-small-items'))
                    },
                    992:{
                        items:parseInt($(this).attr('data-medium-items'))
                    },
                    1200:{
                        items:parseInt($(this).attr('data-large-items'))
                    }
                }
            });
        });

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

    /* ====================
     Scroll To Top
     ====================== */
    /* Check to see if the window is top if not then display button */
    $(window).scroll(function(){
        if ($(this).scrollTop() > 1000) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
    /* Click event to scroll to top */
    $('.scroll-top').click(function(){
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
