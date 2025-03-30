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
function yummy_register_custom_post_type(){
    // Register Custom Post Type: Menus
    $menus_args = array(
        'label'               =>'Menu Items',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-food',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'menus'),
        'show_in_rest'        => true, 
        'capability_type'     => 'post',
        'taxonomies'          => array('menus_category'), 
    );
    register_post_type('menus', $menus_args);

    $event_args = array(
        'label'               =>'Events',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'events'),
        'show_in_rest'        => true, 
        'capability_type'     => 'post',
        'taxonomies'          => array('events'),
    );
    register_post_type('events', $event_args);
    $chefs_args = array(
        'label'=>'Chefs',
        'public'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'query_var'=>true,
        'menu_postion'=>5,
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'chefs'),
        'show_in_rest'        => true, // Enables Gutenberg support
        'capability_type'     => 'post',
        'taxonomies'          => array('chefs'),
    );
    register_post_type('cheafs', $chefs_args);
}
add_action('init', 'yummy_register_custom_post_type');

  // Register Custom Taxonomy : Menus Category
  $labels = array(
    'name'=>__('Menus Categories','yummy'),
    'singular_name'=>__('Menus Category','yummy'),
    'search_items'=>__('Search Menus Categories','yummy'),
    'all_items'=>__('All Menus Categories','yummy'),
    'parent_item'=>__('Parent Menus Category','yummy'),
    'edit_item'=>__('Edit Menus Category','yummy'),
    'update_item'=>__('Update Menus Category','yummy'),
    'add_new_item'=>__('Add New Menus Category','yummy'),
    'new_item_name'=>__('New Menus Category Name','yummy'),
    'menu_name'=>__('Menus categories','yummy'),
);
$agrs =  array(
    'labels'=>$labels,
    'hierarchical'=>true,
    'show_ui'=>true,
    'show_admin_column'=>true,
    'query_var'=>true,
    'rewrite'=>array('slug'=>'menus_category'),
    'show_in_rest'=>true,

);
register_taxonomy('menus_category',array('menus'),$agrs);
// Add Default Category terms
$default_catgories = array('Starters','Breakfast','Lunch','Dinner');
foreach($default_catgories as $category){
    if(!term_exists($category,'menus_category')){
        wp_insert_term($category,'menus_category');
    }
}

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
function yummy_menus_price_meta_box(){
    $post_types = array( 'menus', 'events' );
    // Meta Box for Menus and Event Price
    add_meta_box(
        'price_meta', // Meta box ID
        'Add Price', // Meta box title
        'price_meta_callback', // Callback function
        $post_types, // Post type
        'side',
        'high',
    );
    // Meta Box for Cheafs Position
    add_meta_box(
        'position_of_cheaf',
        'Add Postion',
        'position_meta_callback',
        'cheafs',
        'side',
        'high',

    );
    // Meta Box for Cheafs Facebook Profile
    add_meta_box(
        'cheaf_facebook_profile',
        'Cheaf Facebook Profile',
        'cheaf_facebook_callback',
        'cheafs',
        'side',
        'high',

    );
    // Meta Box for Cheafs Instagram Profile
    add_meta_box(
        'cheaf_instagram_profile',
        'Cheaf Instagram Profile',
        'cheaf_instagram_callback',
        'cheafs',
        'side',
        'high',

    );
     // Meta Box for Cheafs X Profile
    add_meta_box(
        'cheaf_x_profile',
        'Cheaf X Profile',
        'cheaf_x_callback',
        'cheafs',
        'side',
        'high',

    );
    // Meta Box for Cheafs LinkedIn Profile
    add_meta_box(
        'cheaf_linked_profile',
        'Cheaf linked Profile',
        'cheaf_linked_callback',
        'cheafs',
        'side',
        'high',

    );
    
}
add_action('add_meta_boxes', 'yummy_menus_price_meta_box');
// Cheafs Facebook Profile Meta Box Callback Function
function cheaf_facebook_callback($post){
    $cheaf_facebook = get_post_meta($post->ID,'cheaf_facebook',true);
    wp_nonce_field(basename(__FILE__),'facebook_nonce'); // Security Check
    ?>
    <label for="cheaf_facebook_label"><?php echo esc_html__('Add the Cheaf Facebook');?></label><br>
    <input type="url" name="cheaf_facebook" id="cheaf_facebook" value="<?php echo esc_url($cheaf_facebook); ?>" style="width:100%;" />
    <?php


}
// Cheafs Instagram Profile Meta Box Callback Function
function cheaf_instagram_callback($post){
    $cheaf_instagram = get_post_meta($post->ID,'cheaf_instagram',true);
    wp_nonce_field(basename(__FILE__),'instagram_nonce'); // Security Check
    ?>
    <label for="cheaf_instagram_label"><?php echo esc_html__('Add the Cheaf Instagram');?></label><br>
    <input type="url" name="cheaf_instagram" id="cheaf_instagram" value="<?php echo esc_html($cheaf_instagram); ?>" style="width:100%;" />
    <?php

}
// Cheafs X Profile Meta Box Callback Function
function cheaf_x_callback($post){
    $cheaf_x = get_post_meta($post->ID,'cheaf_x',true);
    wp_nonce_field(basename(__FILE__),'x_nonce'); // Security Check
    ?>
    <label for="cheaf_x_label"><?php echo esc_html__('Add the Cheaf X');?></label><br>
    <input type="url" name="cheaf_x" id="cheaf_x" value="<?php echo esc_html($cheaf_x); ?>" style="width:100%;" />
    <?php
}

