<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="page-contents">
      <!-- SECTION 1 -->
      <div class="home-screen screen flex">
        <div class="home-screen--overlay"></div>
        <div class="intro">
          <h2>Front end developer</h2>
        </div>
      </div>
      <!-- SECTION 2 -->
      <div class="name-screen screen bg-white black flex">
        <div class="name-definition">
          <h2 class="name-definition--name">Daniel Lerman</h2>
          <h4 class="name-definition--phonetic">[ dan - yuh l ]</h4>
          <h4 class="name-definition--part-speech bold">noun</h4>
          <ul class="name-definition--definition-list">
            <li class="definition-list--item">A bachelor of Computer Science who writes code to continually make the internet more awesome.</li>
            <li class="definition-list--item">A proven user of multiple programming langugaes and software platforms.</li>
            <li class="definition-list--item">Based in San Diego, California</li>
          </ul>
        </div>
      </div>
      <!-- SECTION 3 -->
      <div class="works-screen screen">
        <!-- <div class="scroll-helper flex" data-scroll-to="work-tiles"><i class="fa fa-chevron-down"></i></div> -->
        <div class="work-tiles flex" data-scroll-frame="work-tiles">
          <?php
          $loop_index = 0;
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              $loop_class = '';
              if( ($loop_index % 2) == 0 ){
                $loop_class = 'right-sider';
              } else {
                $loop_class = 'left-sider';
              }
              $logo_src = get_field('client-logo');
              ?>
              <div class="work-tile flex <?=$loop_class?>">
                <a class="work-tile--image-link" href="<?php the_field('website-link'); ?>" target="_blank">
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                  <img class="image-link--image" src="<?=$image[0]?>"  />
                </a>
                <div class="work-tile--project-details flex black">
                  <?php if ($logo_src) { ?>
                  <img class="project-details--logo" src="<?=$logo_src?>" />
                  <?php } else { ?>
                  <h4 class="project-details--title"><?php echo get_the_title() ?></h4>
                  <?php } ?>
                </div>
              </div>
              <?php
              $loop_index++;
            } /* end while */
          } /* end if */
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
