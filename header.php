<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Meta Pixel Code -->

	<?php wp_head(); ?>
</head>

<body class="min-h-screen">

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>
	<header>
		<?php get_template_part( 'template-parts/custom-menu' ); ?>
	</header>

	<div id="content" class="site-content flex-grow">

		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>

		<?php endif; ?>
		<!-- End introduction -->

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
