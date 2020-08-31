<?php 

// MENUS
    add_action( 'after_setup_theme', 'register_primary_menu' );
     
    function register_primary_menu() {
        register_nav_menu( 'mobile-menu', __( 'Mobile Menu', 'fyrestarter' ) );
        register_nav_menu( 'footer-menu', __( 'Footer Menu', 'fyrestarter' ) );
        register_nav_menu( 'copy-menu', __( 'Copy Menu', 'fyrestarter' ) );
        register_nav_menu( 'shop-menu', __( 'Shop Menu', 'fyrestarter' ) );
    }

    // MOBILE MENU
    function fyre_mobile_menu() {
      $options = array(
            'theme_location' => 'mobile-menu',
            'echo' => false,
            'container' => false,
            'menu_id' => 'mobile-menu-nav',
            'fallback_cb'=> 'default_page_menu'
        ); 

        $menu = wp_nav_menu($options);

        echo $menu;
    } 
    // FOOTER MENU
    function fyre_footer_menu() {
      $options = array(
            'theme_location' => 'footer-menu',
            'echo' => false,
            'container' => false,
            'menu_id' => 'footer-menu-nav',
            'fallback_cb'=> 'default_page_menu'
        ); 

        $menu = wp_nav_menu($options);

        echo $menu;
    } 
    // FOOTER COPY MENU
    function fyre_copy_menu() {
      $options = array(
            'theme_location' => 'copy-menu',
            'echo' => false,
            'container' => false,
            'menu_id' => 'copy-menu-nav',
            'fallback_cb'=> 'default_page_menu'
        ); 

        $menu = wp_nav_menu($options);

        echo $menu;
    } 
        // FOOTER COPY MENU
    function fyre_shop_menu() {
      $options = array(
            'theme_location' => 'shop-menu',
            'echo' => false,
            'container' => false,
            'menu_id' => 'shop-menu-nav',
            'fallback_cb'=> 'default_page_menu'
        ); 

        $menu = wp_nav_menu($options);

        echo $menu;
    } 


