/*
  jQuery codes for smooth scrolling. The following code is from
  https://css-tricks.com/snippets/jquery/smooth-scrolling/
*/
$(function () {
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 700);
                return false;
            }
        }
    });
});

/*
  Back to top scroll button. The following code is from
  http://jsfiddle.net/gilbitron/Lt2wH/
*/
if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };

    /*formulaire de contact*/
    $('.button').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('active');
    });

    $('.modal-wrapper').find('label').on('click', function () {
        $('.button').removeClass('active');
    });

    $('.input-text').focus(function () {
        $(this).parents('.input-box').addClass('focus');
    })

    $('.input-text').blur(function () {
        if ($(this).val()) {
            $(this).parents('.input-box').addClass('focus');
        } else {
            $(this).parents('.input-box').removeClass('focus');
        }
    });
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}