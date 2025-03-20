<?php
/**
 * Template Name: About Page
 */
get_header();
$page = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-parts/about.php'
));
?>
<!-- About Section -->
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo esc_html__('About Us');?><br></h2>
        <p><span> <?php echo esc_html__('Learn More') ?></span> <span class="description-title"><?php echo esc_html__('About Us')?></span></p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url($page[0]->ID));?>" class="img-fluid mb-4" alt="">
                <div class="book-a-table">
                    <h3><?php echo esc_html__('Book a Table')?></h3>
                    <p>+1 5589 55488 55</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                    </p>

                    <div class="position-relative mt-4">
                        <img src="<?php echo get_theme_file_uri() . "/assets/img/about-2.jpg" ?>" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->
<?php get_footer(); ?>