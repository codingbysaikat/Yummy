<?php
/**
 * Template Name: About Page
 */
if(!is_front_page()){
get_header();
}
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
                    <p><?php echo esc_html__(get_theme_mod('contact-number','+1 5589 55488 55'))?></p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <?php echo $page[0]->post_content?>
                    <div class="position-relative mt-4">
                        <?php if(get_theme_mod('about_video_banner')): $image_url = get_theme_mod('about_video_banner');?>
                        <img src="<?php echo $image_url;  ?>" class="img-fluid" alt="">
                        <?php else:?>
                            <img src="<?php echo get_theme_file_uri() . "/assets/img/about-2.jpg" ?>" class="img-fluid" alt="">
                        <?php endif;  if(get_theme_mod('watch_video_url')):?>
                        <a href="<?php echo esc_url(get_theme_mod('watch_video_url'))?>" class="glightbox pulsating-play-btn"></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->

<?php if(!is_front_page()){get_footer();} ?>
