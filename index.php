<?php 
  //response generation function
$response = "";

  //function to generate response
function my_contact_form_generate_response($type, $message){

  global $response;

  if($type == "success") $response = "<div class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}
  //response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
$name = $_POST['contact-name'];
$email = $_POST['contact-email'];
$message = $_POST['contact-message'];
$human = $_POST['contact-info'];
?>
<script type="text/javascript">
  // console.log('<?=$name?>');
  // console.log('<?=$email?>');
  // console.log('<?=$message?>');
</script>
<?php
  //php mailer variables
  // $to = get_option('admin_email');
$to = 'contact@dlerman.com';
$subject = "Dlerman mail from " . $email;
$headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

if($_POST['submitted']){
    if(!empty($human)) my_contact_form_generate_response("error", $not_human); //not human!
    else {
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          //send email
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent);
        }
      }
    }
  }
  // else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

  ?>
  <?php get_header(); ?>
  <?php //get_template_part('header2'); ?>
  <img class="parralax-image" src="//blog.addthiscdn.com/wp-content/uploads/2015/08/code-cleanup.png">
  <main class="main">
    <div class="wrapper">
      <div class="page-contents">
        <!-- SECTION 1 -->
        <div class="home-screen screen flex">
          <div class="home-screen--overlay"></div>
          <div class="intro">
            <!-- <h2>Front end developer</h2>
            <div class="trailing-letter"></div> -->
          </div>
        </div>
        <!-- SECTION 2 -->
        <div class="name-screen screen white flex" white-screen>
          <div class="name-definition">
            <h2 class="name-definition--name">Daniel Lerman</h2>
            <h4 class="name-definition--phonetic">[ dan - yuh l ] [ luhr - men ]</h4>
            <h4 class="name-definition--part-speech bold">noun</h4>
            <ul class="name-definition--definition-list">
              <li class="definition-list--item">A bachelor of Computer Science<span class="desktop-only">, working at <a href="//bvaccel.com" title="BVACCEL, the largest Shopify agency in the world." target="_blank">BVACCEL</a></span>.</li>
              <li class="definition-list--item">Master of front-end, student of back-end.</li>
              <li class="definition-list--item">Based in San Diego, California.</li>
              <li class="definition-list--item mobile-only">Developer for <a href="//bvaccel.com" title="BVACCEL, the largest Shopify agency in the world." target="_blank">BVACCEL</a>.</li>
              <li class="definition-list--item">Avid snowboarder.</li>
            </ul>
          </div>
        </div>
        <!-- SECTION 3 -->
        <div class="works-screen">
          <!-- <div class="scroll-helper flex" data-scroll-to="work-tiles"><i class="fa fa-chevron-down"></i></div> -->
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
                <img class="work-tile-logo" src="<?php echo $client_logo; ?>" alt="<? echo get_the_title(); ?>" />
                <div class="work-tile-overlay flex">
                  <div class="overlay--content">
                    <p class="work-type"><?=the_field('client-project-type')?></p>
                    <p class="work-title"><?echo get_the_title(); ?></p>
                    <a class="work-link btn" href="<?=the_field('client-website-url')?>" target="_blank">View Site</a>
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
      <!-- SECTION 4 -->
      <div class="contact screen white flex" id="contact" white-screen>
        <div class="contact-form-container" scroll="contact">
          <h2 class="contact-form-title">Talk to me.</h2>
          <h4 class="contact-form-notes">If you want to hire me, ask a question or say hello</h4>
          <form class="contacts-form" action="/#contact" method="POST">
            <?php echo $response; ?>
            <input type="hidden" name="submitted" value="1">
            <input class="info" type="text" name="contact-info" value="">
            <div class="input-container text--container flex">
              <label class="input-label" for="contact-name"><h4 class="label-text">name<span class="asterisk mint">*</span></h4></label>
              <input class="input-field input--text" type="text" name="contact-name" required>
            </div>
            <div class="input-container email--container flex">
              <label class="input-label" for="contact-email"><h4 class="label-text">email<span class="asterisk mint">*</span></h4></label>
              <input class="input-field input--email" type="email" name="contact-email" required>
            </div>
            <div class="input-container textarea--container flex">
              <label class="input-label" for="contct-message"><h4 class="label-text">message<span class="asterisk mint">*</span></h4></label>
              <textarea class="input-field input--textarea" type="email" name="contact-message" required></textarea>
            </div>
            <div class="input-container submit--container flex">
              <button class="input-field input--submit" type="submit" value="send"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
