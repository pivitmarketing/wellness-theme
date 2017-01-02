<?php get_header('blog'); ?>

  <div class="main-content blogroll">

    <div class="container internal-content">
      <div class="row blog-page">
        <div style="height: 25px; width: 100%; display:block;"></div>
        <div class="col s12 top-level-content nopadding">
          <h1 class="subpage-title text-black text-center hide-on-large-only"><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>  
        </div>

        <div class="row">
          <div class="col s12">
            <?php get_template_part('loop'); ?>
            <?php get_template_part('pagination'); ?>
          </div>
        </div>

      </div>
    </div>
  </div>

<?php get_footer(); ?>
