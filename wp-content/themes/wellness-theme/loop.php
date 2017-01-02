<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( get_field('background_image')) : ?>
			<div class="thumbnail-image">
				<a href="<?php the_permalink(); ?>">
					
					<?php $categories = get_the_category();
					if ($categories):
						echo '<ul class="categories">';
						$cats = [];
						foreach ($categories as $category) {
							if ($category->slug !== 'uncategorized') {
								echo '<li>'.$category->name.'</li>';
							}
						}
						echo '</ul>';
					endif;
					?>

					<img src="<?php the_field('background_image'); ?>">
				</a>
			</div>
		<?php endif; ?>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php if (!is_search()): ?>
			<div class="meta">
				<span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span>
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			</div>
		<?php endif; ?>

		<?php html5wp_excerpt('html5wp_index'); ?>

	</article>

<?php endwhile; ?>

<?php else: ?>

	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>

<?php endif; ?>