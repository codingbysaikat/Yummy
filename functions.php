<?php
define("VERSION", time());
// Customizer load
include('library/customizer.php');
// Theme Basices Bootstriping
function yummy_theme_doc(){
	load_theme_textdomain('yummy');
	add_theme_support('title_tag');
	add_theme_support('html5', array('search-form','comment-list'));
	add_theme_support('post-formats',array('image','video'));
	add_theme_support('custom-logo');
	add_theme_support( 'menus' );
	add_theme_support('post-thumbnails'); 
	//Register the Dropdown Menu
	register_nav_menus(array(
        'primary-menu' => __('dropdwon', 'yummy'),
    ));
}
add_action('after_setup_theme','yummy_theme_doc');
// all scripts loading
function yummy_scripts(){
	//Enqueue the Fonts
	wp_enqueue_style("google font","https://fonts.googleapis.com", null, VERSION);
	wp_enqueue_style("gstatic font","https://fonts.gstatic.com", null, VERSION);
	wp_enqueue_style("google fontpics","https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap", null, VERSION);
    // Enqueue the Vendor CSS Files
	wp_enqueue_style("bootstrap-min",get_theme_file_uri("/assets/vendor/bootstrap/css/bootstrap.min.css"), null,VERSION);
	wp_enqueue_style("bootstrap-icons",get_theme_file_uri("/assets/vendor/bootstrap-icons/bootstrap-icons.css"),null, VERSION);
	wp_enqueue_style("aos",get_theme_file_uri("/assets/vendor/aos/aos.css"),null, VERSION);
	wp_enqueue_style("glightbox min",get_theme_file_uri("/assets/vendor/glightbox/css/glightbox.min.css"),null, VERSION);
	wp_enqueue_style("swiper-bundle",get_theme_file_uri("/assets/vendor/swiper/swiper-bundle.min.css"),null, VERSION);
	// Enqueue the Main CSS File
	wp_enqueue_style("main-style", get_stylesheet_uri());
	wp_enqueue_script("bootstrap-bundle-min",get_theme_file_uri("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"),null,VERSION,true);
	wp_enqueue_script("validate",get_theme_file_uri("/assets/vendor/php-email-form/validate.js"),null,VERSION,true);
	wp_enqueue_script("aos",get_theme_file_uri("/assets/vendor/aos/aos.js"),null,VERSION,true);
	wp_enqueue_script("glightbox",get_theme_file_uri("/assets/vendor/glightbox/js/glightbox.min.js"),null,VERSION,true);
	wp_enqueue_script("purecounter_vanilla",get_theme_file_uri("/assets/vendor/purecounter/purecounter_vanilla.js"),null,VERSION,true);
	wp_enqueue_script("swiper-bundle.min",get_theme_file_uri("/assets/vendor/swiper/swiper-bundle.min.js"),null,VERSION,true);
	wp_enqueue_script("main.js",get_theme_file_uri("/assets/js/main.js"),null,VERSION,true);

}
add_action('wp_enqueue_scripts','yummy_scripts');
