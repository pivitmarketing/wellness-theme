<?php get_header('blog'); ?>

  <div class="main-content blogroll">

    <?php include( TEMPLATEPATH . '/parts/newsletter.php'); ?>

    <div class="container internal-content">
      <div class="blog-page">

        <div class="row hide-on-large-only">
          <div class="col s12 text-right nopadding">
            <a href="#" data-activates="blog-categories" class="button-collapse-right internal-dropdown-icon"><i class="material-icons">&#xE8D2;</i></a>
          </div>
        </div>

        <?php include( TEMPLATEPATH . '/parts/mobile-sidebar.php'); ?>

        <div class="row">
          <div class="col s12 l8">
            <?php get_template_part('loop'); ?>
            <?php get_template_part('pagination'); ?>
          </div>
          <div class="col s3 offset-s1 hide-on-med-and-down">
            <?php include( TEMPLATEPATH . '/sidebar.php'); ?>
          </div>
        </div>

      </div>
    </div>
  </div>

<?php get_footer(); ?>

