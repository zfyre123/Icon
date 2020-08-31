<?php /* Template Name: Sermons */

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

//LATEST PODCAST
$podcastsArgs = array (
  'order'=> 'DESC',
  'orderby' => 'post_date',
  'posts_per_page' => '1',
  'post_type' => 'podcasts',
);
//QUERY
$podcastsQuery = new WP_Query( $podcastsArgs );

get_header();?>

<section id="sermons-top" class="sand-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-7 col-md-11">
        <div class="top-content">
          <h1><?= get_field('main_header'); ?></h1>
          <div class="hidden-lg-up img-holder col-md-8 offset-md-4 col-sm-8 offset-sm-4 col-xs-8 offset-xs-4"><div class="top-img cover-bg fyrelazy" data-background-image="<?= get_field('top_image'); ?>"><div class="top-img-overlay"></div></div></div>
          <?= get_field('top_content'); ?>
          <a class="btn red-btn" href="<?= get_field('top_button_link'); ?>" title="<?= get_field('top_button_text'); ?>"><?= get_field('top_button_text'); ?></a>
        </div>
      </div>
      <div class="col-xl-6 offset-xl-1 col-lg-5 hidden-md-down">
        <div class="top-img cover-bg fyrelazy" style="background-image:url(<?= get_field('top_image'); ?>);"><div class="top-img-overlay"></div></div>
      </div>
    </div>
  </div>
<img class="lines" src="/wp-content/uploads/2020/08/sermons-top-stone-lines.png">
</section>

<section id="cta" class="pt-0 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-xl-7 offset-xl-5 col-lg-10 offset-lg-2">
        <div class="content-box navy-bg wht-txt">
          <h3><?= get_field('box_header'); ?></h3>
          <?= get_field('box_content'); ?>
          <!-- <a class="btn red-btn" href="<?= get_field('box_button_link'); ?>" title="<?= get_field('box_button_text'); ?>"><?= get_field('box_button_text'); ?></a> -->
          <?php if($day === 'Sun' || 1 == get_option('livestream_display')) { ?>
              <div class="flex-btn"><a class="btn red-btn" href="<?php echo get_option('livestream_url'); ?>">Live Sermon</a></div>  
          <?php } ?> 
        </div>
      </div>
    </div>
  </div>
</section>

<section id="current-sermon" class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <?php if($sermonQuery->have_posts()): ?>
            <?php while($sermonQuery->have_posts()) : $sermonQuery->the_post(); 
                  $author = get_the_author();
                  $date = get_the_date();
                  $terms = get_the_terms( $post->ID , 'sermon_series' );
                  $first_term = $terms[0];
                  $post_term = $first_term->slug;
                  $post_term_name = $first_term->name;
            ?> 
            <div class="sermon-row">
              <div class="sermon-top">
                <p class="uppercase futura-reg">Current Sermon Series / <?php echo $post_term_name ?></p>
                <h2 class="grn-txt"><?php the_title(); ?></h2>
                <p class="date-author"><strong><?php echo $date; ?></strong><span> / <?php echo $author; ?></span></a></p>
              </div>
              <div class="sermon-btm">
                <a class="btn red-brder-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Sermon Details</a>
                <?php if(get_field('apple_podcast_link')): ?>
                  <a class="btn red-brder-btn" href="<?= get_field('apple_podcast_link'); ?>" title="Peace Needs a Language">Apple Podcast</a>
                <?php endif; ?>  
                <?php if(get_field('spotify_link')): ?>
                  <a class="btn red-brder-btn" href="<?= get_field('spotify_link'); ?>" title="Peace Needs a Language">Spotify</a>
                <?php endif; ?> 
                <?= get_field('audio'); ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; wp_reset_query(); ?>         
      </div>
    </div>
  </div>
</section>

<section id="sermon-series" class="sand-bg">
  <div class="container">
    <div class="row section-header text-center">
      <div class="col-12">
        <h2>Our Sermon Series</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php include FYRECHILD_TEMPLATES . '/sermon-series.php'; ?>     
      </div>
    </div>
  </div>
</section>

<section id="leadership-podcast" class="navy-bg wht-txt">
  <div class="container">
    <img class="grn-logo" src="/wp-content/uploads/2020/08/icon-green-logo.png">
    <div class="row leadership-podcast-row-1">
      <div class="col-lg-10">
        <h2>Leadership Podcast</h2>
        <div class="leadership-podcast-img cover-bg fyrelazy" style="background-image:url(<?= get_field('leadership_podcast_image'); ?>);">
        </div>
      </div>
    </div>
    <div class="row leadership-podcast-row-2">
      <div class="col-xl-6 col-lg-7 push-xl-6 push-lg-5">
        <img class="dots" src="/wp-content/uploads/2020/08/podcasts-sstpne-dots.png"> 
        <div class="content-box lake-bg">
          <?= get_field('leadership_podcast_content'); ?>  
        </div>
      </div>
      <div class="col-xl-6 col-lg-5 pull-xl-6 pull-lg-7">
        <div class="btns d-flex">
          <?php if($podcastsQuery->have_posts()): ?>
            <?php while($podcastsQuery->have_posts()) : $podcastsQuery->the_post(); ?> 
              <div class="flex-btn"><a class="btn wht-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Latest Episode</a></div>
            <?php endwhile; ?>
          <?php endif; wp_reset_query(); ?>
          <div class="flex-btn"><a class="btn wht-btn" href="<?= get_field('leadership_podcast_link'); ?>">Apple Podcast</a></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="podcast-seasons" class="navy-bg wht-txt pt-0">
  <div class="container">
    <div class="row section-header text-center">
      <div class="col-12">
        <h2>Podcast Seasons</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php
          //TAX
          $podcast_tax = 'podcast_series';
          //NUMBER OF TERMS
          $numTerms = wp_count_terms( $podcast_tax, array(
              'hide_empty'=> false,
              'parent'    => 0
          ) );
          //TOTAL COUNT
          $counter = $numTerms + 1;
          //ARGS   
          $args = array(
              'orderby'    => 'ID', 
              'order'      => 'DESC',
          );
          //GET TERMS
          $terms = get_terms( $podcast_tax, $args );
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
              <div class="podcasts-slider">
              <?php foreach ( $terms as $term ) {
                  $image_id = get_field('image_upload', $term, false);
                  $image = wp_get_attachment_image_src($image_id, 'medium');
                  $year = get_the_date( 'Y' );
                  $counter--;
              ?>
                <div class="item podcast-slide">
                  <div class="podcast-inner">
                    <div class="podcast-bg cover-bg" style="background-image: url('<?php echo $image[0] ?>');"></div>
                    <a href="<?php echo get_term_link($term->slug, $podcast_tax); ?>" title="<?php echo $term->name; ?>"></a>
                    <div class="overlay"></div>
                    <h3>Season <?php echo convert_number_to_words($counter) ?></h3>
                  </div>
                    <a href="<?php echo get_term_link($term->slug, $podcast_tax); ?>" title="<?php echo $term->name; ?>"><p><strong><?php echo $term->name; ?></strong><span> / <?php echo $year; ?></span></p></a> 
                </div>
        
              <?php } ?>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section id="bottom-section">
<img src="/wp-content/uploads/2020/08/sky-arrow-down.png">
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