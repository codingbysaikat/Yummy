<?php
function yummy_customize_register( $wp_customize){
    // Hero Section Start Here
    // Add a section for Hero Area
    $wp_customize->add_section('hero',array(
        'title'=>__('Hero Section','yummy'),
        'priority'=>'30',

    ));
    // Add a setting to store the headline
    $wp_customize->add_setting('headline',array(
        'default'=>__('Enjoy Your Healthy  Delicious Food','yummy'),
        'transport'=>'refresh',

    ));
    // Add a setting to store the tagline
    $wp_customize->add_setting('tagline',array(
        'default'=>__('We are team of talented designers making websites with Bootstrap','yummy'),
        'transport'=>'refresh',
    ));
    // Add a setting to store the watch video url
    $wp_customize->add_setting('watch_video_url', array(
        'default'           => '',
        'transport'=>'refresh',
    ));
    // Add a control (text) to enter the heading
    $wp_customize->add_control('headline',array(
        'label'=>__('Write the Headline','yummy'),
        'section'=>'hero',
        'type'=>'text',

    ));
    // Add a control (text) to enter the tagline
    $wp_customize->add_control('tagline',array(
        'label'=>__('Write a Tag Line Here','yummy'),
        'section'=>'hero',
        'type'=>'text',

    ));
   // Add a setting to store the URL
    $wp_customize->add_setting('image_control',array(
        'default'=>'',
        'transport'=>'refresh',

    ));
     // Add a control to enter the banner image 
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_control', array(
        'label' => __( 'Banner Image', 'yummy' ),
        'section' => 'hero',
        'mime_type' => 'image',
      ) ) );
      // Add a control to enter the watch video url
      $wp_customize->add_control('watch_video_url',array(
        'label'=>" Watch Video URL",
        'section'=>'hero',
        'type'=>'url',

      ));
    // Hero Section End Here

}
add_action("customize_register","yummy_customize_register");