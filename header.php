<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo esc_html__(the_title());?></title>
  <!-- Favicons -->
  <link href="<?php echo esc_url(get_site_icon_url()); ?>" type="image/png" rel="icon"> 
  <?php wp_head();?>
</head>
<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?php $logo_url = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'); if($logo_url): echo esc_url($logo_url); endif; ?>" alt="">
        <h1 class="sitename"><?php echo esc_html__(get_bloginfo("name"));?></h1>
        <span>.</span>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <?php
             wp_nav_menu(array(
                    'theme_location' => 'primary-menu', // Use the registered menu location
                    'container' => 'ul', // Wrap in a <nav> tag

             ));
          ?>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#book-a-table">Book a Table</a>

    </div>
  </header>