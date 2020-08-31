<?php /* Template Name: Connect */

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

get_header();?>

<section id="connect-top" class="grn-bg wht-txt text-center">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-lg-11 mx-auto">
        <h1><?= get_field('header_text'); ?></h1>
      </div>
    </div>
  </div>
</section>

<section id="hero" class="sand-bg pt-0 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-11 mx-auto">
        <div class="banner-img cover-bg fyrelazy" <?php printf( 'style="background-image:url(%s)"', $image_src[0] ); ?>>
        </div>
      </div>
    </div>
  </div>
<img class="hero-dots" src="/wp-content/uploads/2020/07/dots-navy.png">
</section>

<section id="cta" class="sand-bg text-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php if (get_field('cta_button_text')) { ?>
          <a class="btn red-btn" href="<?= get_field('cta_button_link') ?>" title="<?= get_field('cta_button_text') ?>"><?= get_field('cta_button_text') ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section id="icon-map">
  <div class="container wide-container">
    <div class="row">
      <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6 middle-content">
        <div class="navy-bg content-box">
          <h2 class="sky-txt"><?= get_field('map_header'); ?></h2>
          <div class="wht-txt"><?= get_field('map_content'); ?></div>
          <?php if (get_field('map_button_text')) { ?>
            <a class="btn red-btn" href="<?= get_field('map_button_link') ?>" title="<?= get_field('map_button_text') ?>"><?= get_field('map_button_text') ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php include FYRECHILD_TEMPLATES . '/icon-map.php'; ?>
  <?php include FYRECHILD_TEMPLATES . '/icon-map-mobile.php'; ?>
    <script defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWojZHHg2C_VJiQCF-K93UH8NJWHpgJo0&amp;v=quarterly&amp;language=en&amp;libraries=places,geometry&amp;callback=createMap"></script>

</section>

<section id="events">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="lake-txt"><?= get_field('events_header') ?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php $images = get_field('events_images'); if( $images ): ?>
          <div class="people-gallery">
            <?php foreach( $images as $image ): ?>
              <div class="single-img cover-bg center-bg" style="background-image: url('<?php echo esc_url($image['sizes']['large']); ?>');"></div>
            <?php endforeach; ?>
            <img src="/wp-content/uploads/2020/07/half-dots-connect.png">
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php if (get_field('events_button_text')) { ?>
          <a class="btn red-btn" href="<?= get_field('events_button_link') ?>" title="<?= get_field('events_button_text') ?>"><?= get_field('events_button_text') ?></a>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php include FYRECHILD_TEMPLATES . '/bio-section.php'; ?>

<section id="bottom-section">
  <div class="container">
    <div class="row section-header text-center">
      <div class="col-xl-6 col-lg-8 col-md-9 mx-auto">
        <h2><?= get_field('bottom_section_header'); ?></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-8 col-md-9 mx-auto">
        <?= get_field('bottom_section_content'); ?>
        <div class="text-center">
          <a class="btn red-btn" href="<?= get_field('bottom_section_button_link'); ?>"><?= get_field('bottom_section_button_text'); ?></a>          
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>