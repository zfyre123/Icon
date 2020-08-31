<?php

//SERMONS

// register the new post type
register_post_type( 'sermons', array( 
    'labels'                 => array(
        'name'               => __( 'Sermons' ),
        'singular_name'      => __( 'Sermon' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Create New Sermon' ),
        'edit'               => __( 'Edit' ),
        'edit_item'          => __( 'Edit Sermon' ),
        'new_item'           => __( 'New Sermon' ),
        'view'               => __( 'View Sermons' ),
        'view_item'          => __( 'View Sermon' ),
        'search_items'       => __( 'Search Sermons' ),
        'not_found'          => __( 'No Sermons found' ),
        'not_found_in_trash' => __( 'No Sermons found in trash' ),
        'parent'             => __( 'Parent Sermon' ),
    ),
    'description'           => __( 'Sermons' ),
    'public'                => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'capability_type'       => 'post',
    'exclude_from_search'   => true,
    'has_archive'           => false,
    'publicly_queryable'  => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-controls-volumeon',
    'hierarchical'          => true,
    '_builtin'              => false, // It's a custom post type, not built in!
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'sermons/%sermon_series%', 'with_front' => false ),
    'supports'              => array( 'title', 'editor', 'custom-fields', 'revisions', 'thumbnail', 'author' ),
) );

