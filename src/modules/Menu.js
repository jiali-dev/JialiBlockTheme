jQuery(document).ready(function ($) {

    // grab the initial top offset of the navigation 
    var stickyNavTop = $('#jiali-primary-menu-wrapper').offset().top;
		   	
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var jialiStickyNav = function(){
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top
            
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scrollTop > stickyNavTop) { 
            $('#jiali-primary-menu-wrapper').addClass('jiali-sticky');
        } else {
            $('#jiali-primary-menu-wrapper').removeClass('jiali-sticky'); 
        }
    };

    jialiStickyNav();

    // and run it again every time you scroll
    $(window).scroll(function() {
        jialiStickyNav();
    });


    $( ".jiali-hamburger-btn" ).click(function() {
        
        $(".jiali-hamburger-btn").toggleClass("active");
        $(".jiali-primary-menu-items").toggleClass("active");
        
    });

    $(window).resize(function() {
        if( $(window).width() > 768 )
        {
            $(".jiali-hamburger-btn").removeClass("active");
            $(".jiali-primary-menu-items").removeClass("active");
        }
    })

});

