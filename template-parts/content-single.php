<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(get_post()->post_type != "company"  && get_post()->post_type != "game" ){ ?>				
		<header class="mb-4 px-10 xl:px-20 mt-5">
		<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-3xl  font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header>
	<?php } ?>

	<div class="entry-content">
		
		<?php

			if(get_post()->post_type == "company"){
				echo do_shortcode("[company_section]");
			}

			if(get_post()->post_type == "game"){
				echo do_shortcode("[game_section]");
			}

			if(get_post()->post_type != "company"  && get_post()->post_type != "game" ){
				echo "<div class='post-content px-10 xl:px-20 mb-16'>".get_field('news_with_link')."</div>";
			}
			
		?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div>

</article>
