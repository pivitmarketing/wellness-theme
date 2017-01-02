<?php /* Template Name: Contact */ get_header(); ?>

	<div class="main-content">
		<div class="container internal-content">
      <div class="row">
        <div class="col s12">
					<div class="col s12 m8"><?php if (have_posts()): while (have_posts()) : the_post(); the_content(); endwhile; endif; ?></div>
					<div class="col s12 m3 offset-m1 contact-sidebar">
	          <?php if (get_field('contact_map', 'options')): the_field('contact_map', 'options'); endif; ?>
	          <h2><?php echo get_bloginfo('name'); ?></h2>
	          <?php 
	          	echo do_shortcode('[site_info name="global_address" label="Address"]');
	          	echo do_shortcode('[site_info name="global_phone_number" label="Phone"]');
	          	echo do_shortcode('[site_info name="global_email_address" label="Email"]'); 
	          ?>
	        </div>

        </div>
      </div>
    </div>
	</div>

<?php get_footer(); ?>