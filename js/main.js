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

//Scroll fluid pour l'ancre
if ($('#back-to-top').length) {
	var scrollTrigger = 100,
		backToTop = function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop > scrollTrigger) {
				$('#back-to-top').addClass('show');
			} else {
				$('#back-to-top').removeClass('show');
			}
		};