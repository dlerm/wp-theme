<?php
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
  load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form' ) );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 1920; }
  register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'theme' ) ) );
}
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );
function theme_load_scripts() {
  wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
}
add_action( 'wp_footer', 'theme_footer_scripts' );
function theme_footer_scripts() {
  ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        document.documentElement.classList.add("ios");
        document.documentElement.classList.add("mobile");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        document.documentElement.classList.add("ie");
      }
      else if (navigator.userAgent.search("Chrome") >= 0) {
        document.documentElement.classList.add("chrome");
      }
      else if (navigator.userAgent.search("Firefox") >= 0) {
        document.documentElement.classList.add("firefox");
      }
      else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        document.documentElement.classList.add("safari");
      }
      else if (navigator.userAgent.search("Opera") >= 0) {
        document.documentElement.classList.add("opera");
      }
    });
  </script>
  <?php
}
add_filter( 'document_title_separator', 'theme_document_title_separator' );
function theme_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}
add_filter( 'the_title', 'theme_title' );
function theme_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}
add_filter( 'the_content_more_link', 'theme_read_more_link' );
function theme_read_more_link() {
  if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
  }
}
add_filter( 'excerpt_more', 'theme_excerpt_read_more_link' );
function theme_excerpt_read_more_link( $more ) {
  if ( ! is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
  }
}
add_filter( 'intermediate_image_sizes_advanced', 'theme_image_insert_override' );
function theme_image_insert_override( $sizes ) {
  unset( $sizes['medium_large'] );
  return $sizes;
}
add_action( 'widgets_init', 'theme_widgets_init' );
function theme_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'theme' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'wp_head', 'theme_pingback_header' );
function theme_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'comment_form_before', 'theme_enqueue_comment_reply_script' );
function theme_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
function theme_custom_pings( $comment ) {
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}
add_filter( 'get_comments_number', 'theme_comment_count', 0 );
function theme_comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

function remove_jquery_migrate( $scripts ) {
  if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
    $script = $scripts->registered['jquery'];
    if ( $script->deps ) { 
      $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
    }
  }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

add_action('customize_register','register_customizer');
function register_customizer( $wp_customize ) {
  $wp_customize->add_section( 'index', array(
    'title' => __( 'Index' ),
    'description' => __( 'Edit Index Settings' ),
    'panel' => '',
    'theme_supports' => '',
  ));


  $wp_customize->add_setting( 'index_desktop_bg' );
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'index_desktop_bg', array(
      'label' => 'Desktop background Image',
      'section' => 'index',
      'settings' => 'index_desktop_bg',
      'priority' => 10,
    )
  ));

  $wp_customize->add_setting( 'index_mobile_bg' );
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize, 'index_mobile_bg', array(
      'label' => 'Mobile background Image',
      'section' => 'index',
      'settings' => 'index_mobile_bg',
      'priority' => 11,
    )
  ));  
}

function get_image ( $src, $width = false, $height = false, $zoom = false ) {
  $domain = $_SERVER['HTTP_HOST'];
  if (strpos($src,  $domain) === false) return $src;
  $photon_domain = 'i0.wp.com/' . $domain;
  $custom_src = str_replace($domain, $photon_domain, $src);
  $custom_src .= '?';
  if ($width) $custom_src .= '&w=' . $width;
  if ($height) $custom_src .= '&h=' . $height;
  if ($zoom) $custom_src .= '&zoom=' . $zoom;
  return $custom_src;
}

add_filter( 'big_image_size_threshold', '__return_false' );

// add_action('wp_head', 'get_template');
function get_template_name () {
  global $template;
  return basename($template);
}

function jetpackcom_contact_confirmation() {
  $conf = __( 'Thanks for your message.', 'plugin-textdomain' );
  return $conf;
}

add_filter( 'grunion_contact_form_success_message', 'jetpackcom_contact_confirmation' );

add_action( 'wp_enqueue_scripts', 'remove_default_style_setup', PHP_INT_MAX );
function remove_default_style_setup() {
  global $wp_styles;
  $wp_styles->queue = array();
}

function add_custom_headers() {
  add_filter( 'rest_pre_serve_request', function( $value ) {
    header( 'Access-Control-Allow-Headers: Authorization, X-WP-Nonce,Content-Type, X-Requested-With');
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Access-Control-Allow-Methods: GET' );
    header( 'Access-Control-Allow-Credentials: true' );
    return $value;
  } );
}

