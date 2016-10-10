$(document).ready(function(){
// Variables
var $homeIntro = $('.home-screen');
var $homeIntroOverlay = $('.home-screen-overlay');
var $homeWorks = $('.works-screen');
var $homeIntroTitle = $('.intro h2');
var $workTiles = $('.work-tile');
var $homeName = $('.name-screen');
var $whiteScreens = $('[white-screen]');
var $headerLogo = $('#header .logo');
var $contactForm = $('.contact-form');

var updateContactInputs = function(self, e) {
	if(e.which == 9){
		var value = $(self).val();
		var isTyped = $(self).closest('.input-container').hasClass('is-typing');
		if(value.length > 0 && isTyped){
			$(self).closest('.input-container').removeClass('is-typing').addClass('is-finished');
		}
	}
	$('.input-field').each(function() {
		var value = $(this).val();
		var isTyped = $(this).closest('.input-container').hasClass('is-typing');
		var isFocused = $(this).is(':focus');
		if(value.length > 0 && !isTyped){
			$(this).closest('.input-container').addClass('is-typing');
		} else if(value.length > 0 && isTyped && !isFocused){
			$(this).closest('.input-container').removeClass('is-typing').addClass('is-finished');
		} else if(value.length > 0 && isTyped && isFocused){
			$(this).closest('.input-container').addClass('is-typing').removeClass('is-finished');	
		}
	});
	var allInputsFilled = true;
	$('.input-field').each(function() {
		if($(this).val().length <= 0){
			allInputsFilled = false;
		}
	});
	if(allInputsFilled){
		$contactForm.find('.submit--container').addClass('is-active');
	} else {
		$contactForm.find('.submit--container').removeClass('is-active');
	}
};

var headerLogoTransition = function(currentScroll) {
	var whiteScreenPositions = [];
	var headerLogoMidPoint = $headerLogo.offset().top + ($headerLogo.outerHeight() / 2);
	$whiteScreens.each(function() {
		var screenTop = $(this).offset().top;
		var screenBottom = screenTop + $(this).outerHeight();
		whiteScreenPositions.push(screenTop+'::'+screenBottom);
	});
	var headerInWhite = whiteScreenPositions.some(function(screenPositions, index) {
		var top = screenPositions.split('::')[0];
		var bottom = screenPositions.split('::')[1];
		return headerLogoMidPoint >= top && headerLogoMidPoint <= bottom;
	});
	if(headerInWhite){
		$headerLogo.addClass('above-white');
	} else {
		$headerLogo.removeClass('above-white');
	}
};

$(window).scroll(function() {
	var currentScroll = $(window).scrollTop();
	headerLogoTransition(currentScroll);
});

$('.input-field').on('keydown keyup', function(e) {
	updateContactInputs(this, e);
});
$(':not(.input-field)').on('click', function(e) {
	updateContactInputs(this, e);
});

$contactForm.on('submit', function(e) {
	e.preventDefault();
	var formSubmitRequest = $.ajax({
		url: $(this).attr('action'),
		data: $(this).serialize(),
		method: $(this).attr('method')
	});
	formSubmitRequest.fail(function(err) {
		alert('Error', err);
		console.log(err);
	});
	formSubmitRequest.done(function(data) {
		alert('Request success');
		console.log(data);
		if(data.indexOf('Thanks! Your message has been sent.') > -1){
			alert('success');
		}
	});
});
// End document ready	
});