(function (HomePage, $) {

  var $homeIntro = $('.home-screen');
  var $homeIntroOverlay = $('.home-screen-overlay');
  var $homeWorks = $('.works-screen');
  var $homeIntroTitle = $('.intro h2');
  var $workTiles = $('.work-tile');
  var $homeName = $('.name-screen');
  var $whiteScreens = $('[white-screen]');
  var $headerLogo = $('#header .logo');
  var $contactForm = $('.contact-form');
  var $scrollTriggers = $('[scroll-trigger]');

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

  var bindUIActions = function () {
    $('.input-field').on('keydown keyup', function(e) {
      updateContactInputs(this, e);
    });
    
    $(':not(.input-field)').on('click', function(e) {
      updateContactInputs(this, e);
    });

    $contactForm.on('submit', function(e) {
      e.preventDefault();
      var $form = $(this);
      var formSubmitRequest = $.ajax({
        url: $form.attr('action'),
        data: $form.serialize(),
        method: $form.attr('method')
      });

      formSubmitRequest.fail(function(err) {
        alert('Error', err);
        console.log(err);
      });
      
      formSubmitRequest.done(function(data) {
        $form.prepend('<p class="mint contact-form-success">Thanks for submitting your message!</p>');
        $form.trigger('reset');
      });
    });

    $scrollTriggers.on('click', function() {
      var scrollToAttr = $(this).attr('scroll-trigger');
      var $scrollTo = $('[scroll="'+scrollToAttr+'"]');
      $('html, body').animate({ scrollTop: $scrollTo.offset().top }, 500);
    });
  };

  HomePage.init = function (product) {
    bindUIActions();
  };

})(window.HomePage = window.HomePage || {}, jQuery);
