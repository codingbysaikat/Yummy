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
    // Register Custom Post Type: Events
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
    // Register Custom Post Type: Cheafs
    $cheafs_args = array(
        'label'=>'Cheafs',
        'public'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'query_var'=>true,
        'menu_postion'=>5,
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'cheafs'),
        'show_in_rest'        => true, // Enables Gutenberg support
        'capability_type'     => 'post',
        'taxonomies'          => array('cheafs'),
    );
    register_post_type('cheafs', $cheafs_args);

    // Register Custom Post Type: Cheafs
    $cheafs_args = array(
        'label'=>'Cheafs',
        'public'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'query_var'=>true,
        'menu_postion'=>5,
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'cheafs'),
        'show_in_rest'        => true, // Enables Gutenberg support
        'capability_type'     => 'post',
        'taxonomies'          => array('cheafs'),
    );
    register_post_type('cheafs', $cheafs_args);

    // Register Custom Post Type: Book Table
    $book_tables = array(
        'label'=>'Book Tables',
        'public'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'query_var'=>true,
        'menu_postion'=>5,
        'menu_icon'           => 'dashicons-editor-table',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'book_tables'),
        'show_in_rest'        => true, // Enables Gutenberg support
        'capability_type'     => 'post',
        'taxonomies'          => array('book_tables'),
    );
    register_post_type('book_tables', $book_tables);
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
	// wp_enqueue_script("validate",get_theme_file_uri("/assets/vendor/php-email-form/validate.js"),null,VERSION,true);
	wp_enqueue_script("aos",get_theme_file_uri("/assets/vendor/aos/aos.js"),null,VERSION,true);
	wp_enqueue_script("glightbox",get_theme_file_uri("/assets/vendor/glightbox/js/glightbox.min.js"),null,VERSION,true);
	wp_enqueue_script("purecounter_vanilla",get_theme_file_uri("/assets/vendor/purecounter/purecounter_vanilla.js"),null,VERSION,true);
	wp_enqueue_script("swiper-bundle.min",get_theme_file_uri("/assets/vendor/swiper/swiper-bundle.min.js"),null,VERSION,true);
	wp_enqueue_script("main.js",get_theme_file_uri("/assets/js/main.js"),null,VERSION,true);
    // enqueue your custom JavaScript file and localize the AJAX URL.
    wp_enqueue_script('yummy-ajax-script', get_template_directory_uri() . '/assets/js/yummy-ajax-script.js', array('jquery'), null, true);
    wp_localize_script('yummy-ajax-script', 'yummy_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
   //  handle Media Uploader:
    wp_enqueue_media();
    wp_enqueue_script( 'custom-gallery', get_template_directory_uri() . '/assets/js/customizer-gallery.js',   array( 'jquery' ), false, true );  
    
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
    // Add Meta Boxes For Book Table
    add_meta_box(
        'books_name',
        'Name',
        'book_name_callback',
        'book_tables',
        'side',
        'high',

    );
    add_meta_box(
        'books_email',
        'Email',
        'book_mail_callback',
        'book_tables',
        'side',
        'high',
    );
    add_meta_box(
        'books_phone',
        'Phone Number',
        'book_phone_callback',
        'book_tables',
        'side',
        'high',
    );
    add_meta_box(
        'books_date_time',
        'Booking Date and Time',
        'book_date_time_callback',
        'book_tables',
        'side',
        'high',
    );
    add_meta_box(
        'book_people',
        'Number Of People',
        'book_people_callback',
        'book_tables',
        'side',
        'high',
    );
    
}
add_action('add_meta_boxes', 'yummy_menus_price_meta_box');
// Book a Table Name Callback
function book_name_callback($post){
    $book_name = get_post_meta($post->ID,'book_name',true);
    ?>
     <input type="text" name="book_name" id="book_name" value="<?php echo $book_name ?>" style="width:100%;" />
    <?php
}
function book_mail_callback($post){
    $book_email = get_post_meta($post->ID,'book_email',true);
    ?>
     <input type="text" name="book_email" id="book_mail" value="<?php echo $book_email ?>" style="width:100%;" />
    <?php
}
function book_phone_callback($post){
    $book_phoneNumber = get_post_meta($post->ID,'book_phone',true);
    ?>
     <input type="text" name="book_phone" id="book_phone" value="<?php echo $book_phoneNumber ?>" style="width:100%;" />
    <?php

}
function book_date_time_callback($post){
    $book_dateTime = get_post_meta($post->ID,'book_date_time',true);
    ?>
     <input type="text" name="book_date_time" id="book_phone" value="<?php echo  $book_dateTime ?>" style="width:100%;" />
    <?php
    
}
function book_people_callback($post){
    $book_people = get_post_meta($post->ID,'people',true);
    ?>
     <input type="text" name="people" id="people" value="<?php echo $book_people ?>" style="width:100%;" />
    <?php

}
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

        $menus_query = new WP_Query($menus_args);
        return $menus_query;
        wp_reset_postdata();

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
// Custom Query function : By Cheafs
if(!function_exists('post_in_cheafs')){
    function post_in_cheaf(){
        $cheafs_args =  array(
            'post_type'=>'cheafs',
            'post_status'=>'draft',
            'posts_per_page'=>10,
        );
        $cheafs_query = new WP_Query($cheafs_args);
        return $cheafs_query;
        wp_reset_postdata();

    }
}
// Book a table by ajax request
function yummy_booking_ajax_request() {
    // Get data from AJAX request
    $name = $_POST['name'] ? sanitize_text_field($_POST['name']) : 'Guest';
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $numberOfpeoples = $_POST['people'];
    $message = $_POST['message'];
    $post_title = $name . " - make a new reservation";
    $post_data = array(
        'post_title'    => $post_title,
        'post_content'  =>$message,
        'post_status'   => 'draft', 
        'post_author'   => get_current_user_id(),
        'post_category' => array(1), // Category ID (only for 'post' type)
        'post_type'     => 'book_tables',  // Change to 'page' or custom post type if needed
    );
    $insert_status =  wp_insert_post($post_data);
    if ($insert_status && !is_wp_error($insert_status)) {

        // Successfully inserted post, now add meta data
        if($name){
            update_post_meta($insert_status, 'book_name', wp_kses_post($name));
        }
        if($email){
            update_post_meta($insert_status, 'book_email', wp_kses_post($email));
        }
        if($phone){
            update_post_meta($insert_status, 'book_phone', wp_kses_post($phone));
        }
        if($date || $time){
            $date_time = $date.' '.$time;
            update_post_meta($insert_status, 'book_date_time', wp_kses_post( $date_time));
        }
        if($numberOfpeoples){
            update_post_meta($insert_status, 'people', wp_kses_post( $numberOfpeoples));
        }
    }
    // Create response
    if($insert_status){
        $response = array(
            'message' => true,
        );
    }else{
        $response = array(
            'message' => false,
        );
    }
    // Send JSON response
    wp_send_json_success($response);
}
// Register AJAX action for logged-in users-booking
add_action('wp_ajax_booking_ajax_action', 'yummy_booking_ajax_request');

