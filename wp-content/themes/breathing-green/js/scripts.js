$('footer li.menu-item-has-children').prepend('<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>').removeClass('menu-item-has-children');

/*$('.login-button a').click(function (e) {
	e.preventDefault();
	$('.login-form-container').fadeIn();
});

$('.close-button').click(function () {
	$(this).parent().parent().fadeOut();
});

$(window).scroll(function () {
	if($('#main-header').hasClass('et-fixed-header')) {
		$(".centered-inline-logo-wrap img, .logo_container img").attr("src", "../../uploads/2018/07/breathing-green-wordmark.png");
	} else {
		$(".centered-inline-logo-wrap img, .logo_container img").attr("src", "../../themes/breathing-green/img/logo/breathing-green-logo.png");
	}
});

$('.copy-container .green_cta_button').click(function (e) {
	e.preventDefault();
});*/

// ANIMATE HORIZONTAL GRAPHS
$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

// LINK PREVIOUS PAGE FOR FORM
//$(document).ready(function () {
	//$('.page-id-390 .wpcf7').children('p').wrap('<a href="http://localhost/breathing-green/register/"/>');
//});

/*$(window).on('resize scroll', function() {
    if ($('.progress-bar > span').isInViewport()) {
        $('.progress-bar > span').siblings('.hidden-graph').removeClass('hidden-graph').addClass('show');
    }
});*/
