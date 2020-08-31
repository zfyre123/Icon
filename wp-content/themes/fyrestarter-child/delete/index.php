<?php get_header();
 
$post_id = get_the_ID();

$thumbnail_id = get_post_thumbnail_id(56);
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

// set the "paged" parameter (use 'page' if the query is on a static front page)
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
 
// BLOG Query Args 
$args = array (
  'paged'          => $paged,
  'posts_per_page' => '3',
  'order'          => 'DESC',
  'ignore_sticky_posts' => 'true',
  'orderby'        => 'post_date'
);

// The Query
$query = new WP_Query( $args );
$max_num_pages = $query->max_num_pages;

?>


<section id="page-header" class="middle-content text-center cover-bg fyrelazy"  <?php printf( ' data-background-image="%s"', $image_src[0] ); ?>>
  <div class="overlay blu-bg"></div>
  <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Blog</h1>
        </div>
      </div>
    </div>  
</section>

<!-- blog -->
<section id="blog-main" class="pt-0 pb-0">
<!-- <?php 
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty'       => 1,
    'exclude' => '1'
) );     
if (count( $categories ) > 0) { ?>
  <ul id="blog-cats" class="d-flex flex-row justify-content-between hidden-md-down">
    <li><a href="/blog">All</a></li>
    <?php
      foreach ($categories as $cat) {
         $category_link = get_category_link($cat->cat_ID);
         echo '<li><a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a></li>';
      } ?>
  </ul>
  <div class="hidden-lg-up">
    <form id="cat_drop_form">
      <select id="cat_drop">
        <option value="none">Categories</option>
        <option value="0">All</option>
      <?php
        foreach ($categories as $cat) {
           $category_link = get_category_link($cat->cat_ID);
           echo '<option value="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</option>';
        }
      wp_reset_postdata(); ?>
      </select>
    </form>
    <script type="text/javascript">
      var dropdown = document.getElementById("cat_drop");
      function onCatChange() {
          if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
              location.href = "<?php echo home_url();?>/category/"+dropdown.options[dropdown.selectedIndex].value+"/";
          }
          if ( dropdown.options[dropdown.selectedIndex].value = 0 ) {
              location.href = "<?php echo home_url();?>/blog";
          }
          var optionSelected = $("option:selected", this);
          var valueSelected = this.value;
      }
      dropdown.onchange = onCatChange;
    </script>
  </div>
<?php } ?> -->
  <div class="container-fluid">
      <?php if($query->have_posts()): 
          //vars
          $counter = 0; 
        ?>
          <?php    
            while ( $query->have_posts() ) : $query->the_post();
            //vars
            $counter++;
            // post image
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0]; 
            // set default post image if none
            // add_option( 'my_default_pic3', '/wp-content/uploads/2018/02/DSC_0327.jpg', '', 'yes' );
            // if (has_post_thumbnail( $post->ID ) ){
            //   $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; 
            // } 
            // else {
            //   $image = get_option( 'my_default_pic3' );
            // }
          ?>
            <?php if ($counter % 2 != 0) { ?>
              <div class="row blog-row row-eq-height">
                <div class="col-lg-6 blog-main-left middle-content">
                  <div class="blog-main-txt">
                    <p><?php echo get_the_date(); ?></p>                    
                    <h2 class="blog-post-title gld-txt"><?php the_title(); ?></h2>
                    <!-- <div class="blog-cats"><?php the_category(''); ?></div>  -->
                    <div class="blog-excerpt"><?php the_excerpt(); ?></div>
                    <div>
                      <a class="btn gld-btn more-link-post" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 cover-bg blog-main-img fyrelazy" data-background-image="<?php echo $image; ?>">
                </div>
              </div>
            <?php } else { ?>
              <div class="row blog-row row-eq-height">
                <div class="col-lg-6 push-lg-6 middle-content">
                  <div class="blog-main-txt">
                    <p><?php echo get_the_date(); ?></p>                    
                    <h2 class="blog-post-title gld-txt"><?php the_title(); ?></h2>
                    <!-- <div class="blog-cats"><?php the_category(''); ?></div>  -->
                    <div class="blog-excerpt"><?php the_excerpt(); ?></div>
                    <div>
                      <a class="btn gld-btn more-link-post" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">Read More</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 pull-lg-6 cover-bg blog-main-img fyrelazy" data-background-image="<?php echo $image; ?>">
                </div>
              </div>
            <?php } ?>
          <?php endwhile; ?>
      <?php endif; wp_reset_postdata(); ?>

      <?php if ($max_num_pages != 1) { ?>
        <div id="load-more" class="row">
          <a id="load_more_stories" class="more-link load-more btn gld-btn" title="Load More Posts">Load More</a>
        </div>
      <?php } ?>
  </div>