function sermons_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'sermons' ){
        $terms = wp_get_object_terms( $post->ID, 'sermon_series' );
        if( $terms ){
            return str_replace( '%sermon_series%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'sermons_permalinks', 1, 2 );


add_action( 'init', 'create_sermons_taxonomies', 0 );
function create_sermons_taxonomies() {
    $labels = array(
        'name'              => _x( 'Sermon Series', 'taxonomy general name' ),
        'singular_name'     => _x( 'Sermon Series', 'taxonomy singular name' ),
        'search_items'      =>  __( 'Search Sermon Series' ),
        'all_items'         => __( 'All Sermon Seriess' ),
        'parent_item'       => __( 'Parent Sermon Series' ),
        'parent_item_colon' => __( 'Parent Sermon Series:' ),
        'edit_item'         => __( 'Edit Sermon Series' ), 
        'update_item'       => __( 'Update Sermon Series' ),
        'add_new_item'      => __( 'Add New Sermon Series' ),
        'new_item_name'     => __( 'New Sermon Series Name' ),
        'menu_name'         => __( 'Sermon Series' ),
    );  
    register_taxonomy( 'sermon_series', array( 'sermons' ), array(
        'hierarchical'  => true,
        'labels'        => $labels,
        'show_ui'       => true,
        'query_var'     => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'rewrite' => array('slug' => 'sermons', 'with_front' => false)
    ) );
}

//PODCASTS

// register the new post type
register_post_type( 'podcasts', array( 
    'labels'                 => array(
        'name'               => __( 'Podcasts' ),
        'singular_name'      => __( 'Podcast' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Create New Podcast' ),
        'edit'               => __( 'Edit' ),
        'edit_item'          => __( 'Edit Podcast' ),
        'new_item'           => __( 'New Podcast' ),
        'view'               => __( 'View Podcasts' ),
        'view_item'          => __( 'View Podcast' ),
        'search_items'       => __( 'Search Podcasts' ),
        'not_found'          => __( 'No Podcasts found' ),
        'not_found_in_trash' => __( 'No Podcasts found in trash' ),
        'parent'             => __( 'Parent Podcast' ),
    ),
    'description'           => __( 'Podcasts' ),
    'public'                => true,
    'show_ui'               => true,
    'capability_type'       => 'post',
    'exclude_from_search'   => true,
    'has_archive'           => false,
    'publicly_queryable'  => true,
    'menu_position'         => 10,
    'menu_icon'             => 'dashicons-controls-volumeon',
    'hierarchical'          => true,
    '_builtin'              => false, // It's a custom post type, not built in!
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'podcasts/%podcast_series%', 'with_front' => false ),
    'supports'              => array( 'title', 'editor', 'custom-fields', 'revisions', 'thumbnail', 'author' ),
) );

function podcasts_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'podcasts' ){
        $terms = wp_get_object_terms( $post->ID, 'podcast_series' );
        if( $terms ){
            return str_replace( '%podcast_series%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'podcasts_permalinks', 1, 2 );

add_action( 'init', 'create_podcasts_taxonomies', 0 );
function create_podcasts_taxonomies() {
    $labels = array(
        'name'              => _x( 'Podcast Season', 'taxonomy general name' ),
        'singular_name'     => _x( 'Podcast Season', 'taxonomy singular name' ),
        'search_items'      =>  __( 'Search Podcast Season' ),
        'all_items'         => __( 'All Podcast Seasons' ),
        'parent_item'       => __( 'Parent Podcast Season' ),
        'parent_item_colon' => __( 'Parent Podcast Season:' ),
        'edit_item'         => __( 'Edit Podcast Season' ), 
        'update_item'       => __( 'Update Podcast Season' ),
        'add_new_item'      => __( 'Add New Podcast Season' ),
        'new_item_name'     => __( 'New Podcast Season Name' ),
        'menu_name'         => __( 'Podcast Season' ),
    );  
    register_taxonomy( 'podcast_series', array( 'podcasts' ), array(
        'hierarchical'  => true,
        'labels'        => $labels,
        'show_ui'       => true,
        'query_var'     => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
        'rewrite' => array('slug' => 'podcasts', 'with_front' => false)
    ) );
}

//TEAM

// register the new post type
register_post_type( 'team_members', array( 
    'labels'                 => array(
        'name'               => __( 'Team Members' ),
        'singular_name'      => __( 'Team Member' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Create New Team Member' ),
        'edit'               => __( 'Edit' ),
        'edit_item'          => __( 'Edit Team Member' ),
        'new_item'           => __( 'New Team Member' ),
        'view'               => __( 'View Team Members' ),
        'view_item'          => __( 'View Team Member' ),
        'search_items'       => __( 'Search Team Members' ),
        'not_found'          => __( 'No Team Members found' ),
        'not_found_in_trash' => __( 'No Team Members found in trash' ),
        'parent'             => __( 'Parent Team Member' ),
    ),
    'description'           => __( 'Team Members' ),
    'public'                => true,
    'show_ui'               => true,
    'capability_type'       => 'post',
    'exclude_from_search'   => true,
    'has_archive'           => false,
    'publicly_queryable'  => false,
    'menu_position'         => 11,
    'menu_icon'             => 'dashicons-groups',
    'hierarchical'          => true,
    '_builtin'              => false, // It's a custom post type, not built in!
    'query_var'             => true,
    'supports'              => array( 'title', 'editor', 'custom-fields', 'revisions', 'thumbnail' ),
) );

add_action( 'init', 'create_team_members_taxonomies', 0 );
function create_team_members_taxonomies() {
    $labels = array(
        'name'              => _x( 'Member Type', 'taxonomy general name' ),
        'singular_name'     => _x( 'Member Type', 'taxonomy singular name' ),
        'search_items'      =>  __( 'Search Member Types' ),
        'all_items'         => __( 'All Member Types' ),
        'parent_item'       => __( 'Parent Member Type' ),
        'parent_item_colon' => __( 'Parent Member Type:' ),
        'edit_item'         => __( 'Edit Member Type' ), 
        'update_item'       => __( 'Update Member Type' ),
        'add_new_item'      => __( 'Add New Member Type' ),
        'new_item_name'     => __( 'New Member Type Name' ),
        'menu_name'         => __( 'Member Type' ),
    );  
    register_taxonomy( 'team_member_type', array( 'team_members' ), array(
        'hierarchical'  => true,
        'labels'        => $labels,
        'show_ui'       => true,
        'query_var'     => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
    ) );

    $bio_labels = array(
        'name'              => _x( 'Display Bio Section', 'taxonomy general name' ),
        'singular_name'     => _x( 'Display Bio Section', 'taxonomy singular name' ),
        'search_items'      =>  __( 'Search Display Bio Sections' ),
        'all_items'         => __( 'All Display Bio Sections' ),
        'parent_item'       => __( 'Parent Display Bio Section' ),
        'parent_item_colon' => __( 'Parent Display Bio Section:' ),
        'edit_item'         => __( 'Edit Display Bio Section' ), 
        'update_item'       => __( 'Update Display Bio Section' ),
        'add_new_item'      => __( 'Add New Display Bio Section' ),
        'new_item_name'     => __( 'New Display Bio Section Name' ),
        'menu_name'         => __( 'Display Bio Section' ),
    );  
    register_taxonomy( 'display_bio_section', array( 'team_members', 'shout_outs' ), array(
        'hierarchical'  => true,
        'labels'        => $bio_labels,
        'show_ui'       => true,
        'query_var'     => true,
        'show_admin_column' => true,
        'show_in_quick_edit' => true,
    ) );
}


//SHOUT OUT

// register the new post type
register_post_type( 'shout_outs', array( 
    'labels'                 => array(
        'name'               => __( 'Shout Outs' ),
        'singular_name'      => __( 'Shout Out' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Create New Shout Out' ),
        'edit'               => __( 'Edit' ),
        'edit_item'          => __( 'Edit Shout Out' ),
        'new_item'           => __( 'New Shout Out' ),
        'view'               => __( 'View Shout Outs' ),
        'view_item'          => __( 'View Shout Out' ),
        'search_items'       => __( 'Search Shout Outs' ),
        'not_found'          => __( 'No Shout Outs found' ),
        'not_found_in_trash' => __( 'No Shout Outs found in trash' ),
        'parent'             => __( 'Parent Shout Out' ),
    ),
    'description'           => __( 'Displays randomly on the "shout out" sections' ),
    'public'                => true,
    'show_ui'               => true,
    'capability_type'       => 'post',
    'exclude_from_search'   => true,
    'has_archive'           => false,
    'publicly_queryable'  => false,
    'menu_position'         => 11,
    'menu_icon'             => 'dashicons-admin-users',
    'hierarchical'          => true,
    '_builtin'              => false, // It's a custom post type, not built in!
    'query_var'             => true,
    'supports'              => array( 'title', 'editor', 'custom-fields', 'revisions', 'thumbnail' ),
) );


