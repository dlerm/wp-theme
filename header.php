<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Daniel Lerman's professional web developement portfolio." />
  <title>Daniel Lerman | Developer</title>
  <!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'> -->
  <link href='//fonts.googleapis.com/css?family=Titillium+Web:300,600,400,900,300italic,400italic,700italic,600italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=<?php $date = new DateTime(); echo $date->getTimestamp(); ?>" type="text/css" media="screen,projection" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" type="text/css" media="screen,projection" />
  <link rel="icon" href="<?=get_stylesheet_directory_uri()?>/favicon.ico" type="image/x-icon" />
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <?php wp_head(); ?>
</head>

<body>
  <header id="header">
    <div class="header--nav-container">
      <nav class="header--nav flex">
        <a href="/" class="logo flex" title="Daniel Lerman">
          <span class="logo--initial logo--firstname">D</span>
          <span class="logo--initial logo--lastname">L</span>
        </a>
      </nav>
      <div class="social-links social--vertical header-social-links">
        <a class="social-link linkedin" href="https://www.linkedin.com/in/daniel-lerman-2933498b" target="_blank" title="Daniel Lerman LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        <a class="social-link github" href="https://github.com/dlerm" target="_blank" title="Daniel Lerman Github"><i class="fa fa-github" aria-hidden="true"></i></a>
        <a class="social-link contact-mail" title="Email" scroll-trigger="contact"><i class="fa fa-envelope" aria-hidden="true"></i></a>
      </div>
    </div>
  </header>