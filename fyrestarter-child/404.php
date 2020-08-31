<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();

?>

<section id="page-header" class="middle-content grn-bg wht-txt text-center">
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Error: 404</h1>
        </div>
      </div>
    </div>  
</section>

<section id="error-page">
  <div class="container wide-container">
      <div class="row">
        <article id="page-<?php the_ID(); ?>" class="col-xl-8 col-lg-9 col-md-10 mx-auto content">
          <div class="text-center">
          <h3>Sorry! That page cannot be found.</h3>
          &nbsp;
          <div class="flex-btn">
            <a class="btn red-btn" href="<?php echo get_home_url(); ?>">Back To Home</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<?php get_footer(); ?>