<?php
/**
 * Template Name: Home Page
 * @package WordPress
 */
get_header(); 
?>
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
        <div class="container">
            <div class="row gy-4 justify-content-center justify-content-lg-between">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up"><?php echo esc_html__(get_theme_mod('headline')); ?></h1>
                    <p data-aos="fade-up" data-aos-delay="100"><?php echo esc_html__(get_theme_mod('tagline','We are team of talented designers making websites with Bootstrap')); ?></p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#book-a-table" class="btn-get-started"><?php echo esc_html__('Booka a Table'); ?></a>
                        <!-- Print The Customizer Watch Video URL -->
                         <?php if(get_theme_mod('watch_video_url')):?>
                        <a href="<?php echo esc_url(get_theme_mod('watch_video_url')) ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><?php echo esc_html__('Watch Video'); ?></span></a>
                        <?php endif;?>
                        <!-- Print The Customizer Watch Video URL -->
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <!-- Print the Customizer Banner URL -->
                    <?php $image_id = get_theme_mod('image_control');
                    $image_url = wp_get_attachment_url($image_id);
                    if ($image_url): ?>
                        <img src="<?php echo esc_url($image_url); ?>" class="img-fluid animated" alt="">
                    <?php else: ?>
                        <img src="<?php echo esc_url(get_theme_file_uri() . "/assets/img/hero-img.png"); ?>" class="img-fluid animated" alt="">
                    <?php endif; ?>
                    <!-- Print the Customizer Banner URL -->
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->
    <!-- About Section -->
    <?php echo get_template_part('template-parts/about') ?>
    <!-- /About Section -->
    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">
        <?php if(get_theme_mod('about_info_banner')): $image_url = get_theme_mod('about_info_banner');?>
        <img src="<?php echo $image_url;?>" alt="" data-aos="fade-in">
        <?php else:?>
            <img src="<?php echo get_theme_file_uri() . "/assets/img/stats-bg.jpg" ?>" alt="" data-aos="fade-in">            
        <?php endif;?>
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="<?php echo esc_html__(get_theme_mod('about-info-clients','232'))?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?php echo esc_html__('Clients');?></p>
                    </div>
                </div><!-- End Stats Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="<?php echo esc_html__(get_theme_mod('about-info-projects','521'))?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?php echo esc_html__('Projects')?></p>
                    </div>
                </div><!-- End Stats Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?php echo esc_html__('Hours Of Support');?></p>
                    </div>
                </div><!-- End Stats Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?php echo esc_html__('Workers');?></p>
                    </div>
                </div><!-- End Stats Item -->
            </div>
        </div>
    </section><!-- /Stats Section -->
    <!-- Menu Section -->
