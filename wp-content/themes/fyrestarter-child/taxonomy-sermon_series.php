<?php get_header();

//TAX INFO
$taxonomy = get_queried_object()->taxonomy;
$slug = get_queried_object()->slug;
$name = get_queried_object()->name;
$id = get_queried_object()->term_id;
$desc = term_description();

//SERIES SERMONS
$sermonArgs = array (
  'order'=> 'DESC',
  'orderby' => 'post_date',
  'posts_per_page' => -1,
  'post_type' => 'sermons',
  'tax_query' => array(
      array(
          'taxonomy' => $taxonomy,
          'field' => 'slug',
          'terms' => $slug,
      ),
    ),
);
//QUERY
$sermonQuery = new WP_Query( $sermonArgs );

//ACF
$image_upload = get_field('image_upload', $taxonomy . '_' . $id);
$top_header = get_field('top_header', $taxonomy . '_' . $id);
$apple_podcast = get_field('apple_podcast_link', $taxonomy . '_' . $id);
$spotify_link = get_field('spotify_link', $taxonomy . '_' . $id);
$download_file = get_field('download_file', $taxonomy . '_' . $id);
$resources_sub_header = get_field('resources_sub_header', $taxonomy . '_' . $id);
$resource_rows = get_field('resource_row', $taxonomy . '_' . $id);

//CHECK IF CURRENT SERIES
$all_terms = get_terms( array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'DESC',
    'number' => 1
) );
foreach ( $all_terms as $current_term ) {
  $current_term_slug = $current_term->slug;
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
        <?php if ( $slug === $current_term_slug) { ?>
          <p class="uppercase futura-reg">Current Sermon Series</p>
        <?php } ?>
        <h1 class="grn-txt"><?php if( get_field('top_header') ) { ?><?php echo $top_header ?><?php } else { ?><?php echo $name; ?><?php } ?></h1>
        <div class="btns d-flex justify-content-center">
          <?php if ($apple_podcast) { ?>
            <a class="btn red-brder-btn" href="<?php echo $apple_podcast; ?>" title="Apple Podcast" target="_blank">Apple Podcast</a>
          <?php } ?>
          <?php if ($spotify_link) { ?>
            <a class="btn red-brder-btn" href="<?php echo $spotify_link; ?>" title="Spotify" target="_blank">Spotify</a>
          <?php } ?>
        </div>
        <?php if ( '' !== $desc ) {
          echo $desc;
        } ?>
        <a href="#resources" class="move-link futura-med">JUMP TO SERIES RESOURCES</a>
      </div>
    </div>
  </div>
</section>

<section id="list" class="sand-bg">
  <div class="container">
    <div class="row section-header text-center">
      <div class="col-12">
        <h2 class="grn-txt">Sermon List</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-11 mx-auto">
        <?php if($sermonQuery->have_posts()): ?>
            <?php while($sermonQuery->have_posts()) : $sermonQuery->the_post(); 
                  $author = get_the_author();
                  $date = get_the_date();
            ?> 
            <div class="sermon-row d-flex justify-content-between">
              <div class="sermon-row-info">
                <h3><?php the_title(); ?></h3>
                <p><strong><?php echo $date; ?></strong><span> / <?php echo $author; ?></span></a></p>
              </div>
              <div class="sermon-row-link middle-content">
                <div><a class="btn red-brder-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Sermon Details</a></div>
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

<?php if( $resource_rows || $resources_sub_header ) { ?>
<section id="resources">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-10 mx-auto">
        <div class="resource-top resource-row">
          <h2 class="grn-txt text-center">Resources for further study in this series.</h2>
          <?php if ($download_file) { ?>
            <div class="dwndld-file text-center"><a class="btn red-btn" href="<?php echo $download_file['url']; ?>" title="<?php echo $download_file['filename']; ?>">Download Worksheet</a></div>
          <?php } ?>
          <?php echo $resources_sub_header; ?>
        </div>
        <?php if( $resource_rows ) {
          foreach( $resource_rows as $resource_row ) { 
            $header = get_sub_field('header', $taxonomy . '_' . $id);
          ?>
            <div class="resource-row">
              <h3 class="grn-txt futura-med"><?php echo $resource_row['header']; ?></h3>
              <?php echo $resource_row['content']; ?>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php get_footer(); ?>