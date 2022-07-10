<?php
//Template Name: Home

get_header();

  $post = get_post($post);
  $post_id = $post->ID;
  global $wp;
  $url_actual = home_url( add_query_arg( array(), $wp->request ) );
?>

  <?php echo heroHomepage($post_id); ?>
  <?php echo brands($post_id); ?>
  <?php echo grid_cards_images("events",$post_id) ?>
  <?php echo king_chamber_membership("king_chamber_membership",$post_id); ?>
  <div class="w-full h-[114px]"></div>
  <?php echo text_with_image("about_the_king_chamber",$post_id) ?>
  <?php echo grid_cards_images("in_the_news",$post_id) ?>
  <?php echo discover("discover",$post_id) ?>
  <?php echo newsletter("newsletter",$post_id) ?>


<?php get_footer(); 