<?php

$post_id = get_the_ID();
$date = get_the_date();
$taxonomy = get_queried_object();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

$terms = get_the_terms( $post->ID , 'podcast_series' );
$first_term = $terms[0];
$post_term = $first_term->slug;
$post_term_name = $first_term->name;

//FIND EPISODE NUMBER OUT OF SERIES
$query = new WP_Query( array(
 'post_type' => 'podcasts',
 'tax_query' => array(
    array(
     'taxonomy' => 'podcast_series',
     'field' => 'slug',
     'terms' => $post_term,
    ),
  ),
  'posts_per_page' => -1, 
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'ASC', 
  'fields' => 'ids'
));
$episode_number = array_search( $post->ID, $query->posts ) + 1; // add 1 because array are 0-based
//2 DIGITS
$episode = sprintf('%02d', $episode_number);

get_header();?>

<section class="sermon-podcast-content">
  <div class="container">

    <div class="row section-header text-center">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <p class="uppercase futura-reg">LEADERSHIP PODCAST / <a class="podcast-archive-link" href="/podcasts/<?php echo $post_term ?>"><?php echo $post_term_name ?></a></p>
        <h1 class="grn-txt">Ep.<?php echo $episode; ?> <?php echo get_the_title(); ?></h1>
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

<section id="podcast-info" class="sand-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-9 mx-auto">
        <?php if( have_rows('info_section') ): ?>
           <?php while( have_rows('info_section') ): the_row(); ?> 
              <div class="row info-row">
                <div class="col-12">
                  <h2><?= get_sub_field('header'); ?></h2>
                  <?= get_sub_field('content'); ?>
                </div>
              </div>
          <?php endwhile; ?>
        <?php endif; ?>   
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="people-dots-space">
          <img src="/wp-content/uploads/2020/07/dots-navy.png">
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>