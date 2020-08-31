<?php 

//SCRIPTS & STYLES
function fyrechild_enqueue_styles() {    
// CHILD SCRIPTS   
    // CHILD.JS
    wp_enqueue_script('child-js', FYRECHILD_JS . '/child.js', array('jquery'), false, true);
    // WOW.JS
    wp_enqueue_script('wow', FYRECHILD_JS . '/wow.min.js', array('jquery'), false, true); 
    // GSAP
    wp_enqueue_script('gsap', FYRECHILD_JS . '/gsap.min.js', array(), false, true); 
    wp_enqueue_script('ScrollTrigger', FYRECHILD_JS . '/ScrollTrigger.min.js', array(), false, true); 
    
    // FONT AWESOME SELECT ICONS
    wp_enqueue_style('font-awesome-select', FYRECHILD_DIR . '/vendors/fontawesome/css/select-icons.css');

// PARENT/CHILD CSS
    // PARENT.CSS
    wp_enqueue_style('parentcss', FYRE_DIR . '/style.css');
    // CHILD.CSS   
    wp_enqueue_style( 'childcss', FYRECHILD_DIR . '/style.css', array( 'bs4', 'parentcss' ) );

// CHILD CSS PARTS
    wp_enqueue_style('main-menu', FYRECHILD_CSS . '/main-menu.css', array(), null );
    //wp_enqueue_style('mobile-menu', FYRECHILD_CSS . '/mobile-menu.css', array(), null, '(max-width:991px)' );
    wp_enqueue_style('footer', FYRECHILD_CSS . '/footer.css', array(), null );
    wp_enqueue_style('fonts', FYRECHILD_CSS . '/fonts.css', array( 'normalize' ), null );
    // ANIMATE.CSS
    wp_enqueue_style('animate', FYRECHILD_CSS . '/animate.css');

//PAGE SPECIFICS
    // FRONT PAGE   
    if ( is_front_page() ) {  
        wp_enqueue_style('home', FYRECHILD_CSS . '/home.css', array(), null);
        wp_enqueue_script('home-animations', FYRECHILD_JS . '/home-animations.js', array(), false, true); 
    }
    // CONNECT PAGE
    if ( is_page_template( 'connect.php' ) ) {
        wp_enqueue_style('connect', FYRECHILD_CSS . '/connect.css', array(), null );
        wp_enqueue_script('connect', FYRECHILD_JS . '/connect-animations.js', array(), false, true); 
    } 
    // SUNDAYS PAGE
    if ( is_page_template( 'sundays.php' ) ) {
        wp_enqueue_style('sundays', FYRECHILD_CSS . '/sundays.css', array(), null );
        wp_enqueue_script('sundays-animations', FYRECHILD_JS . '/sundays-animations.js', array(), false, true); 
    } 
    // ABOUT PAGE
    if ( is_page_template( 'about-us.php' ) ) {
        wp_enqueue_style('about-us', FYRECHILD_CSS . '/about-us.css', array(), null );
        wp_enqueue_script('about-us-animation', FYRECHILD_JS . '/about-us-animations.js', array(), false, true); 
        wp_enqueue_script( 'isotope', FYRECHILD_JS . '/isotope.pkgd.min.js', array(), false, true );
    }
    // GIVE PAGE
    if ( is_page_template( 'give.php' ) ) {
        wp_enqueue_style('give', FYRECHILD_CSS . '/give.css', array(), null );
        wp_enqueue_script('give-animations', FYRECHILD_JS . '/give-animations.js', array(), false, true); 
        
    } 
    // KIDS PAGE
    if ( is_page_template( 'kids.php' ) ) {
        wp_enqueue_style('kids', FYRECHILD_CSS . '/kids.css', array(), null );
        wp_enqueue_script('kids-animations', FYRECHILD_JS . '/kids-animations.js', array(), false, true); 
    } 
    // SERMONS PAGE
    if ( is_page_template( 'sermons.php' ) ) {
        wp_enqueue_style('sermons', FYRECHILD_CSS . '/sermons.css', array(), null );
        wp_enqueue_script('sermons-animations', FYRECHILD_JS . '/sermons-animations.js', array(), false, true); 
    } 
    // PODCASTS/SERMONS PAGE
    if ( is_taxonomy( 'sermon_series' ) || is_singular( 'sermons' ) || is_taxonomy( 'podcast_series' ) || is_singular( 'podcasts' )  ) {
        wp_enqueue_style('sermons-podcasts', FYRECHILD_CSS . '/sermons-podcasts.css', array(), null );
        wp_enqueue_script('cpts-animations', FYRECHILD_JS . '/cpts-animations.js', array(), false, true); 
    } 
}
add_action( 'wp_enqueue_scripts', 'fyrechild_enqueue_styles' );

// CRITICAL CSS
  function critical_css(){
    // CRITICAL PAGES
    echo '<style>'; 
      include get_stylesheet_directory() . '/assets/css/critical.css';
    echo '</style>';
  }
  add_action('wp_head', 'critical_css');
