<?php

// Slugify a string
function slugify($text)
{
	// Strip html tags
	$text = strip_tags($text);
	// Replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	// Transliterate
	setlocale(LC_ALL, 'en_US.utf8');
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	// Remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);
	// Trim
	$text = trim($text, '-');
	// Remove duplicate -
	$text = preg_replace('~-+~', '-', $text);
	// Lowercase
	$text = strtolower($text);
	// Check if it is empty
	if (empty($text)) {
		return 'n-a';
	}
	// Return result
	return $text;
}

function debug($script){
	echo "<pre>";
	var_dump($script);
	echo "</pre>";
}

if( function_exists("acf_add_options_page")){
	acf_add_options_page([
		"page_title" => "Website Settings",
		"menu_title" => "Website Settings",
		"menu_slug" => "website-settings"
	]);
}
	
add_theme_support( 'post-thumbnails' );

/**
 * Theme setup.
 */
function tailpress_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');

/**
 * Enqueue theme assets.
 */

function fix_post_id_on_preview($null, $post_id) {
	if (is_preview()) {
			return get_the_ID();
	}
	else {
			$acf_post_id = isset($post_id->ID) ? $post_id->ID : $post_id;

			if (!empty($acf_post_id)) {
					return $acf_post_id;
			}
			else {
					return $null;
			}
	}
}
add_filter( 'acf/pre_load_post_id', 'fix_post_id_on_preview', 10, 2 );


function tailpress_enqueue_scripts(){
	$theme = wp_get_theme();
	wp_enqueue_style('tailpress', tailpress_asset('webpack-assets/bundle.css'), array(),"1.0");
	wp_enqueue_style('custom-styles', tailpress_asset('style.css'), array(),"1.0");
	wp_enqueue_script('tailpress', tailpress_asset('webpack-assets/bundle.js'), array(), "1.0",true);
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');


/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}

/*

	function my_load_scripts(){

		wp_enqueue_script( "js-filter-paged", get_theme_file_uri("API/filter.js") , array(), "3.45", true );
		wp_enqueue_script( "countryJSON", get_theme_file_uri("src/countries.json") , array(), "3.45", true );
		wp_localize_script( "js-filter-paged", "ajaxVar", array(
			"url" => admin_url("/admin-ajax.php"),
			"nonce" => wp_create_nonce( "filters" ),
			"action" => "setSettings"
		));

	}

	add_action( 'wp_enqueue_scripts', 'my_load_scripts' );

*/	

/*** Post types ****/
/*
// Hooking up our function to theme setup
add_action('init', 'create_posttype', 10, 0);
// Our custom post type function
function create_posttype()
{
	register_post_type(
		'company',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Studios'),
				'singular_name' => __('Company')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'company'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),

		)
	);
	register_post_type(
		'game',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Games'),
				'singular_name' => __('Game')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'game'),
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),

		)
	);
}
************/


// //Homepage 
// get_template_part("all-sections/hero");

// include __DIR__."/components/index.php";

foreach (glob(get_template_directory() . "/snippets/*.php") as $file) {

	$file= str_replace(".php","",basename($file));
	get_template_part("snippets/{$file}");
	
}

foreach (glob(get_template_directory() . "/sections/*.php") as $file) {

	$file= str_replace(".php","",basename($file));
	get_template_part("sections/{$file}");
	
}


// include dirname(__FILE__)."/sections/homepage/index.php";


// //Contact page

// include dirname(__FILE__)."/sections/contact/index.php";

// //About us paged
// include dirname(__FILE__)."/sections/aboutUs/index.php";

// //Components



// include get_theme_file_path("components/index.php");
// include get_theme_file_path("/sections/homepage/index.php");
// include get_theme_file_path("sections/contact/index.php");
// include get_theme_file_path("sections/aboutUs/index.php");


//filters

add_filter('wpcf7_autop_or_not', '__return_false');