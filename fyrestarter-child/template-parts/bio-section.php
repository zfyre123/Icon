<?php

// TEAM Query Args
$teamArgs = array (
  'post_type' => array('team_members', 'shout_outs'),
  'posts_per_page' => '1',
  'orderby' => 'rand',
  'tax_query' => array(
      array(
          'taxonomy' => 'display_bio_section',
          'field' => 'slug',
          'terms' => 'display',
      ),
  ),
);
// The Query
$teamQuery = new WP_Query( $teamArgs );

?>
<section id="bio-section" class="sand-bg">
  <div class="container">
    <div class="row">
		<?php if($teamQuery->have_posts()): ?>
        	<?php while($teamQuery->have_posts()) : $teamQuery->the_post();
				//vars
        		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' )[0]; 
        	?> 
            <div class="col-lg-7 offset-lg-1 push-lg-4 col-md-6 push-md-6">
              <div class="bio-img cover-bg fyrelazy" style="background-image:url(<?php echo $image; ?>);"><img src="/wp-content/uploads/2020/08/drk-arrow-down.png"></div>
            </div>
        	 	<div class="col-lg-4 pull-lg-8 col-md-6 pull-md-6">
        			<h2 class="grn-txt">Hi there!<br> I'm <?php the_title(); ?>.</h2>
        		 	<?php the_content(); ?>
        			<?php if (get_field('instagram_link')) { ?>
        				<a class="btn red-btn" href="<?= get_field('instagram_link'); ?>" title="Instagram">Instagram</a>
        			<?php } ?>
        		</div>
	        <?php endwhile; ?>
  		<?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

