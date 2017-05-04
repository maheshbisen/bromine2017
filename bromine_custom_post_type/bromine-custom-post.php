<?php
/*
Plugin Name: Bromine Custom Post Type
Plugin URI: 
Description: Declares a plugin that will create a custom post type.
Version: 1.0
Author: Patrick Musolf <kl-webmedia@web.de>
Author URI:
License: GPLv2
*/


/**
* Teachers and Courses Menu
*/

	add_action('init', function(){		
		 $labels = array(
		"name" => "Teachers",
		"singular_name" => "All Teachers",
		"menu_name" => "Teachers",
		"all_items" => "All Teachers",
		"add_new" => "Add New",
		"add_new_item" => "Add New Teachers",
		"edit" => "Edit",
		"edit_item" => "Edit Teachers",
		"new_item" => "New Teachers",
		"view" => "View",
		"view_item" => "View Teachers",
		"search_items" => "Search Teachers",
		"not_found" => "No Teachers Found",
		"not_found_in_trash" => "No Teachers Found in Trash",		
		"parent" => "Parent Teachers",
	);
 
   $args = array(
        "labels" => $labels,
		'menu_position' => 5,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
		'taxonomies' => array( 'category' ),
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "query_var" => true,		
        'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
	    'menu_icon' => get_template_directory_uri() . '/images/teachers_icon.png',			
	    'has_archive' => true	
    );


	 register_post_type( "teachers", $args );
	 
   $labels = array(
        "name" => "Courses",
        "singular_name" => "All Courses",
		'add_new' => 'Add New Courses',
        'add_new_item' => 'Add New Courses',
        'edit' => 'Edit',
        'edit_item' => 'Edit Courses',
        'new_item' => 'New Courses',
        'view' => 'View',
        'view_item' => 'View Courses',
        'search_items' => 'Search Courses',
        'not_found' => 'No Courses found',
        'not_found_in_trash' => 'No Courses found in Trash',
        'parent' => 'Parent Courses'
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,		
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
		'menu_position' => 5,
		'menu_icon' => get_template_directory_uri() . '/images/courses_icon.png',
        "query_var" => true,
		'taxonomies' => array( 'category' ),		
        'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' )
    );

    register_post_type( "courses", $args );	 
});
	 
 add_action('add_meta_boxes', function() {
    add_meta_box('courses-parent', 'Teachers Name', 'bromine_courses_attributes_meta_box', 'courses', 'side', 'default');	
});

 
 
function bromine_courses_attributes_meta_box($post) {   
        $pages = wp_dropdown_pages(array('post_type' => 'teachers', 'selected' => $post->post_parent, 'name' => 'parent_id', 'multiple'=>'multiple', 'show_option_none' => __('(no parent)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0));
        if ( ! empty($pages) ) {
            echo $pages;
        } // end empty pages check

}


/**
* Services Menu
*/
add_action( 'init', 'bromine_create_services' );
function bromine_create_services() {
    register_post_type( 'services',
        array(
            'labels' => array(
                'name' => 'Services',
                'singular_name' => 'All Services',
                'add_new' => 'Add New Services',
                'add_new_item' => 'Add New Services',
                'edit' => 'Edit',
                'edit_item' => 'Edit Services',
                'new_item' => 'New Services',
                'view' => 'View',
                'view_item' => 'View Services',
                'search_items' => 'Search Services',
                'not_found' => 'No Services found',
                'not_found_in_trash' => 'No Services found in Trash',
				'capability_type' => 'post',				
                'parent' => 'Parent Services'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),           
            'menu_icon' => get_template_directory_uri() . '/images/services_icon.png',
            'has_archive' => true
        )
    );
}

if (class_exists('MultiPostThumbnails')) {
			new MultiPostThumbnails(array(
			'label' => 'Secondary Image',
			'id' => 'secondary-image',
			'post_type' => 'services'
			 ) );
       }

/***/

/* */
add_action( 'init', 'bromine_create_testimonials' );
    function bromine_create_testimonials() {
        register_post_type( 'testimonials',
            array(
                'labels' => array(
                    'name' => 'Testimonials',
                    'singular_name' => 'All Testimonials',
                    'add_new' => 'Add New Testimonial',
                    'add_new_item' => 'Add New Testimonial',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Testimonials',
                    'new_item' => 'New Testimonials',
                    'view' => 'View',
                    'view_item' => 'View Testimonials',
                    'search_items' => 'Search Testimonials',
                    'not_found' => 'No Services found',
                    'not_found_in_trash' => 'No Services found in Trash',
                    'parent' => 'Parent Testimonials'
                ),
     
                'public' => true,
                'menu_position' => 15,
                'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
                'taxonomies' => array( 'category' ),
                'menu_icon' => get_template_directory_uri() . '/images/services_icon.png',
                'has_archive' => true
            )
        );
}
/* */


/* Plans And Pricing Menu
*/
add_action( 'init', 'bromine_create_plans' );
function bromine_create_plans() {
    register_post_type( 'plans',
        array(
            'labels' => array(
                'name' => 'Plans & Pricing',
                'singular_name' => 'All Plans & Pricing',
                'add_new' => 'Add New Plans & Pricing',
                'add_new_item' => 'Add New Plans & Pricing',
                'edit' => 'Edit',
                'edit_item' => 'Edit Plans & Pricing',
                'new_item' => 'New Plans & Pricing',
                'view' => 'View',
                'view_item' => 'View Plans & Pricing',
                'search_items' => 'Search Plans & Pricing',
                'not_found' => 'No Plans found',
                'not_found_in_trash' => 'No Plans & Pricing found in Trash',
                'parent' => 'Parent Plans & Pricing'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'comments', 'thumbnail', 'custom-fields' ),
            'taxonomies' => array( 'category' ),			
            'menu_icon' => get_template_directory_uri() . '/images/table_plan.png',
            'has_archive' => true
			
        )
    );
}

/* Our Client Section
*/
add_action( 'init', 'bromine_create_client' );
function bromine_create_client() {
    register_post_type( 'client',
        array(
            'labels' => array(
                'name' => 'Client',
                'singular_name' => 'All Client',
                'add_new' => 'Add New Client',
                'add_new_item' => 'Add New Client',
                'edit' => 'Edit',
                'edit_item' => 'Edit Client',
                'new_item' => 'New Client',
                'view' => 'View',
                'view_item' => 'View Client',
                'search_items' => 'Search Client',
                'not_found' => 'No Client found',
                'not_found_in_trash' => 'No Client found in Trash',
                'parent' => 'Parent Client'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail' ),           			
            'menu_icon' => get_template_directory_uri() . '/images/table_plan.png',
            'has_archive' => true
			
        )
    );
}