// Cheafs LinkedIn Profile Meta Box Callback Function
function cheaf_linked_callback($post){
    $cheaf_linkedin = get_post_meta($post->ID,'cheaf_linkedin',true);
    wp_nonce_field(basename(__FILE__),'linkedin_nonce'); // Security Check
    ?>
    <label for="cheaf_x_linkedin"><?php echo esc_html__('Add the Cheaf LinkedIn');?></label><br>
    <input type="url" name="cheaf_linkedin" id="cheaf_linkedin" value="<?php echo esc_html($cheaf_linkedin); ?>" style="width:100%;" />
    <?php

}
// Cheafs Position Meta Box Callback Function
function position_meta_callback($post){
    $cheaf_position = get_post_meta($post->ID,'cheaf_position',true);
    wp_nonce_field(basename(__FILE__),'cheaf_position_nonce'); // Security Check
    ?>
    <label for="cheaf_label"><?php echo esc_html__('Add the Cheaf Position');?></label><br>
    <input type="text" name="cheaf_position" id="cheaf_position" value="<?php echo esc_html($cheaf_position); ?>" style="width:100%;" />
<?php
}
// Price Meta Box Callback Function
function price_meta_callback($post){
    $post_type = get_post_type($post->ID);
    if($post_type =='events'){
        $context = 'Add Event Price';
    }else{
        $context = 'Add Menu Price';
    }
    $the_price = get_post_meta($post->ID,'yummy_price',true);
    wp_nonce_field(basename(__FILE__),'price_nonce'); // Security Check
    ?>
    <label for="price_meta"><?php echo esc_html__($context);?></label><br>
    <input type="text" name="yummy_price" id="yummy_price" value="<?php echo esc_html($the_price); ?>" style="width:100%;" />
    <?php
}
function yummy_save_meta_data($post_id){     
    // Check for AUTOSAVE
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check user permission
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Save the Facebook Meta
    if(isset($_POST['cheaf_facebook']) || wp_verify_nonce($_POST['facebook_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['cheaf_facebook'])){       
        update_post_meta($post_id, 'cheaf_facebook', wp_kses_post($_POST['cheaf_facebook']));
        }else{
          delete_post_meta($post_id, 'cheaf_facebook');
        }
    }
    // Save the Instagram Meta
    if(isset($_POST['cheaf_instagram']) || wp_verify_nonce($_POST['instagram_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['cheaf_instagram'])){
        update_post_meta($post_id, 'cheaf_instagram', wp_kses_post($_POST['cheaf_instagram']));
        }else{
        delete_post_meta($post_id, 'cheaf_instagram');
        }
    }        
    // save the Cheafs X Meta
    if(isset($_POST['cheaf_x']) || wp_verify_nonce($_POST['x_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['cheaf_x'])){
            update_post_meta($post_id, 'cheaf_x', wp_kses_post($_POST['cheaf_x']));
        }else{
            delete_post_meta($post_id, 'cheaf_x');    
        }       
    }
    // Save the Cheafs LinkedIn Meta
    if(isset($_POST['cheaf_linkedin']) || wp_verify_nonce($_POST['linkedin_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['cheaf_linkedin'])){
            update_post_meta($post_id, 'cheaf_linkedin', wp_kses_post($_POST['cheaf_linkedin']));
        }else{
            delete_post_meta($post_id, 'cheaf_linkedin');
        }       
    }
    // Save the Cheafs Position Meta
     if(isset($_POST['cheaf_position']) || wp_verify_nonce($_POST['cheaf_position_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['cheaf_position'])){
            update_post_meta($post_id, 'cheaf_position', wp_kses_post($_POST['cheaf_position']));
        }else{
            delete_post_meta($post_id, 'cheaf_position');
          }    
        }
    // Save the Menus and Events Price Meta
     if(isset($_POST['yummy_price']) || wp_verify_nonce($_POST['price_nonce'],basename(__FILE__))){ // verify the Nonce
        if(isset($_POST['yummy_price'])){
            update_post_meta($post_id, 'yummy_price', wp_kses_post($_POST['yummy_price']));
        }else{
            delete_post_meta($post_id, 'yummy_price');
        }       
     }
}
add_action('save_post', 'yummy_save_meta_data');

// Custom Query Function : By Menus Category
if(!function_exists('post_in_term')){
    function post_in_term($term){
        $menus_args = array(
            'post_type'      => 'menus',
            'post_status'    => 'draft',
            'posts_per_page' => 100,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'menus_category',
                    'field'    =>'slug',
                    'terms'    => $term,
                ),
            ),
        );

        $query = new WP_Query($menus_args);
        wp_reset_postdata();
        return $query;
    }
}
// Custom Query Function : By Events
if(!function_exists('post_in_event')){
    function post_in_event(){
        $events_args = array(
            'post_type'=>'events',
            'post_status'=>'draft',
            'posts_per_page'=>10,
        );
    $event_query = new WP_Query($events_args);
    return $event_query;
    wp_reset_postdata();
    }
}

