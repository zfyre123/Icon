<?php

// TEAM Query Args
$teamArgs = array (
  'post_type' => 'team_members',
  'posts_per_page' => -1,
  'orderby' => 'rand',
);
// The Query
$teamQuery = new WP_Query( $teamArgs );

?>

<div id="team-filter">
	<div class="filter-select">

		<div class="listed-filters">
		  <ul class="filters filter-button-group d-flex justify-content-center">
		    <li class="active" data-filter="*"><span>All</span></li>
			<?php
		    $custom_terms = $custom_terms = get_terms( array( 
			    'taxonomy' 	 => 'team_member_type',
			    'hide_empty' => true,
			) );
			foreach($custom_terms as $custom_term) { ?>
				<li data-filter=".<?php echo $custom_term->slug; ?>"><span><?php echo $custom_term->name; ?></span></li>
			<?php } wp_reset_postdata(); ?>
		  </ul>
		</div>
	</div>
	<div class="team-members grid row">
		<?php if($teamQuery->have_posts()): ?>
		  <?php $counter = 0; ?>
			<?php while($teamQuery->have_posts()) : $teamQuery->the_post();
				//vars
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'team-thumb' )[0];
				$terms = get_the_terms( $post, 'team_member_type' ); 
			?>
			<?php $counter++; ?> 
			 	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 team-member grid-item text-center <?php the_title(); ?> <?php foreach($terms as $term) { echo $term->slug, ' ';} ?>">
					<div class="team-img cover-bg fyrelazy" style="background-image:url(<?php echo $image; ?>);">
						<div class="team-img-inner hidden-sm-down">
							<h4><?php the_title(); ?></h4>
							<p><?= get_field('position'); ?></p>	
						</div>
					</div>
					<div class="team-info hidden-md-up wht-txt">
						<h4><?php the_title(); ?></h4>
						<p><?= get_field('position'); ?></p>						
					</div>					
				</div>

				<?php 
					$number = array('2', '3', '4');
					$random_number = array_rand($number);
					if( $counter%$number[$random_number] == 0 && $counter != 1 ) { 
					    $space_images = array('/wp-content/uploads/2020/07/circle-box.png', '/wp-content/uploads/2020/07/dot-box.png', '/wp-content/uploads/2020/07/dash-box.png');
					    $random_image = array_rand($space_images);
					?>
				 	<div class="col-xl-3 col-lg-4 col-md-6 team-member grid-item blank-space navy-bg hidden-sm-down">
						<div class="team-img cover-bg fyrelazy" style="background-image:url(<?php echo $space_images[$random_image]; ?>);"></div>
					</div>					
				<?php } ?>
			<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
	</div>

</div>

<script type="text/javascript">
jQuery(document).ready(function($) {	
// external js: isotope.pkgd.js

	$('.grid').isotope({
	  itemSelector: '.grid-item',
	});

	// filter items on button click
	$('.filter-button-group').on( 'click', 'li', function() {
	  var filterValue = $(this).attr('data-filter');
	  $('.grid').isotope({ filter: filterValue });
	  $('.filter-button-group li').removeClass('active');
	  $(this).addClass('active');
	});


}); 	
</script>