</section>
<!-- blog -->

<script>

   var Page = 1;
   var counter = 0;

   function load_more_stories() {
    jQuery.getJSON( "https://"+window.location.hostname+"/wp-json/custom_rest_routes/v1/load_more_stories/"+(Page+1), function( data ) {
      //alert(data);
      var json_data = JSON.parse(data);
      Page = parseInt(json_data[0]);
      Max_Num_Pages = parseInt(json_data[2]);

      
      if (Page >= Max_Num_Pages) {
        jQuery("#load-more").hide();
      }
       var more_stories_html = "";
       jQuery.each(json_data[1], function( index, story ) {

        counter++;

        if (counter % 2 != 0) { 

              more_stories_html += "<div class='row blog-row row-eq-height wow fadeIn' data-wow-delay='0s' style='animation-delay:0s; animation-name: fadeIn;'>";
                more_stories_html += "<div class='col-lg-6 push-lg-6 middle-content'>";
                  more_stories_html += "<div class='blog-main-txt'>";
                    more_stories_html += "<p>"+story['date']+"</p>";                  
                    more_stories_html += "<h2 class='blog-post-title gld-txt'>"+story['title']+"</h2>";
                    // more_stories_html +=  '<div class="blog-cats">'+story['category']+'</div>'; 
                    more_stories_html += "<div class='blog-excerpt'>"+story['excerpt']+"</div>";
                    more_stories_html += "<div>";
                      more_stories_html += "<a class='btn gld-btn more-link-post location-btn' href='"+story['permalink']+"'>Read More<span></span></a>";
                    more_stories_html += "</div>";
                  more_stories_html += "</div>";
                more_stories_html += "</div>";
                more_stories_html += "<div class='col-lg-6 pull-lg-6 cover-bg blog-main-img' style='background-image:url("+story['thumbnail_image']+");'>";
                more_stories_html += "</div>";
              more_stories_html += "</div>";

          } else { 

              more_stories_html += "<div class='row blog-row row-eq-height wow fadeIn' data-wow-delay='0s' style='animation-delay:0s; animation-name: fadeIn;'>";
                more_stories_html += "<div class='col-lg-6 middle-content'>";
                  more_stories_html += "<div class='blog-main-txt'>";
                    more_stories_html += "<p>"+story['date']+"</p>";                  
                    more_stories_html += "<h2 class='blog-post-title gld-txt'>"+story['title']+"</h2>";
                    // more_stories_html +=  '<div class="blog-cats">'+story['category']+'</div>'; 
                    more_stories_html += "<div class='blog-excerpt'>"+story['excerpt']+"</div>";
                    more_stories_html += "<div>";
                      more_stories_html += "<a class='btn gld-btn more-link-post location-btn' href='"+story['permalink']+"'>Read More<span></span></a>";
                    more_stories_html += "</div>";
                  more_stories_html += "</div>";
                more_stories_html += "</div>";
                more_stories_html += "<div class='col-lg-6 cover-bg blog-main-img' style='background-image:url("+story['thumbnail_image']+");'>";
                more_stories_html += "</div>";
              more_stories_html += "</div>";

          } 


          });
      jQuery("#load-more").before(more_stories_html);
      max_height = 0;
      jQuery(".page"+Page).each(function(index) {
        if(jQuery(this).height() > max_height) {
          max_height = jQuery(this).height();
        }
      });
      jQuery(".page"+Page).height(max_height);
   });
   }

   jQuery(document).ready(function($) {
     jQuery("#load_more_stories").click(function (event) {
         event.preventDefault();
        load_more_stories();
     });
   });

</script>

<?php get_footer();?>