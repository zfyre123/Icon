<?php /* Template Name: About Us */

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

get_header();?>

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-11 mx-auto">
        <div class="banner-img cover-bg fyrelazy" <?php printf( 'style="background-image:url(%s)"', $image_src[0] ); ?>>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-10 col-lg-10 col-md-11 mx-auto">
        <div class="content-box text-center grn-bg wht-txt">
          <h1><?= get_field('header_text'); ?></h1>
        </div>
      </div>
    </div>
  </div>
<img class="hero-dots" src="/wp-content/uploads/2020/07/wide-dots-about-us.png">
</section>

<section id="we-believe">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-10 mx-auto">
        <div class="row section-header">
          <div class="col-12">
            <h2>We believe.</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5">
            <h3><?= get_field('we_belive_col_one_header'); ?></h3>
            <?= get_field('we_belive_col_one_content'); ?>
          </div>
          <div class="col-lg-6 offset-lg-1">
            <h3><?= get_field('we_belive_col_two_header'); ?></h3>
            <?= get_field('we_belive_col_two_content'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="message" class="sand-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-8">
        <h3 class="lrg-h3">Icon Church adheres to the historic confessions of the Christian Church as articulated in the <a class="message-link" data-toggle="modal" data-target="#myModal-story" data-header="Apostles Creed" data-content='<?= get_field('apostles’_creed'); ?>' data-link="<?= get_field('apostles’_creed_link'); ?>" title="Apostles Creed">Apostles Creed</a>, <a class="message-link" data-toggle="modal" data-target="#myModal-story" data-header="Nicene Creed" data-content='<?= get_field('nicene_creed'); ?>' data-link="<?= get_field('nicene_creed_link'); ?>" title="Apostles Creed">Nicene Creed</a>, and the <a class="message-link" data-toggle="modal" data-target="#myModal-story" data-header="Lausanne Covenant" data-content='<?= get_field('lausanne_creed'); ?>' data-link="<?= get_field('lausanne_creed_link'); ?>" title="Lausanne Covenant">Lausanne Covenant</a>.</h3>
      </div>
      <div class="col-xl-6 offset-xl-0 col-lg-7 offset-lg-5 col-md-8 offset-md-4 col-sm-9 offset-sm-3 col-xs-9 offset-xs-3">
        <div class="message-img cover-bg fyrelazy" style="background-image:url(<?= get_field('message_image'); ?>);">
          <img class="message-dashes" src="/wp-content/uploads/2020/08/about-grn-dash.png">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="team" class="navy-bg wht-txt">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>Meet our team.</h2>
      </div>
      <div class="col-lg-6">
        <p><?= get_field('team_content'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php include FYRECHILD_TEMPLATES . '/team-filter.php'; ?>
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

<div class="modal fade" id="myModal-story" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-shadow">
            <button id="close-story" type="button" class="button" data-dismiss="modal"><i class="fal fa-times" aria-hidden="true"></i></button>
            <div class="modal-body">
                <h2><span class="story-title"></span></h2>
                <div class="story-content"></div>
                <div class="story-link"></div>
            </div>
        </div> 
    </div>
</div>

<?php get_footer(); ?>