// Register AJAX action for guests (non-logged-in users)-booking
add_action('wp_ajax_nopriv_booking_ajax_action', 'yummy_booking_ajax_request');

function yummy_conact_form_ajax_request(){
    $contact_name    = sanitize_text_field($_POST['contact_name']);
    $contact_email   = sanitize_email($_POST['contact_email']);
    $contact_subject = sanitize_text_field($_POST['contact_subject']);
    $contact_message = wp_kses_post($_POST['contact_message']);
    
    if ($contact_name && $contact_email && $contact_subject && $contact_message) {
        $mail_content = "Name: {$contact_name}<br>Email: {$contact_email}<br><br>{$contact_message}";
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Reply-To: ' . $contact_email
        );
    
        $admin_email = get_option('admin_email');
        $send_mail = wp_mail($admin_email, $contact_subject, $mail_content, $headers);
    }
    if($send_mail){
        $response = array(
            'message' => true,
        );

    }else{
        $response = array(
            'message' => false,
        );
    }
    // Send JSON response
    wp_send_json_success($response);
}
// Register AJAX action for logged-in users - contact form
add_action('wp_ajax_contact_form_ajax_action', 'yummy_conact_form_ajax_request');

// Register AJAX action for guests (non-logged-in users) - contact form
add_action('wp_ajax_nopriv_contact_form_ajax_action', 'yummy_conact_form_ajax_request');