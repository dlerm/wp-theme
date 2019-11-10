(function (HomePage, $) {
  
  var $contactForm = $('.contact-form');
  var $scrollTriggers = $('[scroll-trigger]');

  var bindUIActions = function () {
    
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
