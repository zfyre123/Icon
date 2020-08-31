<?php
// CHILD THEME URI CONSTANTS
define( 'FYRECHILD_DIR', get_stylesheet_directory_uri() );
define( 'FYRECHILD_PATH', get_stylesheet_directory() );
define( 'FYRECHILD_JS', FYRECHILD_DIR . '/assets/js' );
define( 'FYRECHILD_CSS', FYRECHILD_DIR . '/assets/css' ); 
define( 'FYRECHILD_INCLUDES' , FYRECHILD_PATH . '/inc' ); 
define( 'FYRECHILD_TEMPLATES' , FYRECHILD_PATH . '/template-parts' ); 
define( 'FYRECHILD_SHORTCODES' , FYRECHILD_INCLUDES . '/shortcodes' );  
 
// INCLUDES
include FYRECHILD_INCLUDES . '/theme-styles-scripts.php';

include FYRECHILD_INCLUDES . '/theme-global-functions.php';    

include FYRECHILD_INCLUDES . '/theme-menus.php';

include FYRECHILD_INCLUDES . '/blog.php';

include FYRECHILD_INCLUDES . '/custom-post-types.php';

class all_terms
{
    public function __construct()
    {
        $version = '2';
        $namespace = 'wp/v' . $version;
        $base = 'all-terms';
        register_rest_route($namespace, '/' . $base, array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_terms'),
        ));
    }

    public function get_all_terms($object)
    {
        $return = array();
		// $return['categories'] = get_terms('category');
		// $return['tags'] = get_terms('post_tag');
		// Get taxonomies
        $args = array(
            'public' => true,
            '_builtin' => false
        );
        $output = 'names'; // or objects
        $operator = 'and'; // 'and' or 'or'
        $taxonomies = get_taxonomies($args, $output, $operator);
        foreach ($taxonomies as $key => $taxonomy_name) {
            if($taxonomy_name = $_GET['term']){
            $return = get_terms($taxonomy_name);
        }
        }
        return new WP_REST_Response($return, 200);
    }
}

add_action('rest_api_init', function () {
    $all_terms = new all_terms;
});

function get_posts_via_rest() {

	// Initialize variable.
	$allposts = '';
	
	// Enter the name of your blog here followed by /wp-json/wp/v2/posts and add filters like this one that limits the result to 2 posts.
	// posts
	// $response = wp_remote_get( 'https://icondevsite.wpengine.com/wp-json/wp/v2/sermons' );
	// post taxonomis
	$response = wp_remote_get( 'https://icondevsite.wpengine.com/wp-json/wp/v2/all-terms?term=sermon_series' );
	

	// Exit if error.
	if ( is_wp_error( $response ) ) {
		return;
	}

	// Get the body.
	$taxonomies = json_decode( wp_remote_retrieve_body( $response ) );

	// Exit if nothing is returned.
	if ( empty( $taxonomies ) ) {
		return;
	}

	// If there are posts.
	if ( ! empty( $taxonomies ) ) {

		// For each post.
		foreach ( $taxonomies as $taxonomie ) {
			
			// Use print_r($post); to get the details of the post and all available fields
			// Format the date.
			$fordate = date( 'Y', strtotime( $taxonomie->modified ) );
			$year = get_the_date( 'Y' );

			// Format html
			$allposts .= '
			<div class="series-item col-lg-12">
				<div class="series-inner">
					<div class="series-bg cover-bg" style="background-image: url(' . esc_html( get_field('image_upload', 'sermon_series' . '_' . $taxonomie->term_id) ) . ')"></div>
					<a style="position: absolute" href="' . esc_html( $taxonomie->slug ) . '" title="' . esc_html( $taxonomie->name ) . '"></a>
				</div>
				<p><a href="' . esc_html( $taxonomie->slug ) . '" title="' . esc_html( $taxonomie->name ) . '"><strong>' . esc_html( $taxonomie->name ) . '</strong>/ ' . $year . '</a></p>
				<a class="red-txt" href="' . esc_html( $taxonomie->slug ) . '">View Series</a>
			</div>';
			// Add post dots
			$appendPostDots = '<div class="slider-controls" style="display: flex; align-items: end; justify-content: center; margin: 20px;"><i class="fas fa-chevron-left slide-m-prev" style="font-size: 30px; margin-right: 10px;"></i><div class="slide-m-dots"></div><i class="fas fa-chevron-right slide-m-next" style="font-size: 30px; margin-left: 10px;"></i></div>';
			// Add wrapper to formatted posts
			$postWrapper = '<div id="carousel" class="row slider">' . $allposts . '</div>' . $appendPostDots;
			
		}

		return $postWrapper;
	}
}
// Register as a shortcode to be used on the site.
add_shortcode( 'sc_get_posts_via_rest', 'get_posts_via_rest' );


