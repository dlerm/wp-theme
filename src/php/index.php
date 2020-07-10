<?php get_header(); ?>
<img class="parralax-image" src="https://wallpapertag.com/wallpaper/full/1/a/f/124013-amazing-geometric-backgrounds-2560x1600-for-iphone-6.jpg" alt="Parallax Background - Code Screen - Daniel Lerman">
<main class="main">
  <div class="wrapper">
    <div class="page-contents">
      <div class="name-screen screen white flex" white-screen>
        <div class="name-definition">
          <h1 class="h2 name-definition--name">Daniel Lerman</h1>
          <p class="h4 name-definition--phonetic"><span class="is-primary">[dan-yuh l] [luhr-man]</span><span class="is-secondary">[ dee ] [ money ]</span></p>
          <p class="h4 name-definition--part-speech bold">noun</p>
          <ul class="name-definition--definition-list">
            <li class="definition-list--item"><h2>Development Lead<span class="desktop-only">, working at <a href="https://bvacommerce.com"  target="_blank" rel="noopener noreferrer">BVA</a></span></h2></li>
            <li class="definition-list--item mobile-only">Developer for <a href="https://bvacommerce.com" target="_blank" rel="noopener noreferrer">BVA</a></li>
            <li class="definition-list--item">Bachelor of Computer Science</li>
            <li class="definition-list--item">Based in San Diego, California</li>
            <li class="definition-list--item">Avid snowboarder</li>
          </ul>
        </div>
      </div>
      <div class="works-screen">
        <div class="work-tiles flex" data-scroll-frame="work-tiles">
          <?php
          $loop_index = 0;
          $args = array(
            'post_type' => 'projects',
            'posts_per_page' => -1
          );
          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
              <div class="work-tile" data-index="<?=$loop_index?>">
                <?php $client_logo = get_field('client-logo'); ?>
                <?php $image = get_field('client-logo'); ?>
                <picture class="work-tile-logo">
                  <source media="(min-width: 1901px)" srcset="<?php echo get_image($image) . ', '. get_image($image, false, false, 2) ?> 2x" />
                  <source media="(min-width: 1601px)" srcset="<?php echo get_image($image, 475) . ', '. get_image($image, 475, false, 2) ?> 2x" />
                  <source media="(min-width: 1441px)" srcset="<?php echo get_image($image, 420) . ', '. get_image($image, 420, false, 2) ?> 2x" />
                  <source media="(min-width: 1280px)" srcset="<?php echo get_image($image, 360) . ', '. get_image($image, 360, false, 2) ?> 2x" />
                  <source media="(min-width: 992px)" srcset="<?php echo get_image($image, 427) . ', '. get_image($image, 427, false, 2) ?> 2x" />
                  <source media="(min-width: 769px)" srcset="<?php echo get_image($image, 350) . ', '. get_image($image, 350, false, 2) ?> 2x" />
                  <source media="(min-width: 481px)" srcset="<?php echo get_image($image, 385) . ', '. get_image($image, 385, false, 2) ?> 2x" />
                  <source media="(min-width: 421px)" srcset="<?php echo get_image($image, 240) . ', '. get_image($image, 240, false, 2) ?> 2x" />
                  <source media="(min-width: 376px)" srcset="<?php echo get_image($image, 210) . ', '. get_image($image, 210, false, 2) ?> 2x" />
                  <source media="(min-width: 321px)" srcset="<?php echo get_image($image, 188) . ', '. get_image($image, 188, false, 2) ?> 2x" />
                  <source media="" srcset="<?php echo get_image($image, 160) . ', '. get_image($image, 160, false, 2) ?> 2x" />
                  <img class="work-tile-logo" src="<?php echo get_image($image, 360); ?>" srcset="<?php echo get_image($image, 360, false, 2); ?> 2x" alt="<? echo get_the_title(); ?>" />
                </picture>
                <div class="work-tile-overlay flex">
                  <div class="overlay--content">
                    <p class="work-type"><?=the_field('client-project-type')?></p>
                    <p class="work-title"><?echo get_the_title(); ?></p>
                    <a class="work-link btn" href="<?=the_field('client-website-url')?>" target="_blank" rel="noopener noreferrer" title="<?echo get_the_title(); ?>" rel="noopener noreferrer">View Site</a>
                  </div>
                </div>
              </div>
              <?php
              $loop_index++; 
            }
          }
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="contact screen white flex" id="contact" white-screen>
        <div class="contact-form-container">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
