<footer id="footer">
  <div class="footer--nav-container">
    <nav class="footer--nav flex">
      <a href="/" class="logo flex" title="Daniel Lerman">
        <span class="logo--initial logo--firstname">D</span>
        <span class="logo--initial logo--lastname">L</span>
      </a>
    </nav>
    <div class="footer-content">
    <h1>Daniel Lerman</h1>
    <h2>Front end developer</h2>
      <div class="social-links social--horizontal">
        <a class="social-link linkedin" href="https://www.linkedin.com/in/daniel-lerman-2933498b" target="_blank" title="LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        <a class="social-link github" href="https://github.com/dlerm" target="_blank" title="Github"><i class="fa fa-github" aria-hidden="true"></i></a>
        <a class="social-link contact-mail" title="Email" scroll-trigger="contact"><i class="fa fa-envelope" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86672514-1', 'auto');
  ga('send', 'pageview');
</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor.js?v=<?php echo rand(1000000000, 999999999999); ?>"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js?v=<?php echo rand(1000000000, 999999999999); ?>"></script>
<script type="text/javascript">
  (function () {
    HomePage.init();
  })();
</script>

<?php wp_footer(); ?>

</body>
</html>