<?php if(post_in_term('starters')->have_posts() || post_in_term('Breakfast')->have_posts() || post_in_term('lunch')->have_posts() || post_in_term('lunch')->have_posts()):?>
    <section id="menu" class="menu section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?php echo esc_html__('Our Menu') ?></h2>
            <p><?php echo esc_html__(get_theme_mod('menus-title','Check Our Yummy Menu'))?></p>
        </div><!-- End Section Title -->
        <div class="container">
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <?php if(post_in_term('starters')->have_posts()):?>
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                        <h4><?php echo esc_html__('Starters');?></h4>
                    </a>
                </li><!-- End tab nav item -->
                <?php endif;  if(post_in_term('Breakfast')->have_posts()):?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                        <h4><?php echo esc_html__('Breakfast');?></h4>
                    </a><!-- End tab nav item -->
                </li>
                <?php endif; if(post_in_term('lunch')->have_posts()):?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                        <h4><?php echo esc_html__('Lunch');?></h4>
                    </a>
                </li><!-- End tab nav item -->
                <?php endif; if(post_in_term('dinner')->have_posts()):?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                        <h4><?php echo esc_html__('Dinner');?></h4>
                    </a>
                </li><!-- End tab nav item -->
                <?php endif;?>
            </ul>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            <?php $starter_query = post_in_term('starters'); if($starter_query->have_posts()):?>
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="tab-header text-center">
                        <p><?php echo esc_html__('Menu');?></p>
                        <h3><?php echo esc_html__('Starters');?></h3>
                    </div>
                    <div class="row gy-5">
                    <?php while($starter_query->have_posts()): $starter_query->the_post();?>
                        <div class="col-lg-4 menu-item">
                            <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?php esc_html__(the_title());?></h4>
                            <p class="ingredients">
                                <?php echo esc_html__(wp_strip_all_tags( get_the_content()));?>
                            </p>
                            <p class="price">
                                <?php echo esc_html__(get_post_meta( get_the_ID(),'yummy_price',true));?>
                            </p>
                        </div><!-- Menu Item -->
                        <?php endwhile;?>
                    </div>
                </div><!-- End Starter Menu Content -->
                <?php endif; $breakFast_query = post_in_term('breakfast'); if($breakFast_query->have_posts()):?>
                <div class="tab-pane fade" id="menu-breakfast">
                    <div class="tab-header text-center">
                        <p><?php echo esc_html__('Menu');?></p>
                        <h3><?php echo esc_html__('Breakfast');?></h3>
                    </div>
                    <div class="row gy-5">
                    <?php while($breakFast_query->have_posts()): $breakFast_query->the_post();?>
                        <div class="col-lg-4 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?php esc_html__(the_title());?></h4>
                            <p class="ingredients">
                            <?php echo esc_html__(wp_strip_all_tags( get_the_content()));?>
                            </p>
                            <p class="price">
                            <?php echo esc_html__(get_post_meta( get_the_ID(),'yummy_price',true));?>
                            </p>
                        </div><!-- Menu Item -->
                        <?php endwhile;?>
                    </div>
                </div><!-- End Breakfast Menu Content -->
                <?php endif; $lunch_query = post_in_term('lunch'); if( $lunch_query->have_posts()):?>
                <div class="tab-pane fade" id="menu-lunch">
                    <div class="tab-header text-center">
                        <p><?php echo esc_html__('Menu');?></p>
                        <h3><?php echo esc_html__('Lunch');?></h3>
                    </div>
                    <div class="row gy-5">
                    <?php while($lunch_query->have_posts()): $lunch_query->the_post();?>
                        <div class="col-lg-4 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?php esc_html__(the_title());?></h4>
                            <p class="ingredients">
                            <?php echo esc_html__(wp_strip_all_tags( get_the_content()));?>
                            </p>
                            <p class="price">
                            <?php echo esc_html__(get_post_meta( get_the_ID(),'yummy_price',true));?>
                            </p>
                        </div><!-- Menu Item -->
                    <?php endwhile;?>
                    </div>
                </div><!-- End Lunch Menu Content -->
                <?php endif; if(post_in_term('dinner')):?>
            <div class="tab-pane fade" id="menu-dinner">
                    <div class="tab-header text-center">
                        <p><?php echo esc_html__('Menu');?></p>
                        <h3><?php echo esc_html__('Dinner')?></h3>
                    </div>
                <div class="row gy-5">
                    <?php $dinner_query = post_in_term('dinner'); while($dinner_query->have_posts()): $dinner_query->the_post();?>
                        <div class="col-lg-4 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?php the_title();?></h4>
                            <p class="ingredients">
                            <?php echo wp_strip_all_tags( get_the_content());?>
                            </p>
                            <p class="price">
                            <?php echo get_post_meta( get_the_ID(),'yummy_price',true);?>
                            </p>
                        </div><!-- Menu Item -->
                        <?php endwhile;?>
                    </div>
                </div><!-- End Dinner Menu Content -->
                <?php endif;?>
            </div>

        </div>

    </section>
    <?php endif;?>
    <!-- /Menu Section -->
     <?php $events = post_in_event(); if($events->have_posts()):?>
    <!-- Events Section -->
    <section id="events" class="events section">

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 1
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper">
                    <?php while( $events->have_posts()): $events->the_post();?>
                    <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                        <h3><?php the_title(); ?></h3>
                        <div class="price align-self-start"><?php echo get_post_meta( get_the_ID(),'yummy_price',true);?></div>
                        <p class="description">
                            <?php echo wp_strip_all_tags( get_the_content());?>
                        </p>
                    </div><!-- End Event item -->
                    <?php endwhile;?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Events Section -->
