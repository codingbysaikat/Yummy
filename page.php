<?php
/**
 * Template Name: Home Page
 * @package WordPress
 */
get_header(); 
?>
  <main class="main">

<!-- Page Title -->
<div class="page-title" data-aos="fade">
  <div class="container">
    <h1><?php the_title();?></h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?php echo esc_url(home_url());?>"><?php echo esc_html__("Home")?></a></li>
        <li class="current"><?php the_title();?></li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Starter Section Section -->
<section id="starter-section" class="starter-section section">
  <div class="container" data-aos="fade-up">
    <?php the_content();?>
  </div>

</section><!-- /Starter Section Section -->

</main>

<?php get_footer(); ?>