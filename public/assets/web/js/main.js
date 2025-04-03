// responsive header
$('.header input:checkbox').change(function(){
    if($(".header input:checkbox").is(":checked")) {
        $('html').addClass("headitemshow");
    } else {
        $('html').removeClass("headitemshow");
    }
});

// review slider
$('.owl-review').owlCarousel({
    loop:false,
    margin:39,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1.5,
            margin:10,
            loop:true
            // autoplay:true,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
$( ".owl-review .owl-prev").html('<span><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 13L1 7L7 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>');
$( ".owl-review .owl-next").html('<span><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L1 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>');