<?php endif; $cheafs = post_in_cheaf();  if($cheafs->have_posts()):?>
    <!-- Chefs Section -->
    <section id="chefs" class="chefs section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?php echo esc_html__("chefs"); ?></h2>
            <p><span><?php echo esc_html__('Our') ?></span> <span class="description-title"><?php echo esc_html__('Proffesional Chefs') ?><br></span></p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                <?php while($cheafs->have_posts()): $cheafs->the_post();?>
                <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" class="img-fluid" alt="">
                            <div class="social">
                            <?php $cheaf_x = get_post_meta(get_the_ID(),'cheaf_x',true); if($cheaf_x): ?>
                                <a href="<?php echo esc_url($cheaf_x); ?>"><i class="bi bi-twitter-x"></i></a>
                                <?php endif; $cheaf_facebook = get_post_meta(get_the_ID(),'cheaf_facebook',true); if($cheaf_facebook): ?>
                                <a href="<?php echo esc_url($cheaf_facebook); ?>"><i class="bi bi-facebook"></i></a>
                                <?php endif; $cheaf_instagram = get_post_meta(get_the_ID(),'cheaf_instagram',true); if($cheaf_instagram):?>
                                <a href="<?php echo esc_url( $cheaf_linkedin); ?>"><i class="bi bi-linkedin"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?php the_title(); ?></h4>
                            <span><?php echo $cheaf_position = get_post_meta(get_the_ID(),'cheaf_position',true);?></span>
                            <?php the_content();?>
                        </div>
                    </div>
                </div><!-- End Chef Team Member -->
                <?php endwhile; ?>
            </div>
        </div>
    </section><!-- /Chefs Section -->
    <?php  endif;?>

    <!-- Book A Table Section -->
    <section id="book-a-table" class="book-a-table section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?php echo esc_html__('Book A Table'); ?></h2>
            <p><span><?php echo esc_html__('Book Your') ?></span> <span class="description-title"><?php echo esc_html__('Stay With Us'); ?><br></span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-4 reservation-img" style="background-image: url(<?php echo get_theme_file_uri() . "/assets/img/reservation.jpg" ?>);"></div>

                <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
                    <form  method="post" role="form" class="php-email-form">
                        <?php wp_nonce_field(basename(__FILE__),'book_table_nonce'); // Security Check?>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-md-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Date" required="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="time" class="form-control" name="time" id="time" placeholder="Time" required="">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="number" class="form-control" name="people" id="people" placeholder="# of people" required="">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                        </div>

                        <div class="text-center mt-3">
                            <div class="loading" id="b_loading"><?php echo esc_html__('Loading') ?></div>
                            <div class="error-message" id="b_error"></div>
                            <div class="sent-message" id="b_message"><?php echo esc_html__('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!') ?></div>
                            <button type="submit" id="submit"><?php echo esc_html__('Book a Table'); ?></button>
                        </div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>

    </section><!-- /Book A Table Section -->
    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?php echo esc_html__('Contact'); ?></h2>
            <p><span><?php echo esc_html__('Need Help?') ?></span> <span class="description-title"><?php echo esc_html__('Contact Us'); ?></span></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <?php if(get_theme_mod("google-map")):?>

            <div class="mb-5">
                <?php echo get_theme_mod("google-map");?>
            <?php endif;?>

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3><?php echo esc_html__('Address'); ?></h3>
                            <p><?php echo get_theme_mod('address');?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3><?php echo esc_html__('Call Us'); ?></h3>
                            <p><?php echo get_theme_mod('call-us')?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3><?php echo esc_html__('Email Us'); ?></h3>
                            <p><?php echo get_theme_mod('email');?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                        <i class="icon bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3><?php echo esc_html__('Opening Hours'); ?><br></h3>
                            <p><?php echo get_theme_mod('opening-hours');?></p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <form  method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" id="contact_name" placeholder="Your Name" required="">
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" id="contact_email" placeholder="Your Email" required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" id="contact_subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="message" id="contact_message" rows="6" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="loading" id="con_loading"><?php echo esc_html__('Loading') ?></div>
                        <div class="error-message" id="con_error"></div>
                        <div class="sent-message" id="con_message"><?php echo esc_html__('Your message has been sent. Thank you!') ?></div>

                        <button type="submit" id="msubmit"><?php echo esc_html__('Send Message') ?></button>
                    </div>

                </div>
            </form><!-- End Contact Form -->

        </div>

    </section><!-- /Contact Section -->

</main>
<?php get_footer(); ?>