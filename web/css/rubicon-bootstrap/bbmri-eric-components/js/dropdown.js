
jQuery(function($) {


    if($(window).width()>1024) {
        $('.dropdown').not('.dropdown .dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(10).fadeIn(200);
               //$(this).find('a').css({"border-bottom": "12px solid #30373a", "border-top": "2px solid #30373a", "padding-top": "10px", "padding-bottom": "10px"});
            $(".dropdown-menu").hover(function(e) {
                //$(this).parent().find('a').css({"border-bottom": "12px solid #30373a", "border-top": "2px solid #30373a", "padding-top": "10px", "padding-bottom": "10px"});
                $(this).parent().find('a').addClass("hovered");
            }, function() {
                //$(this).parent().find('a').css({"border-bottom": "0", "border-top": "0", "padding-top": "10px", "padding-bottom": "10px"});
                $(this).parent().find('a').removeClass("hovered");
            });
        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).delay(10).fadeOut(200);
            
        });

        $('.dropdown > a').click(function() {
            location.href = this.href;
        });

    } else {
        //$('.dropdown').find('.dropdown-menu').show();
         //e.stopPropagation();
         //e.preventDefault();
        $('.dropdown').on('show.bs.dropdown', function () {
            $(this).siblings('.open').removeClass('open').find('a.dropdown-toggle').attr('data-toggle', 'dropdown');
            $(this).find('a.dropdown-toggle').removeAttr('data-toggle');
        });
    }
});