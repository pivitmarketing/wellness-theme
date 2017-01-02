<?php get_header(); ?>

	<div class="main-content">
		<div class="container internal-content">
      <div class="row">
        <div class="col s12">
        	<?php if (have_posts()): while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
        </div>
      </div>
    </div>
	</div>

<?php get_footer(); ?>
