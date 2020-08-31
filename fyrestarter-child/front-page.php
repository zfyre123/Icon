<?php

$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

//LATEST SERMON
$sermonArgs = array (
  'order'=> 'DESC',
  'orderby' => 'post_date',
  'posts_per_page' => '1',
  'post_type' => 'sermons'
);
//QUERY
$sermonQuery = new WP_Query( $sermonArgs );

//LATEST PODCAST
$podcastArgs = array (
  'order'=> 'DESC',
  'orderby' => 'post_date',
  'posts_per_page' => '1',
  'post_type' => 'podcasts'
);
//QUERY
$podcastQuery = new WP_Query( $podcastArgs );

get_header(); ?>

<section id="home" class="sand-bg">
  	<div class="container">
	    <div class="row">
	      <div class="col-12">
	      	<div class="hero-img cover-bg fyrelazy" <?php printf( 'style="background-image:url(%s)"', $image_src[0] ); ?>></div>
	      </div>
	    </div>
	</div>
    <div class="container">
	    <div class="row">
	    	<div class="col-xl-8 push-xl-4 col-lg-11 push-lg-1">
		    	<div class="hero-box navy-bg">
		        	<h1 class="sky-txt"><?= get_field('main_header') ?></h1>
		        </div>
	    	</div>
	    	<div class="col-xl-4 pull-xl-8 col-lg-6 col-md-9 col-sm-10 col-xs-10">
	    		<div class="hero-txt">
	    			<?= get_field('top_content') ?>
	    			<a class="btn red-btn" href="<?= get_field('top_button_link') ?>"><?= get_field('top_button_text') ?></a>
	    		</div>
	    	</div>
	    </div>
	</div>
<img class="dots-home" src="/wp-content/uploads/2020/07/dots-horizontal-gry.png">
<div class="trigger">trigger</div>
</section>

<section id="every-sunday" class="grn-bg">
  	<div class="container wide-container">
  		<div class="row">
  			<div class="col-lg-11">
			    <div class="row">
			      	<div class="col-xl-6 col-lg-9 col-md-9 col-sm-10 col-xl-10">
			      		<div class="sunday-imgs">
				      		<img class="church" src="/wp-content/uploads/2020/07/corinthians.jpg">
				      		<img class="dashes" src="/wp-content/uploads/2020/07/dashes-vertical-blk.png">
			      		</div>
			      	</div>
			     	<div class="col-xl-6 offset-xl-6 col-lg-8 offset-lg-4 offset-mg-3 col-md-9 col-sm-10 offset-sm-2 col-xs-10 offset-xs-2 middle-content">
			     		<div class="sunday-content">
					      	<div class="wht-txt">
					      		<?= get_field('every_sunday_content') ?>
					      	</div>
					      	<div class="btns">
						    	<div class="flex-btn"><a class="btn wht-btn" href="/sundays/">Sundays</a></div>
						    	<?php if($day === 'Sun' || 1 == get_option('livestream_display')) { ?>
				                    <div class="flex-btn"><a class="btn wht-btn" href="<?php echo get_option('livestream_url'); ?>">Live Sermon</a></div>  
				                <?php } ?>    	
					      	</div>
					    </div>
			      	</div>
			    </div>
			</div>
		</div>
  	</div>
<div class="trigger">trigger</div>
</section>

<section id="banner" class="pt-0 pb-0">
  <div class="container wide-container">
    <div class="row">
      <div class="col-12">
      	<div class="banner-img cover-bg fyrelazy" style="background-image:url(<?= get_field('banner_image') ?>)">
      		<img class="banner-logo" src="/wp-content/uploads/2020/07/MONOGRAM-blk.png">
      		<img class="banner-dots" src="/wp-content/uploads/2020/07/dots-vertical-wht.png">
      	</div>
      </div>
    </div>
  </div>
<div class="trigger">trigger</div>
</section>

