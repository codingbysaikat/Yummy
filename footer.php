<footer id="footer" class="footer dark-background">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4><?php echo esc_html__('Address');?></h4>
            <?php echo get_theme_mod('address');?>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4><?php echo esc_html__('Contact');?></h4>
            <p>
              <strong>Phone:</strong> <span><?php echo get_theme_mod('call-us')?></span><br>
              <strong>Email:</strong> <span><?php echo get_theme_mod('email');?></span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4><?php echo esc_html__('Opening Hours');?></h4>
            <p>
            <?php echo get_theme_mod('opening-hours');?>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4><?php echo esc_html__('Follow Us')?></h4>
          <div class="social-links d-flex">
            <?php if(get_theme_mod('twitter-x')):?>
            <a href="<?php echo esc_url(get_theme_mod('twitter-x'));?>" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <?php endif; if(get_theme_mod('facebook')):?>
            <a href="<?php echo esc_url( get_theme_mod('facebook'));?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <?php endif; if(get_theme_mod('instagram')):?>
            <a href="<?php echo esc_url(get_theme_mod('instagram'));?>" class="instagram"><i class="bi bi-instagram"></i></a>
            <?php endif; if(get_theme_mod('linkedin')):?>
            <a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
            <?php endif;?>
          </div>
        </div>

      </div>
    </div>
<?php if(get_theme_mod('copy-right')):?>
    <div class="container copyright text-center mt-4">
      <?php echo get_theme_mod('copy-right');?>
    </div>
<?php endif;?>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>


<?php wp_footer();?>
</body>
</html>