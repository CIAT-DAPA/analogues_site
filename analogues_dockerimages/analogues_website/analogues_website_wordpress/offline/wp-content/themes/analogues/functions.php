<?php

add_theme_support('post-thumbnails');

// the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
// the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
// the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
// the_post_thumbnail('full');            // Original image resolution (unmodified)

// the_post_thumbnail( array(1199,500) );  // Other resolutions

function register_about_menu()
{
  register_nav_menu('about-menu', __('About Menu'));
}

add_action('init', 'register_about_menu');
