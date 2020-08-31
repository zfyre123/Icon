<?php /* Template Name: Sundays */

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

//LATEST SERMON
$sermonArgs = array (
  'order'=> 'DESC',
  'orderby' => 'post_date',
  'posts_per_page' => '1',
  'post_type' => 'sermons',
);
//QUERY
$sermonQuery = new WP_Query( $sermonArgs );

get_header();?>

<section id="sundays-top" class="sky-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-11">
        <h1 class="lake-txt"><?= get_field('header_text'); ?></h1>
      </div>
    </div>
  </div>
</section>

<section id="hero" class="pt-0">
  <div class="container">
    <div class="row">
      <div class="col-xl-10 offset-xl-2 col-lg-9 offset-lg-3 col-md-10 offset-md-2 col-sm-11 offset-sm-1">
        <div class="banner-img cover-bg fyrelazy" <?php printf( 'style="background-image:url(%s)"', $image_src[0] ); ?>>
      <img src="/wp-content/uploads/2020/07/sundays-dots-vert-wht.png">
          <div class="hero-shape"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="sundays">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-9 col-sm-10 col-xs-11 middle-content">
        <?= get_field('sundays_content'); ?>
        <div class="btns">
            <?php if($sermonQuery->have_posts()): ?>
              <?php while($sermonQuery->have_posts()) : $sermonQuery->the_post(); ?> 
              <a class="btn red-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Latest Sermon</a>
            <?php endwhile; ?>
          <?php endif; wp_reset_query(); ?>
          <?php if($day === 'Sun' || 1 == get_option('livestream_display')) { ?>
            <a class="btn red-btn" href="<?php echo get_option('livestream_url'); ?>">Live Sermon</a></div>  
          <?php } ?>     
        </div>
      </div>
    </div>
    <div class="sundays-arrow-down">
      <div class="row text-center section-header">
        <div class="col-xl-11">
          <h2>WHERE / WHEN</h2>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-xl-11">
          <img src="/wp-content/uploads/2020/07/double-arrow.png">
        </div>
      </div>
    </div>
  </div>
<img class="icon" src="/wp-content/uploads/2020/07/vertical-icon.png">
</section>

<section id="where" class="grn-bg">
  <div class="container">
     <?php if( have_rows('locations') ): ?>
      <?php $counter = 0; ?>
        <?php while( have_rows('locations') ): the_row(); 
          //vars
          $image = get_sub_field('image');
        ?> 
        <?php $counter++; ?>

          <?php
          ///left image
          if ($counter % 2 != 0) { ?>

          <div class="row location-row row-eq-height">
            <div class="col-lg-5 col-md-8 col-sm-10">
              <div class="location-img location-img-top cover-bg fyrelazy" style="background-image:url(<?php echo $image; ?>);"></div>
            </div>
            <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-3 col-sm-10 offset-sm-1 middle-content">
        <div class="end-content">
            <div class="middle-content middle-content-top">
                    <h2 class="navy-txt"><?= get_sub_field('name') ?></h2>
                    <h3 class="wht-txt"><?= get_sub_field('when') ?></h3>
              <h3 class="wht-txt book-reg"><?= get_sub_field('where') ?></h3>
              <div class="flex-btn"><a class="btn wht-btn" href="<?= get_sub_field('map_link') ?>" target="_blank">View Map</a></div>
          </div>
        </div>
            </div>
          </div>

          <?php }
          //odd counter will have left image
          else { ?>

          <div class="row location-row row-eq-height">
            <div class="col-lg-6 col-md-8 col-sm-10 middle-content middle-content-bottom">
              <h2 class="navy-txt"><?= get_sub_field('name') ?></h2>
              <h3 class="wht-txt"><?= get_sub_field('when') ?></h3>
              <h3 class="wht-txt book-reg"><?= get_sub_field('where') ?></h3>
              <div class="flex-btn"><a class="btn wht-btn" href="<?= get_sub_field('map_link') ?>" target="_blank">View Map</a></div>
            </div>
            <div class="col-lg-6 offset-lg-0 col-md-8 offset-md-4 col-sm-10 offset-sm-2">
              <div class="location-img location-img-bottom cover-bg fyrelazy" style="background-image:url(<?php echo $image; ?>);"></div>
            </div> 
          </div>


          <?php } ?>

        <?php endwhile; ?>
     <?php endif; ?>    
  </div>
</section>

<section id="kids" class="sand-bg">
  <div class="container">

  <div class="row kids-row-1">
      <div class="col-lg-8">
    <div class="kids-img cover-bg fyrelazy" style="background-image:url(<?= get_field('kids_image'); ?>);">
      <img class="kids-img-arrows" src="/wp-content/uploads/2020/08/sand-arrow-sundays.png">  
    </div>
      </div>
    </div>
    
    <div class="row kids-row-2">
      <div class="col-xl-8 offset-xl-4 col-lg-10 offset-lg-2 col-md-11 offset-md-1">
    <h2>Icon Kids</h2>
    <div class="content-box wht-bg">
          <?= get_field('kids_content'); ?>
          <a class="btn red-btn" href="/kids/">Family Resources</a>     
    </div>
      </div>
    </div>
    
    
  </div>
</section>

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