<?php /* Template Name: Give */

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

get_header();?>

<section id="give-top" class="sky-bg text-center">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-lg-11 mx-auto">
        <h1 class="navy-txt"><?= get_field('header_text'); ?></h1>
      </div>
    </div>
  </div>
</section>

<section id="hero" class="pt-0 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="banner-img cover-bg fyrelazy" <?php printf( 'style="background-image:url(%s)"', $image_src[0] ); ?>>
        </div>
      </div>
    </div>
  </div>
<img class="hero-dots" src="/wp-content/uploads/2020/07/dots-navy.png">
</section>

<section id="give">
  <div class="container">
    <div class="row">
      <div class="give-content-section col-xl-6 col-lg-9">
        <?= get_field('give_content'); ?>
        <a class="btn red-btn" href="<?= get_field('give_button_link'); ?>" title="<?= get_field('give_button_text'); ?>"><?= get_field('give_button_text'); ?></a>
      </div>
    </div>
    <img class="arrows" src="/wp-content/uploads/2020/07/pine-grn-arrow-give.png">
  </div>
</section>

<?php 
  //var
  $display_bottom_section = get_field('display_bottom_section');
  if( $display_bottom_section && in_array('yes', $display_bottom_section) ) { ?>
  <section id="give-bottom" class="sand-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-1 push-lg-5 col-md-7 offset-md-5 col-sm-7 offset-sm-5 col-xs-7 offset-xs-5">
          <div class="bottom-img cover-bg fyrelazy" style="background-image:url(<?= get_field('bottom_section_image'); ?>);"></div>
        </div>
        <div class="col-lg-5 pull-lg-6">
          <h2><?= get_field('bottom_section_header'); ?></h2>
          <?= get_field('bottom_section_content'); ?>
          <a class="btn red-btn" href="<?= get_field('bottom_section_button_link'); ?>" title="<?= get_field('bottom_section_button_text'); ?>"><?= get_field('bottom_section_button_text'); ?></a>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php get_footer(); ?>