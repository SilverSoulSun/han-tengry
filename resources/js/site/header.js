$(function() {
    $(".s-gallery-arrow").hide();
    var lastScrollTop = 0;
    $(window).scroll(function() {
        var st = $(this).scrollTop();
        //console.log($(window).width())
        if($(window).width()<568) {
            //console.log("mobile case");
            if (st > 400) {
                if (st < lastScrollTop) {
                    $(".header-fixed").addClass('header-fix');
                    //console.log("scrolling up");
                }else{
                    $(".header-fixed").removeClass('header-fix');
                    //console.log("scrolling down");
                }
                $(".s-gallery-arrow").show();
            } else {

                $(".header-fixed").removeClass('header-fix');
                $(".s-gallery-arrow").hide();
            }
            lastScrollTop = st;
        }else {
            if (st > 400) {
                $(".header-fixed").addClass('header-fix');
                $(".s-gallery-arrow").show();
            } else {
                $(".header-fixed").removeClass('header-fix');
                $(".s-gallery-arrow").hide();
            }
        }

    });

    $('.hamburger').click(function(){

	    $('.main-list').slideToggle(function(){
	      if ($(this).css('display') === 'none') {
	        $(this).removeAttr('style');
	      }
	    });
	  });

});


