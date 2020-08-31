<?php 

$post_id = get_the_ID();

$about_image_top = get_field('about_image_top');
$about_image_bottom = get_field('about_image_bottom');

get_header(); ?>

<?php include FYRECHILD_TEMPLATES . '/page-header.php'; ?>

<section id="about-top">
  <div class="container wide-container">
    <div class="row row-eq-height">
      <div class="col-lg-6 middle-content">
        <div><?= get_field('about_content_top') ?></div>
      </div>
      <div class="col-lg-6">
        <img src="<?php echo $about_image_top['url']; ?>" alt="<?php echo $about_image_top['alt']; ?>" title="<?php echo $about_image_top['title']; ?>">
      </div>
    </div>
  </div>
</section>

<section id="about-quote" class="wht-txt cover-bg text-center middle-content fyrelazy" data-background-image="<?= get_field('banner_image') ?>">
  <div class="overlay blu-bg"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3><?= get_field('about_quote') ?></h3>
      </div>
    </div>
  </div>
</section>

<section id="about-btm">
  <div class="container wide-container">
    <div class="row row-eq-height">
      <div class="col-lg-6 push-lg-6 middle-content">
        <div><?= get_field('about_content_bottom') ?></div>
      </div>
      <div class="col-lg-6 pull-lg-6">
        <img class="rounded-img" src="<?php echo $about_image_bottom['url']; ?>" alt="<?php echo $about_image_bottom['alt']; ?>" title="<?php echo $about_image_bottom['title']; ?>">
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>