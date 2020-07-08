const $contactForm = $('.contact-form');
const $scrollTriggers = $('[scroll-trigger]');

const bind = () => {
  $contactForm.on('submit', (event) => {
    event.preventDefault();
    const $form = $(event.currentTarget);
    const formSubmitRequest = $.ajax({
      url: $form.attr('action'),
      data: $form.serialize(),
      method: $form.attr('method'),
    });

    formSubmitRequest.fail((err) => {
      alert('Error', err);
      console.log(err);
    });

    formSubmitRequest.done((data) => {
      $form.prepend(
        '<p class="mint contact-form-success">Thanks for submitting your message!</p>',
      );
      $form.trigger('reset');
    });
  });

  $scrollTriggers.on('click', (event) => {
    const scrollToAttr = $(event.currentTarget).attr('scroll-trigger');
    const $scrollTo = $('[scroll="' + scrollToAttr + '"]');
    $('html, body').animate({ scrollTop: $scrollTo.offset().top }, 500);
  });
};

export default {
  bind,
};
