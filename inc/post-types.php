<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
  // Register the Homepage Services

  $labels = array(
    'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New', 'Service'),
    'add_new_item' => __('Add New Service'),
    'edit_item' => __('Edit Services'),
    'new_item' => __('New Service'),
    'view_item' => __('View Services'),
    'search_items' => __('Search Services'),
    'not_found' =>  __('No Services found'),
    'not_found_in_trash' => __('No Services found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Services'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('service',$args); // name used in query

    $labels = array(
    'name' => _x('Careers', 'post type general name'),
    'singular_name' => _x('Career', 'post type singular name'),
    'add_new' => _x('Add New', 'Career'),
    'add_new_item' => __('Add New Career'),
    'edit_item' => __('Edit Careers'),
    'new_item' => __('New Career'),
    'view_item' => __('View Careers'),
    'search_items' => __('Search Careers'),
    'not_found' =>  __('No Careers found'),
    'not_found_in_trash' => __('No Careers found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Careers'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('career',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type