$(document).ready(function(){
// Variables
var $homeIntro = $('.home-screen');
var $homeIntroOverlay = $('.home-screen-overlay');
var $homeWorks = $('.works-screen');
var $homeIntroTitle = $('.intro h2');
var $workTiles = $('.work-tile');
console.log($workTiles);

var opacityScoller = function(currentScroll) {
	if($homeWorks.length > 0){
		var workScreenTop = $homeWorks.offset().top - ($('#header-logo').outerHeight()/2);
		if(currentScroll >= workScreenTop){
			$('.work-tiles').addClass('on-screen');
			$('.works-screen h2').addClass('on-screen');
			/* $('#header-logo').addClass('black'); */
		} else {
			$('.work-tiles').removeClass('on-screen');
			$('.works-screen h2').removeClass('on-screen');
			/* $('#header-logo').removeClass('black'); */
		}
	}
};

var fadeIntoScreen = function (currentScroll) {
	var windowBottom = currentScroll + $(window).outerHeight();
	$workTiles.each(function() {
		var currentTop = $(this).offset().top + ($(window).outerHeight() / 3);
		if(windowBottom >= currentTop){
			$(this).addClass('fadeIn');	
		}
	});
}

var toggleScrollHelper = function (currentScroll) {
	if(currentScroll >= 50){
		$('.scroll-helper').addClass('hide');
	} else {
		$('.scroll-helper').removeClass('hide');
	}
};

$(window).scroll(function() {
	var currentScroll = $(window).scrollTop();
	opacityScoller(currentScroll);
	fadeIntoScreen(currentScroll);
	toggleScrollHelper(currentScroll);
});

$('.scroll-helper').on('click', function() {
	console.log('click');
	var scrollTo = $(this).attr('data-scroll-to');
	var selectorToScroll = '[data-scroll-frame="'+scrollTo+'"]';
	var newScrollTop = $(selectorToScroll).offset().top;
	$('html, body').animate({ scrollTop: newScrollTop }, 750);
});

// End document ready	
});