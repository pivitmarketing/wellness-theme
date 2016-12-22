<?php /* Template Name: Homepage */get_header(); ?>

<div class="main-content">
    
    <?php 

    	echo do_shortcode('[top_homepage_content]'); 
    	echo do_shortcode('[blockelements]');

    ?>

    <!-- <div class="full-bg theme-light" style="background-image:url('<?php //echo get_template_directory_uri(); ?>/img/block-bg.png');">
      <div class="container">
        <div class="row">
          <div class="col s12 l5">
            <h3>This is an h3 tag</h3>
            <h1>This is a call to action page title with an h2 tag</h1>
          </div>
          <div class="col s12 l6 offset-l1">
            <p>Morbi suscipit magna eget auctor tristique. Sed ultrices sed nisl ut rhon cus. Fusce eleifend, tortor at mollis pellentesque, ex lacus commodo mi, id vehicula urna augue ut neque. Donec congue non eros a varius. Donec quam sapien, mollis vel ultrices iaculis, finibus fermentum lacus. In effic itur at quam in consequat. Aenean dictum quam vel libero pulvinar tempus. </p>
          </div>
        </div>
      </div>
    </div> -->

    <div class="container tripple-blocks">
      <div class="row">
        <div class="col s12 l4 nopadding nomargin">
          <div class="content">
            <h2>This is a long title for a description</h2>
            <p>Short description text will be housed within this space. No truncated copy inside this text box, but the first section of an internal page.</p>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/left-box.png" class="box-bg hide-on-med-and-down">
        </div>
        <div class="col s12 l4 form nopadding nomargin">
          <div class="content">
            <h2 class="text-center">Contact Us Today</h2>
            <form>
              <p>
                <label for="name">Your name</label>
                <input type="text" placeholder="enter your first and last name">
              </p>
              <p>
                <label for="name">Your email</label>
                <input type="text" placeholder="enter your email address">
              </p>
              <p>
                <label for="name">Your number</label>
                <input type="text" placeholder="enter your phone number">
              </p>
              <p>
                <input type="submit" value="Start Today !">
              </p>
            </form>
          </div>
        </div>
        <div class="col s12 l4 nopadding nomargin">
          <div class="content">
            <h2>This is a long title for a description</h2>
            <p>Short description text will be housed within this space. No truncated copy inside this text box, but the first section of an internal page.</p>
          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/right-box.png" class="box-bg hide-on-med-and-down">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <h1>This is a call to action page title H1</h1>
          <h2>Secondary H2 Text under the main header title</h2>
          <hr>
          <p>Morbi suscipit magna eget auctor tristique. Sed ultrices sed nisl ut rhoncus. Fusce eleifend, tortor at mollis pellentesque, ex lacus commodo mi, id vehicula urna augue ut neque. Donec congue non eros a varius. Donec quam sapien, mollis vel ultrices iaculis, finibus fermentum lacus. In effic itur at quam in consequat. Aenean dictum quam vel libero pulvinar tempus. Nulla mattis egestas nisl, et fermentum eros placerat vel. Integer leo justo, mollis vel commodo vitae, fermentum sed elit. Mauris congue nunc ut elit vehicula feugiat. Donec tristique quam sed sodales gravida. Mae cenas aliquam sapien eu erat tristique, id pulvinar velit ultrices. </p>
          <p>Morbi suscipit magna eget auctor tristique. Sed ultrices sed nisl ut rhoncus. Fusce eleifend, tortor at mollis pellentesque, ex lacus commodo mi, id vehicula urna augue ut neque. Donec congue non eros a varius. Donec quam sapien, mollis vel ultrices iaculis, finibus fermentum lacus. In effic itur at quam in consequat. Aenean dictum quam vel libero pulvinar tempus. Nulla mattis egestas nisl, et fermentum eros placerat vel. Integer leo justo, mollis vel commodo vitae, fermentum sed elit. Mauris congue nunc ut elit vehicula feugiat. Donec tristique quam sed sodales gravida. Mae cenas aliquam sapien eu erat tristique, id pulvinar velit ultrices. </p>
        </div>
      </div>
    </div>

    <div class="full-bg theme-Light no-bottom-padding" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/ocean-bg.png');">
      <div class="container">
        <div class="row nomargin">
          <div class="col s12">g</h3>
            <h1>This is a call to action page title with an h2 tag</h1>
          </div>
          <div class="cta-blocks col s12">
            <div class="box s12 m4">
              <h2>This is a long call to action title for a service.</h2>
              <p>Short description of the services or goods that are being link to from this space, with truncated text for run-off...</p>
              <p><a href="" class="button-white readmore">Read More</a></p>
            </div>            <div class="box s12 m4">
              <h2>This is a long call to action title for a service.</h2>

              <p>Short description of the services or goods that are being link to from this space, with truncated text for run-off...</p>
              <p><a href="" class="button-white readmore">Read More</a></p>
            </div>
            <div class="box s12 m4">
              <h2>This is a long call to action title for a service.</h2>
              <p>Short description of the services or goods that are being link to from this space, with truncated text for run-off...</p>
              <p><a href="" class="button-white readmore">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
