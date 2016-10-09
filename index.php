<?php get_header(); ?>
<main class="main">
  <div class="wrapper">
    <div class="page-contents">
      <!-- SECTION 1 -->
      <div class="home-screen screen flex">
        <div class="home-screen--overlay"></div>
        <div class="intro">
          <h2>Front end developer</h2>
          <div class="trailing-letter"></div>
        </div>
      </div>
      <!-- SECTION 2 -->
      <div class="name-screen screen bg-white black flex">
        <div class="name-definition">
          <h2 class="name-definition--name">Daniel Lerman</h2>
          <h4 class="name-definition--phonetic">[ dan - yuh l ] [ lure - man ]</h4>
          <h4 class="name-definition--part-speech bold">noun</h4>
          <ul class="name-definition--definition-list">
            <li class="definition-list--item">A bachelor of Computer Science, usually found developing webs.</li>
            <li class="definition-list--item">Master of front-end, apprentice of back-end.</li>
            <li class="definition-list--item">Based in San Diego, California.</li>
            <li class="definition-list--item">Avid snowboarder.</li>
          </ul>
        </div>
      </div>
      <!-- SECTION 3 -->
      <div class="works-screen screen">
        <!-- <div class="scroll-helper flex" data-scroll-to="work-tiles"><i class="fa fa-chevron-down"></i></div> -->
        <div class="work-tiles flex" data-scroll-frame="work-tiles">
          <?php
          $args = array(
            'post_type' => 'projects',
            // 'cat' => '2',
            'posts_per_page' => -1
            );
          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
            <div class="work-tile">
              <?php $client_logo = get_field('client-logo'); ?>
              <img class="work-tile-logo" src="<?php echo $client_logo; ?>" alt="<? echo get_the_title(); ?>" />
              <div class="work-tile-overlay flex">
                <div class="overlay--content">
                  <p class="work-type"><?=the_field('client-project-type')?></p>
                  <p class="work-title"><?echo get_the_title(); ?></p>
                  <a class="work-link btn" href="<?=get_permalink()?>">View Project</a>
                </div>
              </div>
            </div>
            <?php }
          }
          wp_reset_postdata();
          ?>
        </div>
      </div>
      <!-- SECTION 4 -->
      <div class="contact screen flex">
        <div class="contact-form-container">
          <div class="contact-form-title">Talk to me.</div>
          <div class="contact-form-notes">If you want hire me, ask me a question or just say hello</div>
          <form class="contact-form" method="POST">
            <div class="input-container">
              <label class="input-label" for="contct-name">Your Name<span class="mint">*</span></label>
              <input class="input-field input--text" type="text" name="contact-name" required>
            </div>
            <div class="input-container">
              <label class="input-label" for="contct-email">Your Email<span class="mint">*</span></label>
              <input class="input-field input--email" type="email" name="contact-email" required>
            </div>
            <div class="input-container">
              <label class="input-label" for="contct-message">Your Message<span class="mint">*</span></label>
              <textarea class="input-field input--textarea" type="email" name="contact-message" required></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
