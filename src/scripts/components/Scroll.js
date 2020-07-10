const bind = () => {
  document.querySelectorAll('[data-scroll]').forEach((scrollElement) => {
    scrollElement.addEventListener('click', (event) => {
      event.preventDefault();
      const { scroll } = scrollElement.dataset;
      const target =
        document.getElementById(scroll) ||
        document.querySelector(`[data-scroll-position="${scroll}"]`);
      // const header = document.getElementById('header');
      // const scrollOffset =
      //   target.offsetTop - header.getBoundingClientRect().height;
      window.scrollTo({
        top: target.offsetTop,
        behavior: 'smooth',
      });
    });
  });
};

export default {
  bind,
};
