<?php
/*
Template Name: Archivos con Contenido
 */
?>

<?php get_header();?>

  <?php if (have_posts()): while (have_posts()): the_post();?>
    <div class="container-fluid article-title">
      <div class="container">
        <h1><?php the_title();?></h1>
        <br />
      </div>
    </div>
    <div class="container">
    	<br />
    	<?php the_content();?>
    </div>
  <?php endwhile;endif;?>
<?php get_footer();?>
