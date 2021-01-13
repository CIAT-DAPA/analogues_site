<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
  <ol class="carousel-indicators">
    <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators">
    </li>
    <li data-slide-to="1" data-target="#carouselExampleIndicators">
    </li>
    <li data-slide-to="2" data-target="#carouselExampleIndicators">
    </li>
    <li data-slide-to="3" data-target="#carouselExampleIndicators">
    </li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php
      $args = array(
        'orderby'        =>
        'rand',
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
          <div class="carousel-item <?php if ($i == 1) {echo 'active';}?> justify-content-around">
            <a href="<?php echo get_permalink(); ?>">
              <img alt="First slide" class="d-block img-fluid img-carousel" src="<?php the_post_thumbnail_url('large');?>">
                <div class="carousel-caption d-none d-md-block caption-carousel">
                  <h3>
                    <?php the_title();?>
                  </h3>
                </div>
              </img>
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
  <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button">
    <span aria-hidden="true" class="carousel-control-prev-icon">
    </span>
    <span class="sr-only">
      Previous
    </span>
  </a>
  <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button">
    <span aria-hidden="true" class="carousel-control-next-icon">
    </span>
    <span class="sr-only">
      Next
    </span>
  </a>
</div>