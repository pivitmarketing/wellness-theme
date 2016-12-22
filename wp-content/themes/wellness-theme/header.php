<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>
<script>
	conditionizr.config({
	    assets: '<?php echo get_template_directory_uri(); ?>',
	    tests: {}
	});
</script>

</head>
<body <?php body_class(); ?>>

<header>
  <div class="top-info clearfix hide-on-med-and-down">
    <div class="container">
      <div class="row nomargin">
        <div class="col s12 right">
          <?php echo do_shortcode('[top_info]'); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile header / navigation -->
  <div class="mobile-header text-center hide-on-large-only">
    <nav class="clearfix nav-wrapper">
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <a href="<?php echo site_url(); ?>" class="brand-logo mobile"><img src="<?php the_field('site_mobile_logo', 'options'); ?>" width="35"></a>
      <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">search</i></a>
    </nav>
  </div>

  <div id="slide-out" class="side-nav fixed hide-on-large-only">
    <div class="row mobile-search">
      <div class="col s12 nomargin nopadding">
        <form class="search" method="get" action="" role="search">
          <input class="search-input" type="search" name="s" placeholder="Search">
        </form>
      </div>
    </div>
    <?php wp_nav_menu('Menu=Main Nav'); ?>
  </div>

  <!-- Desktop header / navigation -->

  <?php 
    $height = (get_field('splash_content')) ? 'active-content' : 'hide-on-med-and-down';
    if (get_field('background_image')): 
  ?>
    <div class="desktop-header <?php echo $height; ?>" style="background-image: url('<?php echo get_field('background_image'); ?>');">
  <?php else: ?>
    <div class="desktop-header <?php echo $height; ?>">
  <?php endif; ?>

    <div class="container main-nav hide-on-med-and-down">
      <div class="row">
        <div class="col s4"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('site_header_logo', 'options'); ?>"></a></div>
        <div class="col s8">
          <?php wp_nav_menu('Menu=Main Nav'); ?>
        </div>
      </div>
    </div>

    <?php if (get_field('splash_content')): ?>
    <div class="splash-area table-container">
      <div class="vertical-align text-center splash-content">
        <div class="row">
          <div class="col s12">
            <?php the_field('splash_content'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</header>