/**
 * Register API Endpoints
 * @param namespace { String } - endpoint vendor/version
 * @param path { String } - endpoint name
 * @param method { String } - endpoint request type
 * @param post_type { String } - custom post type slug
 * @param per_page { Int } - pagination limit
 * @param num { Int } - maximum item count (-1 for all)
 */

function register_custom_post_type_endpoint( $namespace, $path, $method, $post_type, $per_page, $num ) {
  add_action( 'rest_api_init', 'add_custom_headers', 15);
  add_action( 'rest_api_init', function () use ( $namespace, $path, $method, $post_type, $per_page, $num ) {

    register_rest_route( $namespace, $path, array(
      'methods' => $method,
      'callback' => function ( $request_data ) use ($namespace, $path, $method, $post_type, $per_page, $num ) {
        $args = array(
          'post_type' => $post_type,
          'posts_per_page'=> $per_page, 
          'numberposts'=> $num
        );

        if ($request_data['id']) {
          $args['p'] = $request_data['id'];
        }

        if ($request_data['slug']) {
          $args['name'] = $request_data['slug'];
        }

        $posts = get_posts($args);
        foreach ($posts as $key => $post) {
          $custom_fields = get_fields($post->ID);
          foreach ($custom_fields as $field => $value) {
            $posts[$key]->$field = $value;
          }
        }
        return $posts;
      }
    ));
  });
};

/**
 * Enpoints - GET
 * /<post-type-path>/       - get a list of <post_types>
 * /<post-type-path>/:id    - get single <post_type> with matching id
 * /<post-type-path>/:slug  - get single <post_type> with matching slug
 */

$custom_post_types_arr = [
  'git-actions' => 'git-actions'
];

foreach ($custom_post_types_arr as $path => $post_type) {
  register_custom_post_type_endpoint('api/v1', $path, 'GET', $post_type, -1, -1 );
  register_custom_post_type_endpoint('api/v1', $path.'/(?P<id>\d+)', 'GET', $post_type, 1, 1 );
  register_custom_post_type_endpoint('api/v1', $path.'/(?P<slug>\S+)', 'GET', $post_type, 1, 1 );
}

// POST - update "count" for git-action post
function update_gitaction ( $request ) {
  $post_id = $request['id'];
  $count = get_field('count', $post_id);
  $count++;
  update_field('count', $count, $post_id);
  
  $args = array(
    'post_type' => 'git-actions',
    'posts_per_page'=> 1, 
    'numberposts'=> 1
  );

  if ($request['id']) {
    $args['p'] = $request_data['id'];
  }

  $posts = get_posts($args);
  foreach ($posts as $key => $post) {
    $custom_fields = get_fields($post->ID);
    foreach ($custom_fields as $field => $value) {
      $posts[$key]->$field = $value;
    }
  }
  return $posts[0];
}

function update_gitaction_via_slug ( $request ) {
  $args = array(
    'post_type' => 'git-actions',
    'posts_per_page'=> 1, 
    'numberposts'=> 1
  );

  if ($request['slug']) {
    $args['name'] = $request_data['slug'];
  }

  $posts = get_posts($args);
  foreach ($posts as $key => $post) {
    $custom_fields = get_fields($post->ID);
    foreach ($custom_fields as $field => $value) {
      $posts[$key]->$field = $value;
    }
  }

  $post = $posts[0];

  $post_id = $post->ID;
  $count = get_field('count', $post->ID);
  $count++;
  update_field('count', $count, $post->ID);
  
  $post->count = $count;
  return $post;
}

function register_gitactions_post_endpoint () {
  add_action( 'rest_api_init', 'add_custom_headers', 15);
  register_rest_route( 'api/v1', 'git-actions/(?P<id>\d+)', array(
    'methods' => 'POST',
    'callback' => 'update_gitaction'
  ));
  register_rest_route( 'api/v1', 'git-actions/(?P<slug>\S+)', array(
    'methods' => 'POST',
    'callback' => 'update_gitaction_via_slug'
  ));
}
add_action('rest_api_init', 'register_gitactions_post_endpoint');
