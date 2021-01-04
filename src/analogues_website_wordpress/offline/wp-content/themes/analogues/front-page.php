<?php get_header();?>

<section>
  <div class="container">
    <div class="flex-sm-row">
      <div class="p-2">
        <p>
          Climate Analogues is used to identify areas that experience statistically similar climatic conditions, but which may be separated
          temporally and/or spatially. In essence, the approach allows you to glimpse into the future by locating areas whose
          climate today is similar to the projected future climate of a place of interest (i.e. where can we find today the
          future climate of Nairobi, Kenya?), or vice-versa.
        </p>
      </div>
    </div>
    <div class="flex-sm-row">
      <div class="p-2">
        <!-- Start svg banner -->
        <div id="gotool" class="center-box"></div>
        <script>
          var stage = new swiffy.Stage(document.getElementById('gotool'),
            swiffyobject, {});
          stage.start();
        </script>
        <!-- End svg banner -->
      </div>
    </div>
  </div>
  <div id="carousel" class="container-fluid">
    <div class="container">
      <div class="flex-sm-row">
        <div class="p-2">
          <?php include "carousel.php";?>
        </div>
      </div>
    </div>
  </div> 
  <div class="container">
    <div class="flex-sm-row toolres_title">
      <div class="p-2">
        <h4>TOOLS</h4>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="tools-icons">
    <div class="container">
      <div class="flex-sm-row d-sm-flex justify-content-sm-around">
        <div class="p-2">
          <a href="http://analogues.ciat.cgiar.org/index.html?showresults=1" target:"_blank">
            <span class="icon-online"></span>
          </a>
        </div>
        <div class="p-2">
          <a href="<?php echo site_url() . '/desktop'; ?>">
            <span class="icon-desktop" /></span>
          </a>
        </div>
        <div class="p-2">
        <a href="<?php echo site_url() . '/climate-data'; ?>">
          <span class="icon-database" / ></span>
        </a>
        </div>
        <div class="p-2">
          <a href="<?php echo site_url() . '/manuals'; ?>">
            <span class="icon-manual" /></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="flex-sm-row d-sm-flex justify-content-sm-around" id="tools-text">
      <div class="p-2">
        Online
      </div>
      <div class="p-2">
        Desktop
      </div>
      <div class="p-2">
        Climate Data
      </div>
      <div class="p-2">
        Manuals
      </div>
    </div>
    <div class="flex-sm-row toolres_title">
      <div class="p-2">
        <h4>RESOURCES</h4>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="resources-container">
    <div class="container">
      <div class="flex-sm-row d-sm-flex justify-content-sm-around" id="resources-icons">
        <div class="p-2">
          <a href="<?php echo site_url() . '/publications'; ?>">
            <span class="icon-publication"></span>
            <p>Publications</p>
          </a>
        </div>
        <div class="p-2">
          <a href="<?php echo site_url() . '/citations'; ?>">
            <span class="icon-citation"></span>
            <p>Citations</p>
          </a>
        </div>
        <div class="p-2">
          <a href="<?php echo site_url() . '/presentations'; ?>">
            <span class="icon-presentation"></span>
            <p>Presentations</p>
          </a>
        </div>
        <div class="p-2">
          <a href="<?php echo site_url() . '/videos'; ?>">
            <span class="icon-video"></span>
            <p>Videos</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="news-front" class="container">
    <h2>
      <span>
        LAST NEWS
      </span>
    </h2>
      <div class="d-flex flex-sm-row justify-content-around">
        <?php
          $args = array(
            'posts_per_page' => '4',
          );
          // The Query
          $query = new WP_Query($args);

          // The Loop
          if ($query->have_posts()) {

            $i = 1;

            while ($query->have_posts()) {
              $query->the_post();
        ?>    
              <div class="col-sm-3 lastnews-tile">
                <span class="node-type"><?php the_category( '&gt; ' ); ?></span>
                <a href="<?php echo get_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('medium');?>">
                </a>
                <a href="<?php echo get_permalink(); ?>">
                  <span class="lastnews-title">
                      <?php the_title();?>
                  </span>
                </a>
              </div>
        <?php
              $i++;

           }
            /* Restore original Post Data */
            wp_reset_postdata();
          } else {
              // no posts found
            }
        ?>
      </div>
      <div class="d-flex flex-sm-row justify-content-around">
        <?php
          $args = array(
            'offset' => '4',
            'posts_per_page' => '4',
          );
          // The Query
          $query = new WP_Query($args);

          // The Loop
          if ($query->have_posts()) {

            $i = 1;

            while ($query->have_posts()) {
              $query->the_post();
        ?>
              <div class="col-sm-3 lastnews-tile">
                <span class="node-type"><?php the_category( '&gt; ' ); ?></span>
                <a href="<?php echo get_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('medium');?>">
                </a>
                <a href="<?php echo get_permalink(); ?>">
                  <span class="lastnews-title">
                      <?php the_title();?>
                  </span>
                </a>
              </div>

        <?php
              $i++;

           }
            /* Restore original Post Data */
            wp_reset_postdata();
          } else {
              // no posts found
            }
        ?>
      </div>
      &nbsp;
      <div class="d-flex flex-sm-row justify-content-center">
        <a href="<?php echo site_url().'/news'; ?>">
          <button type="button" class="btn btn-primary">More News</button>
        </a>
      </div>
    </div>
  </div>
</section>
<?php get_footer();?>
