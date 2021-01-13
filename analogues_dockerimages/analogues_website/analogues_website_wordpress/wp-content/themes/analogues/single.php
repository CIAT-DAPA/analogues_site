<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();?>


					<!-- // Post Content here -->
					<div class="container-fluid article-title">
						<div class="container">
							<h1><?php the_title(); ?></h1>
							<p><?php the_date();?> / Posted by <?php the_author(); ?></p>
						</div>
					</div>
						<article class="container the-content">
							<?php the_content();?>
						</article>	
	<?php
						get_template_part( 'template-parts/post/content', get_post_format() );

						// // If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;


				endwhile; // End of the loop.
			?>


<?php get_footer();
