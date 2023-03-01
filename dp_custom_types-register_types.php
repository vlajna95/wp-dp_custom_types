<?php
/*
Plugin Name: DP custom post types
Plugin URI: https://github.com/vlajna95/wp-dp_custom_types
Description: Plugin to register custom post types (books and challenges)
Version: 1.0
Author: Danijela Popović
Author URI: https://danimundo.com
Textdomain: dp_custom_types
License: GPLv2
*/


// Register Book review - custom post type

function dp_custom_post_type__book_review() {
	$labels = array(
		'name' => _x('Book reviews', 'Post type general name', 'dp_custom_types'),
		'singular_name' => _x('Book review', 'Post type singular name', 'dp_custom_types'),
		'menu_name' => __('Book reviews', 'dp_custom_types'),
		'name_admin_bar' => __('Book reviews', 'dp_custom_types'),
		'archives' => __('Book review archives', 'dp_custom_types'),
		'attributes' => __('Book review atributes', 'dp_custom_types'),
		'parent_item_colon' => __('Parent book review:', 'dp_custom_types'),
		'all_items' => __('All book reviews', 'dp_custom_types'),
		'add_new_item' => __('Add a new book review', 'dp_custom_types'),
		'add_new' => _x('Add new', 'Book review', 'dp_custom_types'),
		'new_item' => __('New book review', 'dp_custom_types'),
		'edit_item' => __('Edit book review', 'dp_custom_types'),
		'update_item' => __('Update book review', 'dp_custom_types'),
		'view_item' => __('View book review', 'dp_custom_types'),
		'view_items' => __('View book reviews', 'dp_custom_types'),
		'search_items' => __('Search book reviews', 'dp_custom_types'),
		'not_found' => __('Not found', 'dp_custom_types'),
		'not_found_in_trash' => __('Not found in trash', 'dp_custom_types'),
		'featured_image' => __('Featured image', 'dp_custom_types'),
		'set_featured_image' => __('Set featured image', 'dp_custom_types'),
		'remove_featured_image' => __('Remove featured image', 'dp_custom_types'),
		'use_featured_image' => __('Use as featured image', 'dp_custom_types'),
		'insert_into_item' => __('Insert into the book review', 'dp_custom_types'),
		'uploaded_to_this_item' => __('Uploaded to this book review', 'dp_custom_types'),
		'items_list' => __('Book reviews list', 'dp_custom_types'),
		'items_list_navigation' => __('Book reviews list navigation', 'dp_custom_types'),
		'filter_items_list' => __('Filter book reviews list', 'dp_custom_types'),
		'item_published' => __('Book review published.', 'dp_custom_types'),
		'item_published_privately' => __('Book review published privately.', 'dp_custom_types'),
		'item_reverted_to_draft' => __('Book review reverted to draft.', 'dp_custom_types'),
		'item_scheduled' => __('Book review scheduled.', 'dp_custom_types'),
		'item_updated' => __('Book review updated.', 'dp_custom_types'),
		'item_link' => __('Book review link', 'dp_custom_types'),
		'item_link_description' => __('A link to a book review', 'dp_custom_types'),
	);

	$args = array(
		'label' => __('Book review', 'dp_custom_types'),
		'description' => __('Reviews of books and book series', 'dp_custom_types'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'page-attributes'),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'reviews'),
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		'capability_type' => 'post',
		'menu_icon' => 'book',
	);

	register_post_type('dp_book_review', $args);
}

add_action('init', 'dp_custom_post_type__book_review', 0);

// Include the Book review custom type in the blog index

function dp_book_review_on_blog_page($query) {
	$post_types = $query->get('post_type');
	if (!$query->is_singular() && $query->is_main_query()) {
		if (is_array($post_types)) {
			$query->set('post_type', $post_types + array('dp_book_review'));
		}
		else {
			$query->set('post_type', array($post_types, 'dp_book_review'));
		}
	}
}

add_action('pre_get_posts', 'dp_book_review_on_blog_page');


// Register Challenge - custom post type

