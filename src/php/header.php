<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Daniel Lerman's professional web development portfolio." />
  <meta name="google-site-verification" content="J4D2EQlD1SSLjjWRr9A0mAJzJIuo8gHA2_Mr9cSXi4Y" />
  <title>Daniel Lerman | Developer</title>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,500,600,900" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" type="text/css" media="screen,projection" />
  <link rel="icon" href="<?=get_stylesheet_directory_uri()?>/favicon.ico" type="image/x-icon" />
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
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
        <a class="social-link linkedin" href="https://www.linkedin.com/in/daniel-lerman-2933498b" target="_blank" rel="noopener noreferrer" title="Daniel Lerman LinkedIn"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        <a class="social-link github" href="https://github.com/dlerm" target="_blank" rel="noopener noreferrer" title="Daniel Lerman Github"><i class="fa fa-github" aria-hidden="true"></i></a>
        <a class="social-link contact-mail" title="Email" data-scroll="contact"><i class="fa fa-envelope" aria-hidden="true"></i></a>
      </div>
    </div>
  </header>