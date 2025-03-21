<?php
function yummy_customize_register( $wp_customize){
    // Add a section for Hero Area
    $wp_customize->add_section('hero',array(
        'title'=>__('Hero Section','yummy'),
        'priority'=>'30',

    ));
    // About Section Start Here
    $wp_customize->add_section('about',array(
        'title'=>__('About Section','yummy'),
        'priority'=>'50',

    ));
    // About Information Sectin
    $wp_customize->add_section('about-info',array(
        'title'=>__('About Info'),
        'priority'=>'60'

    ));
    // Start Hero Section Controls and Settings
    // Add Control and Setting for a Headline
    $wp_customize->add_setting('headline',array(
        'default'=>__('Enjoy Your Healthy  Delicious Food','yummy'),
        'transport'=>'refresh',

    ));

        $wp_customize->add_control('headline',array(
            'label'=>__('Write the Headline','yummy'),
            'section'=>'hero',
            'type'=>'text',
    
        ));
    // Add Control and Setting for a tagline
    $wp_customize->add_setting('tagline',array(
        'default'=>__('We are team of talented designers making websites with Bootstrap','yummy'),
        'transport'=>'refresh',
    ));
    
        $wp_customize->add_control('tagline',array(
            'label'=>__('Write a Tag Line Here','yummy'),
            'section'=>'hero',
            'type'=>'text',
    
        ));
    // Add Control and Setting for Wactch Video URL
    $wp_customize->add_setting('watch_video_url', array(
        'default'           => '',
        'transport'=>'refresh',
    ));
    
    $wp_customize->add_control('watch_video_url',array(
            'label'=>" Watch Video URL",
            'section'=>'hero',
            'type'=>'url',
    
          ));
    // Add Control and Setting for Hero Banner
    $wp_customize->add_setting('image_control',array(
        'default'=>'',
        'transport'=>'refresh',

    ));
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_control', array(
        'label' => __( 'Upload a Banner Image', 'yummy' ),
        'section' => 'hero',
        'mime_type' => 'image',
      ) ) );

      // End Hero Section Controls and Settings

     // Start About Section Controls and Settings
      // Add Control and Setting for  a Contact Number
      $wp_customize->add_setting('contact-number',array(
        'default'=>'+1 5589 55488 55',
        'transport'=>'refresh',

      ));
      $wp_customize->add_control('contact-number',array(
        'label'=>'Add a Contact Number',
        'section'=>'about',
        'type'=>'text',
      ));
     // Add Control and Setting for About Video Banner
      $wp_customize->add_setting('about_video_banner',array(
        'default'=>'',
        'transport'=>'refresh',

    ));
      $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'about_video_banner',array(
            'label'      => __( 'Upload a About Video Banner', 'yummy' ),
            'section'    => 'about',
            'settings'   => 'about_video_banner',
           ) ) );
      // End About Section Controls and Settings

    // Start About Info Section Controls and Settings
    // Add Control and Setting for Number of Clinents
      $wp_customize->add_setting('about-info-clients',array(
        'default'=>'232',
        'transport'=>'refresh',
      ));
      $wp_customize->add_control('about-info-clients',array(
        'label'=>'Add Number of Clients',
        'section'=>'about-info',
        'type'=>'text',
    ));
    // Add Control and Setting for Number of Projects
    $wp_customize->add_setting('about-info-projects',array(
        'default'=>'521',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('about-info-projects',array(
        'label'=>'Add Number of Project',
        'section'=>'about-info',
        'type'=>'text',

    ));
    // Add Control and Setting for Hours of support
    $wp_customize->add_setting('about-info-hours',array(
        'default'=>'1453',
        'transport'=>'refresh',
     ));
    $wp_customize->add_control('about-info-hours',array(
        'label'=>'Add Hours Of Support',
        'section'=>'about-info',
        'type'=>'text',
    
    ));
    // Add Control and Setting for Number of Projects
    $wp_customize->add_setting('about-info-Workers',array(
        'default'=>'32',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('about-info-Workers',array(
        'label'=>'Add Number of Works',
        'section'=>'about-info',
        'type'=>'text',

    ));
    // End About Info Section Controls and Settings
}
add_action("customize_register","yummy_customize_register");