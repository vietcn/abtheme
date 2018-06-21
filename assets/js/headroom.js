;(function( $ ) {
    "use strict";
    $(document).ready(function(){
        var myElement = document.querySelector("#headroom");
        var headroom  = new Headroom(myElement,{
            offset : 280
        });
        headroom.init();
    });

    if ($("body").hasClass("header-fixed")) {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 300) {
                $('.site-header').css('height',$('.main-header').height());
            } else {
                $('.site-header').css('height','auto');
            }
        });
    } else {
        $('.site-header').css('height',$('.site-header').height());
    }
})( jQuery );