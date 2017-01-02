<?php /* Template Name: Homepage */get_header(); ?>

<div class="main-content">
    
    <?php 
    	echo do_shortcode('[top_homepage_content]'); 
    	echo do_shortcode('[blockelements]');
    ?>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <?php 
            if (have_posts()): while (have_posts()) : the_post();
              the_content();
            endwhile; endif;
          ?>
        </div>
      </div>
    </div>

    <?php echo do_shortcode('[bottom_block_elements]'); ?>
    
  </div>

<?php get_footer(); ?>
