<?php

$post_id = get_the_ID();

get_header();?>

<?php include FYRECHILD_TEMPLATES . '/page-header.php'; ?>

<section id="page">
	<div class="container">
	  	<div class="row">
	  		<article id="page-<?php the_ID(); ?>" class="col-xl-8 col-lg-9 col-md-10 mx-auto content">		
				<?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
					 	echo the_content(); 
					endwhile; 
				endif; ?>
			</article>
		</div>
	</div>
</section>   

<?php get_footer(); ?>