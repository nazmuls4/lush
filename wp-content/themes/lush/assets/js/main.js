(function($) {
    "use strict";

    jQuery(document).ready(function($) {
        // data - background
        $("[data-background]").each(function() {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
        })

        

        // Nice Select 
        $('select').niceSelect();

         // sticky
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 2) {
                $("#header_area").removeClass("sticky");
            } else {
                $("#header_area").addClass("sticky");
            }
        });

        // active menu class
        $(".navbar-toggler").click(function() {
            $(".header_area").toggleClass("active");
        });

        $('.nav').onePageNav();


    });


    jQuery(window).load(function() {

       

    });


}(jQuery));