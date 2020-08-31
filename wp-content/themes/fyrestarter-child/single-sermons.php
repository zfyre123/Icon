<?php

$post_id = get_the_ID();
$date = get_the_date();
$taxonomy = get_queried_object();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

$terms = get_the_terms( $post->ID , 'sermon_series' );
$first_term = $terms[0];
$post_term = $first_term->slug;
$post_term_name = $first_term->name;

//CHECK IF CURRENT SERIES
$all_terms = get_terms( array(
  'taxonomy' => 'sermon_series',
  'hide_empty' => false,
  'orderby' => 'name',
  'order' => 'DESC',
  'number' => 1
) );
foreach ( $all_terms as $current_term ) {
  $current_term_slug = $current_term->slug;
} 

get_header();?>

<section class="sermon-content">
  <div class="container">

    <div class="row section-header text-center">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <?php if ( $post_term === $current_term_slug) { ?>
              <p class="uppercase futura-reg">Current Sermon Series / <a class="podcast-archive-link" href="/sermons/<?php echo $post_term ?>"><?php echo $post_term_name ?></a></p>
            <?php } else { ?>
              <p class="uppercase futura-reg"><a class="podcast-archive-link" href="/sermons/<?php echo $post_term ?>"><?php echo $post_term_name ?></a></p>
            <?php } ?>
        <h1 class="grn-txt"><?php echo get_the_title(); ?></h1>
        <p><strong><?php echo $date; ?></strong><span> / <?= get_field('author'); ?></span></a></p>
      </div>
    </div>

    <div class="row sermon-podcast-content">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <?php the_content(); ?>
      </div>
    </div>

  <?php if(get_field('video')): ?>
    <div class="row sermon-podcast-video section-header">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <div class="video_wrapper"><?= get_field('video'); ?></div>       
      </div>  
    </div>
  <?php endif; ?> 

  <?php if(get_field('audio')): ?>
    <div class="row sermon-podcast-audio">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <?= get_field('audio'); ?>  
      </div>
    </div>
  <?php endif; ?>

  <?php if(get_field('apple_podcast_link') || get_field('spotify_link')): ?>
    <div class="row sermon-podcast-links">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <div class="btns d-flex justify-content-center">
          <?php if(get_field('apple_podcast_link')): ?>
            <div class="flex-btn"><a class="btn red-brder-btn" href="<?= get_field('apple_podcast_link'); ?>" title="Peace Needs a Language">Apple Podcast</a></div>
          <?php endif; ?>  
          <?php if(get_field('spotify_link')): ?>
            <div class="flex-btn"><a class="btn red-brder-btn" href="<?= get_field('spotify_link'); ?>" title="Peace Needs a Language">Spotify</a></div>
          <?php endif; ?>            
        </div>
      </div>
    </div>
  <?php endif; ?> 

  </div>
</section>

<?php get_footer(); ?>