<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package aa
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'aa_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'aa_enqueue_styles' );

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function aa_enqueue_styles() {
		// Parent style variable.
		$parent_style = 'parent-style';

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
}


// Register Custom Post Type
function wg_recipes() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'wg_recipes' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'wg_recipes' ),
		'menu_name'             => __( 'Post Types', 'wg_recipes' ),
		'name_admin_bar'        => __( 'Post Type', 'wg_recipes' ),
		'archives'              => __( 'Item Archives', 'wg_recipes' ),
		'attributes'            => __( 'Item Attributes', 'wg_recipes' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wg_recipes' ),
		'all_items'             => __( 'All Items', 'wg_recipes' ),
		'add_new_item'          => __( 'Add New Item', 'wg_recipes' ),
		'add_new'               => __( 'Add New', 'wg_recipes' ),
		'new_item'              => __( 'New Item', 'wg_recipes' ),
		'edit_item'             => __( 'Edit Item', 'wg_recipes' ),
		'update_item'           => __( 'Update Item', 'wg_recipes' ),
		'view_item'             => __( 'View Item', 'wg_recipes' ),
		'view_items'            => __( 'View Items', 'wg_recipes' ),
		'search_items'          => __( 'Search Item', 'wg_recipes' ),
		'not_found'             => __( 'Not found', 'wg_recipes' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wg_recipes' ),
		'featured_image'        => __( 'Featured Image', 'wg_recipes' ),
		'set_featured_image'    => __( 'Set featured image', 'wg_recipes' ),
		'remove_featured_image' => __( 'Remove featured image', 'wg_recipes' ),
		'use_featured_image'    => __( 'Use as featured image', 'wg_recipes' ),
		'insert_into_item'      => __( 'Insert into item', 'wg_recipes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wg_recipes' ),
		'items_list'            => __( 'Items list', 'wg_recipes' ),
		'items_list_navigation' => __( 'Items list navigation', 'wg_recipes' ),
		'filter_items_list'     => __( 'Filter items list', 'wg_recipes' ),
	);
	$args = array(
		'label'                 => __( 'Recipe', 'wg_recipes' ),
		'description'           => __( 'Recipe format for Ajax', 'wg_recipes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'wg_recipes', $args );
	
	register_rest_field( 'wg_recipes', 'ingredients', array(
			'get_callback' => function($object) {
				return get_post_meta( 
					$object['id'], 'ingredients');
			},
			'update_callback' => null,
			'schema' => null,
		)
	);

}
add_action( 'init', 'wg_recipes', 0 );

