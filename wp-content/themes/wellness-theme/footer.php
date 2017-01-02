<footer>
    <?php if (!is_home() && !is_category() && !is_archive()): ?>

      <?php include( TEMPLATEPATH . '/parts/newsletter.php'); ?>

      <div class="latest-blogs">
        <div class="container">
          <div class="row">
            <div class="col s12 l7">
              <h1>Find out what's new with us!</h1>
            </div>
            <div class="col s12 l5">
              <div class="search-wrapper z-depth-1">
                <form>
                  <input type="text" name="s" placeholder="Search News">
                  <button><i class="material-icons">&#xE8B6;</i></button>
                </form>
              </div>
            </div>
          </div>

          <div class="row blog-posts">
            <?php echo do_shortcode('[latest_blog_posts]'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="footer-container">
      <div class="container">
        <div class="row clearfix">
          <div class="col s12 m5 l4 box">
            <img src="<?php the_field('site_footer_logo', 'options') ?>" class="footer-logo">
            <?php if (get_field('global_phone_number', 'options')): ?>
              <p><strong>Office:</strong> <?php the_field('global_phone_number', 'options'); ?></p>
            <?php endif; ?>
            <?php if (get_field('global_address', 'options')): ?>
            <p>
              <strong>Address:</strong><br>
              <?php the_field('global_address', 'options'); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="col s12 m7 l5 box">
            <?php if(!dynamic_sidebar('widget-area-2')) ?>
          </div>
          <div class="col s12 l3 box">
            <?php 
              echo do_shortcode('[contact-form-7 id="49"]'); 
              echo do_shortcode('[social_icons]');
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <p><?php echo get_bloginfo('name'); ?> | Copyright &copy; <?php echo date('Y'); ?> | All Rights Reserved</p>
    </div>
  </footer>

	<?php wp_footer(); ?>

</body>
</html>
