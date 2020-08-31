<?php get_header();

//TAX INFO
$taxonomy = get_queried_object()->taxonomy;
$slug = get_queried_object()->slug;
$name = get_queried_object()->name;
$id = get_queried_object()->term_id;
$desc = term_description();

//SERIES PODCASTS
$podcastArgs = array (
  'order'=> 'ASC',
  'orderby' => 'post_date',
  'posts_per_page' => -1,
  'post_type' => 'podcasts',
  'tax_query' => array(
      array(
          'taxonomy' => $taxonomy,
          'field' => 'slug',
          'terms' => $slug,
      ),
    ),
);
//QUERY
$podcastQuery = new WP_Query( $podcastArgs );

//ACF
$image_upload = get_field('image_upload', $taxonomy . '_' . $id);
$top_header = get_field('top_header', $taxonomy . '_' . $id);
$apple_podcast = get_field('apple_podcast_link', $taxonomy . '_' . $id);
$spotify_link = get_field('spotify_link', $taxonomy . '_' . $id);
$download_file = get_field('download_file', $taxonomy . '_' . $id);
$resources_sub_header = get_field('resources_sub_header', $taxonomy . '_' . $id);
$resource_rows = get_field('resource_row', $taxonomy . '_' . $id);

//CURRENT SEASON NUMBER
$all_terms = get_terms( array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'DESC',
   // 'number' => 1
) );
$term_count = 0;
foreach ( $all_terms as $current_term ) {
  $term_count++; 
  $current_term_slug = $current_term->slug;
  $current_term_count = $term_count;

  if ($current_term_slug === $slug){
    $current_season = $current_term_count;
  }

} 


?>

<section id="hero" class="pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="banner-img cover-bg fyrelazy" style="background-image:url(<?php echo $image_upload; ?>);">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="info" class="middle-content text-center">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-10 mx-auto">
        <p class="uppercase futura-reg">Leadership Podcast / Season <?php echo convert_number_to_words($current_season); ?></p>
        <h1 class="grn-txt"><?php echo $name; ?></h1>
        <div class="btns d-flex justify-content-center">
          <?php if ($apple_podcast) { ?>
            <div class="flex-btn"><a class="btn red-brder-btn" href="<?php echo $apple_podcast; ?>" title="Apple Podcast" target="_blank">Apple Podcast</a></div>
          <?php } ?>
          <?php if ($spotify_link) { ?>
            <div class="flex-btn"><a class="btn red-brder-btn" href="<?php echo $spotify_link; ?>" title="Spotify" target="_blank">Spotify</a></div>
          <?php } ?>
        </div>
        <?php if ( '' !== $desc ) {
          echo $desc;
        } ?>
      </div>
    </div>
  </div>
</section>

<section id="list" class="sand-bg">
  <div class="container">
    <div class="row section-header text-center">
      <div class="col-12">
        <h2 class="grn-txt">Episodes</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-11 mx-auto">
        <?php if($podcastQuery->have_posts()): 
          $counter = 0; 
        ?>
            <?php while($podcastQuery->have_posts()) : $podcastQuery->the_post();
                $counter++; 
                $author = get_the_author();
                $date = get_the_date();
                $episode = sprintf('%02d', $counter);
            ?> 
            <div class="sermon-row d-flex justify-content-between">
              <div class="sermon-row-info">
                <h3>Ep.<?php echo $episode; ?> <?php the_title(); ?></h3>
                <p><strong><?php echo $date; ?></strong><span> / <?php echo $author; ?></span></a></p>
              </div>
              <div class="sermon-row-link middle-content">
                <div><a class="btn red-brder-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">View Details</a></div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; wp_reset_query(); ?>
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