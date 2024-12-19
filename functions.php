<?php
// theme basices bootstriping
function yummy_theme_doc(){
	load_theme_textdomain('yummy');
	add_theme_support('title_tag');
	add_theme_support('html5', array('search-form','comment-list'));
	add_theme_support('post-formats',array('image','video'));
}
add_action('after_theme_setup','yummy_theme_doc');
// all scripts loading
function yummy_scripts(){
    // Enqueue the main style.css file
    // wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts','yummy_scripts');
