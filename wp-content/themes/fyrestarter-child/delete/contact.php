<?php /* Template Name: Contact */

$post_id = get_the_ID();

//ACF VARS
$banner_image = get_field('banner_image');

get_header();?>

<?php include FYRECHILD_TEMPLATES . '/page-header.php'; ?>

<section id="contact" class="pt-0 pb-0">
  <div class="container-fluid">
    <div class="row row-eg-height">
      <div class="col-lg-6 blu-bg wht-txt middle-content contact-info">
        <div class="d-flex justify-content-end">
          <div class="contact-info-rows">
            <?php if (!empty(get_option('phone_number'))) { ?>
              <div class="contact-info-row d-flex">
                  <div class="middle-content">
                    <i class="fas fa-phone gld-txt"></i>
                  </div>
                  <div class="middle-content">
                    <span class="bold">Customer Service</span>
                    <a href="tel:<?php echo get_option('phone_number'); ?>" title="Call Us Now"><?php echo get_option('phone_number'); ?></a>
                  </div>
              </div>
            <?php } ?>
            <?php if (!empty(get_option('the_address'))) { ?>
              <div class="contact-info-row d-flex">
                  <div class="middle-content">
                    <i class="fas fa-map-marker gld-txt"></i>
                  </div>
                  <div class="middle-content">
                    <span class="bold">Culture Cannabis Club</span>
                    <span><?php echo get_option('the_address'); ?></span>
                  </div>
              </div>
            <?php } ?>
            <?php if (!empty(get_option('the_hours'))) { ?>
              <div class="contact-info-row d-flex">
                  <div class="middle-content">
                    <i class="fas fa-clock gld-txt"></i>
                  </div>
                  <div class="middle-content">
                    <span class="bold">Open Everyday</span>
                    <div><?php echo get_option('the_hours'); ?></div>
                  </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 px-0">
        <?php include FYRECHILD_TEMPLATES . '/contact-map.php'; ?>
      </div>
    </div>
  </div>
</section>

<section id="contact-form">
  <div class="container"> 
    <div class="row text-center">
      <div class="col-lg-8 mx-auto">
        <div class="section-header text-center">
          <h2>Send Us A Message</h2>
          <p><?= get_field('contact_subheader') ?></p>
        </div>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]'); ?>
      </div>
    </div>
  </div>
</section>

<?php include FYRECHILD_TEMPLATES . '/img-sec.php'; ?>

<?php get_footer(); ?>