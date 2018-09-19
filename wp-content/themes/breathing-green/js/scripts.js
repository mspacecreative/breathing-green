$('footer li.menu-item-has-children').prepend('<span class="sub-toggle"><i class="fa fa-angle-down"></i></span>').removeClass('menu-item-has-children');

// ANIMATE HORIZONTAL GRAPHS
$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$('.absolute-position .video-toggle, .absolute-position-mobile .video-toggle').click(function() {
    $('body').addClass('show-video');
       if ($('body').hasClass('show-video')) {
          $('.yt-video').fadeIn();
       }
    });
	
	$('.close-button').click(function() {
		$('.yt-video').fadeOut();
		$('body').removeClass('show-video');
		
		var video = $("#promo-video").attr("src");
		$("#promo-video").attr("src","");
		$("#promo-video").attr("src",video);
	});
	
	var player;
	function onYouTubePlayerAPIReady() {player = new YT.Player('player');}
		$('.close-button').click(function() {
		player.stopVideo();
	});

jQuery(function($){
		$('#filter').submit(function(){
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('button').text('Processing...'); // changing the button label
					$('#response').css('opacity', '.25');
					$('.product-loading').addClass('visible');
				},
				success:function(data){
					filter.find('button').text('Apply filter'); // changing the button label back
					$('#response').html(data).css('opacity', '1'); // insert data
					$('.product-loading').removeClass('visible');
				}
			});
			return false;
		});
	});

$('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
});

function pageContainerPadding() {
	$('#page-container').css('padding-top', $('header').outerHeight());
}

$(document).ready(function() {
	pageContainerPadding();
});

$(window).resize(function() {
	pageContainerPadding();
});