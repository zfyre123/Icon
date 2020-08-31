<?php 

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

?>

<section id="page-header" class="middle-content grn-bg wht-txt text-center">
<!--   <div class="fill-bg cover-bg thebg" style="background-image:url(<?= $image_src[0] ?>);"></div>
  <div class="overlay <?php the_field('overlay_color'); ?>"></div> -->
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h1><?php echo get_the_title(); ?></h1>
        </div>
      </div>
    </div>  
</section>