function dp_custom_post_type__challenge() {
	$labels = array(
		'name' => _x('Challenges', 'Post type general name', 'dp_custom_types'),
		'singular_name' => _x('Challenge', 'Post type singular name', 'dp_custom_types'),
		'menu_name' => __('Challenges', 'dp_custom_types'),
		'name_admin_bar' => __('Challenges', 'dp_custom_types'),
		'archives' => __('Challenge archives', 'dp_custom_types'),
		'attributes' => __('Challenge atributes', 'dp_custom_types'),
		'parent_item_colon' => __('Parent challenge:', 'dp_custom_types'),
		'all_items' => __('All challenges', 'dp_custom_types'),
		'add_new_item' => __('Add a new challenge', 'dp_custom_types'),
		'add_new' => _x('Add new', 'Challenge', 'dp_custom_types'),
		'new_item' => __('New challenge', 'dp_custom_types'),
		'edit_item' => __('Edit challenge', 'dp_custom_types'),
		'update_item' => __('Update challenge', 'dp_custom_types'),
		'view_item' => __('View challenge', 'dp_custom_types'),
		'view_items' => __('View challenges', 'dp_custom_types'),
		'search_items' => __('Search challenges', 'dp_custom_types'),
		'not_found' => __('Not found', 'dp_custom_types'),
		'not_found_in_trash' => __('Not found in trash', 'dp_custom_types'),
		'featured_image' => __('Featured image', 'dp_custom_types'),
		'set_featured_image' => __('Set featured image', 'dp_custom_types'),
		'remove_featured_image' => __('Remove featured image', 'dp_custom_types'),
		'use_featured_image' => __('Use as featured image', 'dp_custom_types'),
		'insert_into_item' => __('Insert into the challenge', 'dp_custom_types'),
		'uploaded_to_this_item' => __('Uploaded to this challenge', 'dp_custom_types'),
		'items_list' => __('Challenges list', 'dp_custom_types'),
		'items_list_navigation' => __('Challenges list navigation', 'dp_custom_types'),
		'filter_items_list' => __('Filter challenges list', 'dp_custom_types'),
		'item_published' => __('Challenge published.', 'dp_custom_types'),
		'item_published_privately' => __('Challenge published privately.', 'dp_custom_types'),
		'item_reverted_to_draft' => __('Challenge reverted to draft.', 'dp_custom_types'),
		'item_scheduled' => __('Challenge scheduled.', 'dp_custom_types'),
		'item_updated' => __('Challenge updated.', 'dp_custom_types'),
		'item_link' => __('Challenge link', 'dp_custom_types'),
		'item_link_description' => __('A link to a challenge', 'dp_custom_types'),
	);

	$args = array(
		'label' => __('Challenge', 'dp_custom_types'),
		'description' => __('Reading and writing challenges', 'dp_custom_types'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'page-attributes'),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'challenges'),
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		'capability_type' => 'post',
		'menu_icon' => 'smiley',
	);

	register_post_type('dp_challenge', $args);
}

add_action('init', 'dp_custom_post_type__challenge', 0);

// Include the Challenge custom type in the blog index

function dp_challenge_on_blog_page($query) {
	$post_types = $query->get('post_type');
	if (!$query->is_singular() && $query->is_main_query()) {
		if (is_array($post_types)) {
			$query->set('post_type', $post_types + array('dp_challenge'));
		}
		else {
			$query->set('post_type', array($post_types, 'dp_challenge'));
		}
	}
}

add_action('pre_get_posts', 'dp_challenge_on_blog_page');


/* Register custom taxonomies */

// Register Topic - a hierarchical custom taxonomy

function dp_custom_taxonomy__topic() {
	$labels = array(
		'name' => _x('Topics', 'Taxonomy general name', 'dp_custom_types'),
		'singular_name' => _x('Topic', 'Taxonomy singular name', 'dp_custom_types'),
		'menu_name' => __('Topics', 'dp_custom_types'),
		'all_items' => __('All topics', 'dp_custom_types'),
		'edit_item' => __('Edit topic', 'dp_custom_types'),
		'update_item' => __('Update topic', 'dp_custom_types'),
		'add_new_item' => __( 'Add a new topic', 'dp_custom_types'),
		'new_item_name' => __('New topic name', 'dp_custom_types'),
		'parent_item' => __('Parent topic', 'dp_custom_types'),
		'parent_item_colon' => __('Parent topic:', 'dp_custom_types'),
		'search_items' => __('Search topics', 'dp_custom_types'),
		'not_found' => __('No topics found.', 'dp_custom_types'),
		'no_terms' => __('No topics', 'dp_custom_types'),
		'filter_by_item' => __('Filter by topic', 'dp_custom_types'),
		'items_list' => __('Topics list', 'dp_custom_types'),
		'items_list_navigation' => __('Topics list navigation', 'dp_custom_types'),
		'most_used' => __('Most used topics', 'dp_custom_types'),
		'back_to_items' => __('← Back to topics', 'dp_custom_types'),
		'item_link' => __('Topic link', 'dp_custom_types'),
		'item_link_description' => __('A link to a topic', 'dp_custom_types'),
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'description' => __('Topics to sort and order book reviews', 'dp_custom_types'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'rewrite' => array('slug' => 'topics'),
		'query_var' => true,
		'default_term' => array(
			'name' => __('Fiction', 'dp_custom_types'),
			'slug' => 'fiction',
			'description' => __('All reviews of fiction books', 'dp_custom_types'),
		),
	);

	register_taxonomy('dp_topic', array('dp_book_review'), $args);
	register_taxonomy_for_object_type('dp_topic', 'dp_book_review');
}

add_action('init', 'dp_custom_taxonomy__topic', 0);
