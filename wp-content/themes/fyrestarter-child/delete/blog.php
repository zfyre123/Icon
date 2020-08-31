<?php

function exclude_category( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-1' );
        }
  }
add_action( 'pre_get_posts', 'exclude_category' );


function custom_excerpt_length( $length ) {
  if ( is_front_page() ) :
      return 10;
  else :
      return 30;
  endif;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
  //return '.. <a class="more-link" href="' . get_permalink() . '">Read More</a>';
  return '..';
}
add_filter('excerpt_more', 'new_excerpt_more');


/** add this to your function.php child theme to remove ugly shortcode on excerpt */
 
if(!function_exists('remove_vc_from_excerpt'))  {
  function remove_vc_from_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
  add_filter( 'get_the_excerpt', 'remove_vc_from_excerpt' );
}
 

// add_filter('next_post_link', 'post_link_attributes');
// add_filter('previous_post_link', 'post_link_attributes');

// function post_link_attributes($output) {
//     $code = 'class="btn ylw-txt article-link-btn"';
//     return str_replace('<a href=', '<a '.$code.' href=', $output);
// }

// add_filter( 'get_the_archive_title', function ($title) {    
//     if ( is_category() ) {    
//             $title = single_cat_title( '', false );    
//         } elseif ( is_tag() ) {    
//             $title = single_tag_title( '', false );    
//         } elseif ( is_author() ) {    
//             $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
//         } elseif ( is_tax() ) { //for custom post types
//             $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
//         } elseif (is_post_type_archive()) {
//             $title = post_type_archive_title( '', false );
//         }
//     return $title;    
// });

function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


//to handle ajax for load_more_stories
function load_more_stories($data) {
  

  $paged = $data["Page"] ? $data["Page"] : '1';

  $args = array (
            'paged'          => $paged,
            'posts_per_page' => '3',
            'order'          => 'DESC',
            'ignore_sticky_posts' => 'true',
            'orderby'        => 'post_date'
          );

  $query = new WP_Query( $args );

  $max_num_pages = $query->max_num_pages;

  $ary = [];

  //add_option( 'my_default_pic3', '/wp-content/uploads/2018/12/Mystic-Heights-Entrance-blog-defualt.jpg', '', 'yes' );

  while ( $query->have_posts() ) {

    $query->the_post();
    $story = new stdClass;
    $story->title = get_the_title();
    //$story->cats = the_category();
    $story->date = get_the_date();
    $story->excerpt = get_the_excerpt();
    // $story->content = get_the_content();
    
    ob_start();
    the_category('');
    $story->category = ob_get_clean();

    if (has_post_thumbnail( get_the_ID()) ){
        $story->thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0]; 
    } 
    // else {
    //     $story->thumbnail_image = get_option( 'my_default_pic1' );
    // }

    $story->permalink = get_permalink();
    $ary[] = $story;
  }

  return json_encode([$paged, $ary, $max_num_pages]);
}

function load_more_categorized_stories($data) {

  $paged = $data["Page"] ? $data["Page"] : '1';

  $args = array (
            'paged'          => $paged,
            'posts_per_page' => '3',
            'order'          => 'DESC',
            'ignore_sticky_posts' => 'true',
            'orderby'        => 'post_date'
          );

  if($data["Taxonomy"] == "category") {
    $args['category_name'] = $data["Slug"];
  } else if ($data["Taxonomy"] == "post_tag") {
    $args['tag'] = $data["Slug"];
  }

  $query = new WP_Query( $args );

  $max_num_pages = $query->max_num_pages;

  $ary = [];

  //add_option( 'my_default_pic3', '/wp-content/uploads/2018/12/Mystic-Heights-Entrance-blog-defualt.jpg', '', 'yes' );

  while ( $query->have_posts() ) {
    $query->the_post();
    $story = new stdClass;
    $story->title = get_the_title();
    //$story->cats = the_category();
    $story->date = get_the_date();
    $story->excerpt = get_the_excerpt();

    ob_start();
    the_category('');
    $story->category = ob_get_clean();

    if (has_post_thumbnail( get_the_ID()) ){
        $story->thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0]; 
    } 
    // else {
    //     $story->thumbnail_image = get_option( 'my_default_pic1' );
    // }

    $story->permalink = get_permalink();
    $ary[] = $story;
  }

  return json_encode([$paged, $ary, $max_num_pages]);
}



add_action( 'rest_api_init', function () {

  register_rest_route( 'custom_rest_routes/v1', '/load_more_stories/(?P<Page>\d+)', array(
   'methods' => 'GET',
   'callback' => 'load_more_stories'
  ));

  register_rest_route( 'custom_rest_routes/v1', '/load_more_categorized_stories/(?P<Page>\d+)/(?P<Taxonomy>.+)/(?P<Slug>.+)', array(
   'methods' => 'GET',
   'callback' => 'load_more_categorized_stories'
  ));

});
