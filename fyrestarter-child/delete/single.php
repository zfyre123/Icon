<?php get_header();

//POST ID
$post_id = get_the_ID();

//THUMBNAIL
$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

//AUTHOR INFO
$authID = get_the_author_meta( 'ID' );
$authImage = get_avatar_url( $authID );
$image_upload = get_field('image_upload', 'user_'. $authID );

//PARENT CAT
$category = get_the_category(); 
$category_parent_name = $category[0]->name;
$category_parent_slug = $category[0]->slug;
$category_parent_link = get_category_link( $category[0]->term_id );

//POPULAR PRODUCTS
$popularProductsArgs = array (
  'post_type' => 'product',
  'posts_per_page' => 20,
  //ADD BACK!!
  //'meta_key' => 'total_sales',
  //'meta_key' => 'rating',
  //'orderby' => 'meta_value_num'
);
$popularProductsQuery = new WP_Query( $popularProductsArgs );

//RELATED POSTS
$blogArgs = array (
  'order'=> 'DESC',
  'posts_per_page' => '3',
  'orderby' => 'post_date',
  'post__not_in' => array( $post_id ),
  'tax_query' => array( 
    array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $category_parent_slug,
    ),
  )
);
$blogQuery = new WP_Query( $blogArgs );

?>


<section id="post-header" class="middle-content cover-bg text-center fyrelazy wht-txt" <?php printf( ' data-background-image="%s"', $image_src[0] ); ?>>
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><?php echo get_the_title(); ?></h1>
        <p><?php echo get_the_date(); ?></p> 
      </div>
    </div>
  </div>
</section>

<section id="post">
  <div class="container">
      <div class="row">
          <article id="page-<?php the_ID(); ?>" class="col-12 content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
            <?php endif; ?>
          </article>
      </div>
      <!-- POST NAVIGATION -->
      <div class="row">
        <div class="col-lg-9 col-md-11 mx-auto">
          <div id="bottom-links-pages" class="d-flex justify-content-between"> 
            <?php if (strlen(get_next_post()->post_title) > 0) { ?>
              <?php next_post_link( '%link', '<i class="fa fa-angle-left"></i> <span>Previous Post</span>' ); ?>
            <?php wp_reset_postdata(); } else { ?>
              <a class="no-link article-link-btn" title=""><i class="fa fa-angle-left"></i> <span>Previous Post</span></a>
            <?php } ?>
            <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
              <?php previous_post_link( '%link', '<span>Next Post</span> <i class="fa fa-angle-right"></i>' ); ?>
            <?php wp_reset_postdata(); } else { ?>
              <a class="no-link article-link-btn" title=""><span>Next Post</span> <i class="fa fa-angle-right"></i></a>
            <?php } ?>
          </div> 
        </div>
      </div>
      <!-- POST NAVIGATION -->
  </div>
</section>




<?php get_footer(); ?>