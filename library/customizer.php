<?php
function yummy_customize_register( $wp_customize){
    // Add a Section for Hero Area
    $wp_customize->add_section('hero',array(
        'title'=>__('Hero Section','yummy'),
        'priority'=>'30',

    ));
    // Add a Section for About
    $wp_customize->add_section('about',array(
        'title'=>__('About Section','yummy'),
        'priority'=>'50',

    ));
    // Add a Section for About Information
    $wp_customize->add_section('about-info',array(
        'title'=>__('About Info','yummy'),
        'priority'=>'60'

    ));
    // Add a Section for Menu
    $wp_customize->add_section('menus-sec',array(
        'title'=>__('Menu Section','yummy'),
        'priority'=>'65',

    ));
    // Add a Section for Contact Information
    $wp_customize->add_section('contact-info',array(
        'title'=>__('Add Contact Information','yummy'),
        'priority'=>'70',
    ));
    // Add Section for Social Medies
    $wp_customize->add_section('social-media',array(
        'title'=>__("Add Social Media Links"),
        'priority'=>'80',

    ));
    // Add Section for Social Medies
    $wp_customize->add_section('copy-right',array(
        'title'=>__("Copy Right"),
        'priority'=>'90',
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
    // Add Control and Setting for About Video Banner
    $wp_customize->add_setting('about_info_banner',array(
       'default'=>'',
       'transport'=>'refresh',
    
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'about_info_banner',array(
        'label'      => __( 'Upload a About info banner', 'yummy' ),
        'section'    => 'about-info',
        'settings'   => 'about_info_banner',
       ) ));
    // End About Info Section Controls and Settings

    // Add Control and Setting for Number of Projects
    // Add Control and Setting for About Video Banner
    $wp_customize->add_setting('menus-title',array(
        'default'=>'Check Our Yummy Menu',
        'transport'=>'refresh',
        
    ));
    $wp_customize->add_control('menu-title',array(
        'label'=>__('Add a Tilte','yummy'),
        'section'=>'menus-sec',
        'settings'=>'menus-title',
        'type'=>'text',
    ));
    // End Control and Setting for Number of Projects
    // Add Control and Setting for Conatct Information
    // Add Google Map Setting
    $wp_customize->add_setting('google-map',array(
        'default'=>"",
        'transport'=>'refresh',
    ));
    // Add Google Map Control
    $wp_customize->add_control('google-map',array(
        'label'=>__("Add Your Goolge Embed Map","yummy"),
        'section'=>'contact-info',
        'settings'=>'google-map',
        'type'=>'textarea',
    ));
    // Add Address Control
    $wp_customize->add_setting('address',array(
        'default'=>'A108 Adam Street, New York, NY 535022',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('address',array(
        'label'=>__('Add Your Address','yummy'),
        'section'=>'contact-info',
        'settings'=>'address',
        'type'=>'text',

    ));
    // End Address Control
    // Add Call Us Control
    $wp_customize->add_setting('call-us',array(
        'default'=>'+1 5589 55488 55',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('call-us',array(
        'label'=>__('Add Phone Number','yummy'),
        'section'=>'contact-info',
        'settings'=>'call-us',
        'type'=>'text',

    ));
    // End Call Us Control   
    // Add Email Control
    $wp_customize->add_setting('email',array(
        'default'=>'info@example.com',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('email',array(
        'label'=>__('Add Email','yummy'),
        'section'=>'contact-info',
        'settings'=>'email',
        'type'=>'text',

    ));
    // End Email Us Control
    // Add Opening Hours Control
    $wp_customize->add_setting('opening-hours',array(
        'default'=>'<strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control('opening-hours',array(
        'label'=>__('Add Opening Hours','yummy'),
        'section'=>'contact-info',
        'settings'=>'opening-hours',
        'type'=>'textarea',

    ));
    // End Opening Hours Control       
    // End Control and Setting for Conatct Information
    // Start Control and Settings for Social Media
        // Add Facebook Control
    $wp_customize->add_setting('facebook',array(
        'default'=>'https://www.facebook.com',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control("facebook",array(
        'label'=>_('Add Facebook Link'),
        'section'=>'social-media',
        'settings'=>'facebook',
        'type'=>'url',

    ));
    // Add Facebook Control
    $wp_customize->add_setting('instagram',array(
        'default'=>'https://www.instagram.com/',
        'transport'=>'refresh',
    ));
    $wp_customize->add_control("instagram",array(
        'label'=>_('Add Instagram Link'),
        'section'=>'social-media',
        'settings'=>'instagram',
        'type'=>'url',

    ));
        // Add Twitter X Control
        $wp_customize->add_setting('twitter-x',array(
            'default'=>'https://x.com',
            'transport'=>'refresh',
        ));
        $wp_customize->add_control("twitter-x",array(
            'label'=>_('Add Twitter-X Link'),
            'section'=>'social-media',
            'settings'=>'twitter-x',
            'type'=>'url',
    
        ));
        // Add LinkedIn Control
        $wp_customize->add_setting('linkedin',array(
            'default'=>'https://www.linkedin.com',
            'transport'=>'refresh',
        ));
        $wp_customize->add_control("linkedin",array(
            'label'=>_('Add linkedIn Link'),
            'section'=>'social-media',
            'settings'=>'linkedin',
            'type'=>'url',
    
        ));
    // End Control and Settings for Social Media
        // Add Copy-Right Control
        $wp_customize->add_setting('copy-right',array(
            'default'=>'<p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>',
            'transport'=>'refresh',
        ));
        $wp_customize->add_control("copy-right",array(
            'label'=>_('Add copy-right Link'),
            'section'=>'copy-right',
            'settings'=>'copy-right',
            'type'=>'textarea',
    
        ));
}
add_action("customize_register","yummy_customize_register");