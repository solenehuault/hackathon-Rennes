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
    
    
//scroll ancre fluid
    $(document).ready(function() {
		$('.info').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $("#anchor").offset().top }, speed ); // Go
			return false;
		});
	});