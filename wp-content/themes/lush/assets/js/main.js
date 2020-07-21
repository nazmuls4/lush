(function($) {
    "use strict";

    jQuery(document).ready(function($) {
        // data - background
        $("[data-background]").each(function() {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
        })

        

        // Nice Select 
        $('select').niceSelect();




    });


    jQuery(window).load(function() {

       

    });


}(jQuery));