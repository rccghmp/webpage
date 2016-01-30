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
