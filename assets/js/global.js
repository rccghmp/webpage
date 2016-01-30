var jsDate;
var deviceHeight = $( window ).height();
deviceHeight = deviceHeight - 100;

$(document).ready(function() {
    $("#header-wrapper").css('height', deviceHeight +'px');
    $("#header-wrapper").backgroundCycle({
        imageUrls: [
            '../assets/images/banner.jpg',
            '../assets/images/banner2.jpg',
            '../assets/images/banner3.jpg',
            '../assets/images/banner4.jpg'
        ],
        fadeSpeed: 2000,
        duration: 5000,
        backgroundSize: SCALING_MODE_COVER
    });
});

/*----------------------------------------------------*/
/* Smooth Scrolling
 ------------------------------------------------------ */

$('.smoothscroll').on('click',function (e) {
    e.preventDefault();

    var target = this.hash,
            $target = $(target);

    $('html, body').stop().animate({
        'scrollTop': $target.offset().top
    }, 800, 'swing', function () {
        window.location.hash = target;
    });
});


/*----------------------------------------------------*/
/*	Back To Top Button
 /*----------------------------------------------------*/
var pxShow = 300; //height on which the button will show
var fadeInTime = 400; //how slow/fast you want the button to show
var fadeOutTime = 400; //how slow/fast you want the button to hide
var scrollSpeed = 300; //how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'

// Show or hide the sticky footer button
jQuery(window).scroll(function() {

    if (jQuery(window).scrollTop() >= pxShow) {
        jQuery("#go-top").fadeIn(fadeInTime);
    } else {
        jQuery("#go-top").fadeOut(fadeOutTime);
    }

});
