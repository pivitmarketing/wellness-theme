<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_deregister_script('jquery'); // Deregister WordPress jQuery
        wp_register_script('jquery', 'http://code.jquery.com/jquery-2.2.4.min.js', array(), '2.2.4'); // CDN jQuery
        wp_enqueue_script('jquery');

        wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('materialize', get_template_directory_uri() . '/js/materialize.min.js', array(), '0.97.8'); // Modernizr
        wp_enqueue_script('materialize'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('materialize', get_template_directory_uri() . '/css/materialize.css', array(), '0.97.8', 'all');
    wp_enqueue_style('materialize'); // Enqueue it!

    wp_register_style('zomblo', get_template_directory_uri() . '/fonts/zomblo/font.css', array(), '0.97.8', 'all');
    wp_enqueue_style('zomblo'); // Enqueue it!

    wp_register_style('iconset', 'http://fonts.googleapis.com/icon?family=Material+Icons', array(), '1.0.0', 'all');
    wp_enqueue_style('iconset'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 80;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 160;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

function top_homepage_content($atts, $content = null) {
    if (get_field('top_block_content')):
      $html .= '<div class="top-block-content">';
        $html .= '<div class="container">';
          $html .= '<div class="row">';
            $html .= '<div class="col s12 text-center">';
              $html .= get_field('top_block_content');
            $html .= "</div>";
          $html .= "</div>";
        $html .= "</div>";
      $html .= "</div>";
    endif;
return $html;
}
add_shortcode('top_homepage_content','top_homepage_content');

function blockelements($atts, $content = null) {
  if (have_rows('content_block')):
    $total_block_count = count(get_field('content_block'));
    $lg_count = 12 / $total_block_count;
    $lg = $lg_count;
    $md;
    switch($lg) {
      case 12: $md = 12; break;
      case 6:  $md = 6;  break;
      case 4:  $md = 4;  break;
      case 3:  $md = 6;  break;
      default: 6;
    }
    $bg_image = (get_field('cta_background_image')) ? 'background-image:url('.get_field('cta_background_image')['url'].');' : '';
    $theme = get_field('theme_type');
    $html = '<div class="full-bg theme-'.$theme.'" style="'.$bg_image.'">';
    $html .= '<div class="container">';
    $html .= '<div class="row">';
    $count = 1;
    while (have_rows('content_block')) : the_row();
      if ($count <= 4):
        $html .= '<div class="col s12 m'.$md.' l'.$lg.'">';
          $html .= get_sub_field('text');
        $html .= '</div>';
        $count++;
      endif;
    endwhile; 
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
    endif;

  return $html;
}
add_shortcode('blockelements', 'blockelements');

function social_icons($atts, $content = null) {
  $facebook  = get_field('facebook_url', 'options');
  $twitter   = get_field('twitter_url', 'options');
  $linkedin  = get_field('linkedin_url', 'options');
  $instagram = get_field('instagram_url', 'options');

  $socials = array(
    'facebook',
    'twitter',
    'linkedin',
    'instagram'
  );

  $html = '<ul class="social-links">';
    foreach ($socials as $social):
      if (get_field($social.'_url', 'options')):
        $html .= '<li><a href="'.get_field($social.'_url', 'options').'"><img src="'.get_template_directory_uri().'/img/icon-'.$social.'.png" /></a></li>';
      endif;
    endforeach;
  $html .= '</ul>';

  return $html;
}
add_shortcode('social_icons', 'social_icons');

function top_info($atts, $content = null) {
  $phone_number  = get_field('global_phone_number', 'options');
  $email_address = get_field('global_email_address', 'options');
  $facebook      = get_field('facebook_url', 'options');
  $twitter       = get_field('twitter_url', 'options');
  $linkedin      = get_field('linkedin_url', 'options');
  $instagram     = get_field('instagram_url', 'options');

  $html = '<ul class="text-right">';

    $socials = array(
      'facebook',
      'twitter',
      'linkedin',
      'instagram'
    );

    if ($facebook || $twitter || $linkedin || $instagram):
      $html .= '<li>';
        $html .= do_shortcode('[social_icons]');
      $html .= '</li>';
    endif;

    if ($phone_number): 
      $phone_link = preg_replace("/[^0-9+x]/", "", $phone_number);
      $html .= '<li><a href="tel:+1'.$phone_link.'">'.$phone_number.'</a></li>'; 
    endif;

    if ($email_address): $html .= '<li><a href="mailto:'.$email_address.'">'.$email_address.'</a></li>'; endif;

  $html .= '</ul>';

return $html;
}
add_shortcode('top_info', 'top_info');

function extra_cta_blocks($atts, $content = null) {
  if (have_rows('extra_cta_blocks')):
    $total_block_count = count(get_field('extra_cta_blocks'));
    $lg = 12 / $total_block_count;
    $html = '<div class="tripple-blocks">';
      $html .= '<div class="row">';
        while (have_rows('extra_cta_blocks')): the_row(); 
          $extraClass = (get_sub_field('form_block') == 'yes') ? 'form' : '';
          $h2 = (get_sub_field('form_block') == 'yes') ? '<h2 class="text-center">Contact Us Today</h2>': '';
          $html .= '<div class="col s12 l'.$lg.' '.$extraClass.' nopadding nomargin">';
            $html .= '<div class="content">';
              $html .= $h2;
              $html .= get_sub_field('content');
            $html .= '</div>';
            if (get_sub_field('form_block') !== 'yes' && get_sub_field('background_image')):
              $html .= '<img src="'.get_sub_field('background_image').'" class="box-bg hide-on-med-and-down" />';
            endif;
          $html .= '</div>';
        endwhile;
      $html .= '</div>';
    $html .= '</div>';
  endif;
return $html;
}
add_shortcode('extra_cta_blocks', 'extra_cta_blocks');

function bottom_block_elements($atts, $content = null) {
  if (have_rows('bottom_content_block')):
    $total_block_count = count(get_field('bottom_content_block'));
    $lg_count = 12 / $total_block_count;
    $lg = $lg_count;
    $md;
    switch($lg) {
      case 12: $md = 12; break;
      case 6:  $md = 6;  break;
      case 4:  $md = 4;  break;
      case 3:  $md = 6;  break;
      default: 6;
    }
    $bg_image = (get_field('bottom_cta_background_image')) ? 'background-image:url('.get_field('bottom_cta_background_image').');' : '';
    $theme = get_field('bottom_theme_type');
    $html = '<div class="full-bg no-bottom-padding theme-'.$theme.'" style="'.$bg_image.'">';
    $html .= '<div class="container">';
    $html .= '<div class="row nomargin">';
    if (get_field('content_above_blocks')):
      $html .= '<div class="col s12">';
        $html .= get_field('content_above_blocks');
      $html .= '</div>';
    endif;
    $html .= '<div class="cta-blocks col s12">';
    $count = 1;
    while (have_rows('bottom_content_block')) : the_row();
      if ($count <= 4):
        $html .= '<div class="box col s12 l'.$md.'">';
          $html .= get_sub_field('text');

          if (get_sub_field('link_to_page')):
            $html .= '<p><a href="'.get_sub_field('link_to_page').'" class="button-white readmore">Read More</a></p>';
          endif;
        $html .= '</div>';
        $count++;
      endif;
    endwhile; 
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
    endif;

  return $html;
}
add_shortcode('bottom_block_elements', 'bottom_block_elements');

function site_info($atts, $content = null) {
  $atts = shortcode_atts(
  array(
    'name' => 'foo',
    'label' => 'bar'
  ), $atts);

  $content = get_field($atts['name'], 'options');

  switch($atts['label']):
    case 'Address':
      $newText = strip_tags($content);
      $text = '<a href="http://google.com/maps/place/'.urlencode($newText).'" target="_blank">'.$content.'</a>';
      //$text = '<a href="'.urlencode($content).'>'.$content.'</a>';
    break;
    case 'Phone':
      $text = '<a href="tel:+1'.preg_replace("/[^0-9+x]/", "", $content).'">'.$content.'</a>';
    break;
    case 'Email':
      $text = '<a href="mailto:'.$content.'">'.$content.'</a>';
    break;
  endswitch;

  $html = urlencode(get_field($atts['name']));

  if (get_field($atts['name'], 'options')):
    $html = '<p><strong>'.$atts['label'].'</strong><br />'.$text.'</p>';
  endif;

return $html;
}
add_shortcode('site_info', 'site_info');

function latest_blog_posts($atts, $content = null) {
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3
  );

  $loop = new WP_Query($args);

  if ($loop->have_posts()):

    $html .= '<div class="row blog-posts">';
  
    while ($loop->have_posts()) : $loop->the_post();

      $html .= '<div class="col s12 l4">';
        $html .= '<div class="card">';
          $html .= '<a href="'.get_permalink().'">';
          $html .= '<div class="card-image" style="background-image: url('.get_field('background_image').');"></div>';
          $html .= '</a>';
          $html .= '<div class="card-content">';
            $html .= '<span class="date">'.get_the_time('F j, Y').'</span>';
            $html .= '<h2>'.get_the_title().'</h2>';
            $html .= '<p>'.substr(get_the_excerpt(), 0, 167).'</p>';
            $html .= '<p><a href="'.get_permalink().'" class="more">read more</a></p>';
          $html .= '</div>';
        $html .= '</div>';
      $html .= '</div>';

    endwhile;

    $html .= '</div>';

  endif;

return $html;
}
add_shortcode('latest_blog_posts', 'latest_blog_posts');