<section id="sermons-podcasts" class="text-center">
  <div class="container">
    <div class="row section-header">
      <div class="col-lg-11 mx-auto">
      	<h2 class="section-header">Listen to the latest<br> sermon or podcast.</h2>
      	<a class="btn red-btn" href="/sermons/">Sermons</a>
      </div>
   	</div>
   	<div class="row">
      <div class="col-lg-9 mx-auto">
      	<div class="row">
      		<div class="col-xl-6">
	      		<?php if($sermonQuery->have_posts()): ?>
		            <?php while($sermonQuery->have_posts()) : $sermonQuery->the_post(); 
	                    if ( !empty(get_the_post_thumbnail())) {
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' )[0]; 
	                    } else {
	                        $image = '';
	                    }
	                    $terms = get_the_terms( $post, 'sermon_series' );
		            ?> 
		            	<div class="post-col text-center">
		            		<p class="uppercase futura-med">Current Sermon Series<br><?php echo $terms[0]->name; ?></p>
		            		<div class="post-col-img fyrelazy" style="background-image:url(<?php echo $image; ?>);"></div>
		            		<div class="below-head-shot-info">
		            			<p><?php echo get_the_date(); ?></p>
			            		<p class="book-bold"><?php the_title(); ?></p>
			            		<a class="btn red-brder-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Sermon Details</a>
			            	</div>
		            	</div>
		        	<?php endwhile; ?>
	      		<?php endif; wp_reset_query(); ?>
      		</div>
      		<div class="col-xl-6">
	      		<?php if($podcastQuery->have_posts()): ?>
		            <?php while($podcastQuery->have_posts()) : $podcastQuery->the_post(); 
	                    if ( !empty(get_the_post_thumbnail())) {
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'large' )[0]; 
	                    } else {
	                        $image = '';
	                    }
	                    $terms = get_the_terms( $post, 'podcast_series' );
	                    $first_term = $terms[0];
						$post_term = $first_term->slug;
						$post_term_name = $first_term->name;

						$totalTerms = wp_count_terms( 'podcast_series', array(
						    'hide_empty'=> false,
						    'parent'    => 0
						) );

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
		            ?> 
		            	<div class="post-col text-center">
		            		<p class="uppercase futura-med">Podcast Season <?php echo $totalTerms; ?><br><?php echo $terms[0]->name; ?></p>
		            		<div class="post-col-img fyrelazy" style="background-image:url(<?php echo $image; ?>);"></div>
		            		<div class="below-head-shot-info">
		            			<p><?php echo get_the_date(); ?></p>
			            		<p class="book-bold">Ep.<?php echo $episode; ?> <?php the_title(); ?></p>
			            		<a class="btn red-brder-btn" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Podcast Details</a>
			            	</div>
		            	</div>
		        	<?php endwhile; ?>
	      		<?php endif; wp_reset_query(); ?>
      		</div>
      	</div>
      </div>
    </div>
  </div>
<div class="trigger">trigger</div>
</section>

<section id="people" class="sand-bg pb-0">
  <div class="container">
    <div class="row">
      <div class="people-header col-lg-8">
      	<h2 class="grn-txt"><?= get_field('people_header') ?></h2>
      	<div class="btns hidden-lg-down">
      		<a class="btn red-btn" href="/connect/">Connect</a>
      		<?php if (!empty(get_option('ig_url'))) { ?>
      			<a class="btn red-btn" href="<?php echo get_option('ig_url'); ?>" target="_blank">Instagram</a>
      		<?php } ?>
      	</div>
      </div>
    </div>
    <div class="row">
    	<div class="col-12">
	        <?php $images = get_field('people_gallery'); if( $images ): ?>
	          <div class="people-gallery">
	            <?php foreach( $images as $image ): ?>
	              <div class="single-person cover-bg center-bg" style="background-image: url('<?php echo esc_url($image['sizes']['large']); ?>');"></div>
	            <?php endforeach; ?>
	          </div>
	        <?php endif; ?>
    	</div>
    </div>
    <div class="row hidden-xl-up">
    	<div class="col-12">
    		<div class="btns justify-content-center d-flex">
	      		<div class="flex-btn"><a class="btn red-btn" href="/connect/">Connect</a></div>
	      		<?php if (!empty(get_option('ig_url'))) { ?>
	      			<div class="flex-btn"><a class="btn red-btn" href="<?php echo get_option('ig_url'); ?>" target="_blank">Instagram</a></div>
	      		<?php } ?>
	      	</div>
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
<div class="trigger">trigger</div>
</section>

<?php get_footer(); ?> 