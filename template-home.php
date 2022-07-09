<?php
//Template Name: Home

get_header();

  $post = get_post($post);
  $post_id = $post->ID;
  global $wp;
  $url_actual = home_url( add_query_arg( array(), $wp->request ) );

?>

<h1>Hello world</h1>


<?php get_footer(); 