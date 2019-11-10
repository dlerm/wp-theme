<?php get_header(); ?>
<img class="parralax-image" src="https://wallpapertag.com/wallpaper/full/1/a/f/124013-amazing-geometric-backgrounds-2560x1600-for-iphone-6.jpg" alt="Parallax Background - Code Screen - Daniel Lerman">
<main class="main">
  <div class="wrapper">
    <div class="page-contents">
      <div class="name-screen screen white flex" white-screen>
        <div class="name-definition">
          <h2 class="name-definition--name">Daniel Lerman</h2>
          <h4 class="name-definition--phonetic"><span class="is-primary">[dan-yuh l] [luhr-man]</span><span class="is-secondary">[ dee ] [ money ]</span></h4>
          <h4 class="name-definition--part-speech bold">noun</h4>
          <ul class="name-definition--definition-list">
            <li class="definition-list--item">Front-End Development Lead<span class="desktop-only">, working at <a href="https://bvaccel.com" title="BVACCEL, the largest Shopify agency in the world." target="_blank" rel="noopener noreferrer">BVACCEL</a></span></li>
            <li class="definition-list--item mobile-only">Developer for <a href="https://bvaccel.com" title="BVACCEL, the largest Shopify agency in the world." target="_blank" rel="noopener noreferrer">BVACCEL</a></li>
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
                <img class="work-tile-logo" src="<?php echo $client_logo; ?>" alt="<? echo get_the_title(); ?>" alt="<?echo get_the_title(); ?>" />
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
        <div class="contact-form-container" scroll="contact">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
