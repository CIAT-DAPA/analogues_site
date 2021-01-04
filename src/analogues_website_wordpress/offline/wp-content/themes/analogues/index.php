<?php get_header();?>
<!-- // Opening container or wrap outside of the loop -->
<div class="container">
      <!-- <div class="d-flex flex-sm-row justify-content-around"> -->
        <?php
          // set the "paged" parameter (use 'page' if the query is on a static front page)
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

          $args = array(
            'posts_per_page' => 5,
            'paged' => $paged,
          );
          // The Query
          $query = new WP_Query($args);

          // The Loop
          if ($query->have_posts()) {

            $i = 1;

            while ($query->have_posts()) {
              $query->the_post();
        ?>
              <div class="d-flex flex-sm-row">
                <div class="news news-thumbnail">
                  <a href="<?php echo get_permalink(); ?>">
                      <img src="<?php the_post_thumbnail_url('medium');?>">
                  </a>
                </div>
                <div class="news news-text">
                  <a href="<?php echo get_permalink(); ?>">
                    <span>
                      <?php the_title();?>
                    </span>
                  </a>
                  <p>   <?php the_excerpt();?></p>
                </div>
              </div>

        <?php
              $i++;

           }
            /* Restore original Post Data */
            wp_reset_postdata();


            function pagination_bar() {
              global $query;
           
              $total_pages = $query->max_num_pages;
           
              if ($total_pages > 1){
                  $current_page = max(1, get_query_var('paged'));
           
                  echo paginate_links(array(
                      'base' => get_pagenum_link(1) . '%_%',
                      'format' => '/page/%#%',
                      'current' => $current_page,
                      'total' => $total_pages,
                  ));
              }
            } 

        ?>
              <div id="news-paged" class="d-flex flex-sm-row justify-content-center">
                <?php pagination_bar(); ?>

              </div>
        <?php
          } else {
              // no posts found
            }
        ?>
      <!-- </div> -->
</div>
<?php get_footer(); ?>
