<?php /* Template Name: Kids */

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

get_header();?>

<section id="kids-top" class="grn-bg text-center wht-txt">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 col-lg-11 mx-auto">
        <h1>Icon Kids</h1>
        <a class="btn red-btn" href="<?= get_field('header_button_link'); ?>" title="<?= get_field('header_button_text'); ?>"><?= get_field('header_button_text'); ?></a>
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

<section id="page">
  <div class="container">
    <div class="row kids-row">
      <div class="col-xl-8 col-lg-9 col-md-10 mx-auto">
        <?= get_field('top_content'); ?>
      </div>
    </div>
    <div class="row kids-row">
      <div class="col-xl-8 col-lg-9 col-md-10 mx-auto">
        <h2>Weekly Resources</h2>
        <?php if( have_rows('weekly_resources') ): ?>
          <ul>
            <?php while( have_rows('weekly_resources') ): the_row(); ?> 
              <li><?= get_sub_field('date') ?>: <a href="<?= get_sub_field('link') ?>"><?= get_sub_field('title') ?></a></li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>   
      </div>
    </div>
    <div class="row kids-row">
      <div class="col-xl-8 col-lg-9 col-md-10 mx-auto">
        <h2>Right Now Media</h2>
        <?= get_field('right_now_media_content'); ?>
        <?php if( have_rows('right_now_media') ): ?>
          <ul>
            <?php while( have_rows('right_now_media') ): the_row(); ?> 
              <li><a href="<?= get_sub_field('link') ?>"><?= get_sub_field('title') ?></a></li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?> 
      </div>
    </div>
    <div class="row">
      <div class="col-xl-8 col-lg-9 col-md-10 mx-auto">
        <?php if( have_rows('buttons') ): ?>
          <div class="btns d-flex justify-content-center">
            <?php while( have_rows('buttons') ): the_row(); ?> 
              <div class="flex-btn"><a class="btn red-btn" href="<?= get_sub_field('link') ?>"><?= get_sub_field('text') ?></a></div>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?> 
      </div>
    </div>
  </div>
</section>  

<?php get_footer(); ?>