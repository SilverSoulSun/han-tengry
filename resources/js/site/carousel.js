$(document).ready(function(){

    $(".owl-carousel").owlCarousel({
        loop: !0,
        items: 4,
        nav: !0,
        responsive: {
            1100: {
                items: 4
            },
            992: {
                items: 2
            },
            767: {
                items: 2,
                nav: !0,
                autoplayTimeout: 2e3
            },
            320: {
                items: 1
            }
        },
        navText: ""
    })

});