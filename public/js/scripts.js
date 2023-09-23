$(document).ready(function(){

//  Nav Animate by Scroll and Scroll to top button -------------------
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $(".nav_bar").addClass("nav_bar_active");
    }
    else {
        $(".nav_bar").removeClass("nav_bar_active");
    }

    //  Scroll to top button -------------------
    if ($(this).scrollTop()) {
        $('.scroll_to_top').fadeIn();
    } else {
        $('.scroll_to_top').fadeOut();
    }
    //  Scroll to top button -------------------

});
//  Scroll to top button -------------------
$(".scroll_to_top").click(function() {
    $("html, body").animate({scrollTop: 0}, 300);
});
//  Scroll to top button -------------------
//  Nav Animate by Scroll and Scroll to top button -------------------


    $(".nav_button").click(function() {
        $(this).toggleClass('nav_button_active');
        $(".nav_list").toggleClass('nav_list_active');
     });





});

