<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function cejn_post_type() { 
	// creating (registering) the custom type 
	// register_post_type( 'property',
	// 	array('labels' => array(
	// 		'name' => __('Property', 'bonestheme'),
	// 		'singular_name' => __('Property', 'bonestheme'),
	// 		'all_items' => __('All Properties', 'bonestheme'), 
	// 		'add_new' => __('Add New', 'bonestheme'), 
	// 		'add_new_item' => __('Add New Property', 'bonestheme'), 
	// 		'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
	// 		'edit_item' => __('Edit Properties', 'bonestheme'), 
	// 		'new_item' => __('New Property', 'bonestheme'), 
	// 		'view_item' => __('View Property', 'bonestheme'), 
	// 		'search_items' => __('Search Property', 'bonestheme'), 
	// 		'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), 
	// 		'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), 
	// 		'parent_item_colon' => ''
	// 		), 
	// 		'public' => true,
	// 		'publicly_queryable' => true,
	// 		'exclude_from_search' => false,
	// 		'show_ui' => true,
	// 		'query_var' => true,
	// 		// 'menu_position' => 8,
	// 		'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', 
	// 		'rewrite'	=> array( 'slug' => 'properties', 'with_front' => false ),
	// 		'has_archive' => true,
	// 		'capability_type' => 'post',
	// 		'hierarchical' => false,
	// 		'supports' => array( 'title', 'editor', 'excerpt', 'revisions')
	//  	)
	// );

	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'custom_type');
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'cejn_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// // now let's add custom categories (these act like categories)
    // register_taxonomy( 'property-type', 
    // 	array('property'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    // 	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    // 		'labels' => array(
    // 			'name' => __( 'Property Type', 'bonestheme' ), /* name of the custom taxonomy */
    // 			'singular_name' => __( 'Property Type', 'bonestheme' ), /* single taxonomy name */
    // 			'search_items' =>  __( 'Search Property Type', 'bonestheme' ), /* search title for taxomony */
    // 			'all_items' => __( 'All Property Type', 'bonestheme' ), /* all title for taxonomies */
    // 			'parent_item' => __( 'Parent Property Type', 'bonestheme' ), /* parent title for taxonomy */
    // 			'parent_item_colon' => __( 'Parent Property Type:', 'bonestheme' ), /* parent taxonomy title */
    // 			'edit_item' => __( 'Edit Property Type', 'bonestheme' ), /* edit custom taxonomy title */
    // 			'update_item' => __( 'Update Property Type', 'bonestheme' ), /* update title for taxonomy */
    // 			'add_new_item' => __( 'Add New Property Type', 'bonestheme' ), /* add new title for taxonomy */
    // 			'new_item_name' => __( 'New Property Type', 'bonestheme' ) /* name title for taxonomy */
    // 		),
    // 		'show_admin_column' => true, 
    // 		'show_ui' => true,
    // 		'query_var' => true,
    // 		'rewrite' => array( 'slug' => 'property-type' ),
    // 	)
    // );   
    
	// // now let's add custom tags (these act like categories)
 //    register_taxonomy( 'custom_tag', 
 //    	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
 //    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
 //    		'labels' => array(
 //    			'name' => __( 'Custom Tags', 'bonestheme' ), /* name of the custom taxonomy */
 //    			'singular_name' => __( 'Custom Tag', 'bonestheme' ), /* single taxonomy name */
 //    			'search_items' =>  __( 'Search Custom Tags', 'bonestheme' ), /* search title for taxomony */
 //    			'all_items' => __( 'All Custom Tags', 'bonestheme' ), /* all title for taxonomies */
 //    			'parent_item' => __( 'Parent Custom Tag', 'bonestheme' ), /* parent title for taxonomy */
 //    			'parent_item_colon' => __( 'Parent Custom Tag:', 'bonestheme' ), /* parent taxonomy title */
 //    			'edit_item' => __( 'Edit Custom Tag', 'bonestheme' ), /* edit custom taxonomy title */
 //    			'update_item' => __( 'Update Custom Tag', 'bonestheme' ), /* update title for taxonomy */
 //    			'add_new_item' => __( 'Add New Custom Tag', 'bonestheme' ), /* add new title for taxonomy */
 //    			'new_item_name' => __( 'New Custom Tag Name', 'bonestheme' ) /* name title for taxonomy */
 //    		),
 //    		'show_admin_column' => true,
 //    		'show_ui' => true,
 //    		'query_var' => true,
 //    	)
 //    ); 

?>
