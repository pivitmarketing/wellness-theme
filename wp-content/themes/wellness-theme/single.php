<?php get_header('blog'); ?>

  <div class="main-content blogroll">

    <?php include( TEMPLATEPATH . '/parts/newsletter.php'); ?>

    <div class="container internal-content">
      <div class="blog-page">

        <div class="col s12 top-level-content">&nbsp;</div>

        <div class="row">
          <div class="col s12">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>

                <?php if (!is_search()): ?>
                  <div class="meta">
                    <span class="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author(); ?></span>
                    <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                    <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
                  </div>
                <?php endif; ?>

                <?php the_content(); ?>

                <?php echo do_shortcode('[wpdevart_facebook_comment curent_url="'.get_permalink().'"]'); ?>

              </article>
            <?php endwhile; endif; ?>
          </div>
        </div>

      </div>
    </div>
  </div>

<?php get_footer(); ?>
