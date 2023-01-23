<?php

function plz_assets(){

  wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap", array(), false, 'all');
  wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap", array(), false, 'all');
  wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), '5-1', 'all');

  wp_enqueue_style("styles", get_template_directory_uri()."/assets/css/style.css", array("google-font", "bootstrap"));

  wp_enqueue_style("theme-styles", get_template_directory_uri()."/style.css", array());

  wp_enqueue_script("yardsale-js", get_template_directory_uri()."/assets/js/script.js");
}

add_action("wp_enqueue_scripts", "plz_assets");

function plz_analytics(){
  ?>
  <!-- <h1>ANALYTICS</h1> Insert Analytics scripts here -->
  <?php
}

add_action("wp_body_open", "plz_analytics");

function plz_theme_supports(){
  add_theme_support('title-tag'); // HTML Page title
  add_theme_support('post-thumbnails'); // Featured image (Pages, Posts)
  add_theme_support('custom-logo', array(
    "width" => 170,
    "height" => 35,
    "flex-width" => true,
    "flex-height" => true,
  ));
}

add_action("after_setup_theme", "plz_theme_supports");

function plz_add_menus(){
  register_nav_menus(
    array(
      'main-menu' => "Main menu",
      'responsive-menu' => "Responsive menu"
    )
  );
}

add_action("after_setup_theme", "plz_add_menus");

function plz_add_sidebar(){
  register_sidebar(
    array(
      'name' => 'Footer',
      'id' => 'footer',
      'before_widget' => '',
      'after_widget' => ''
    )
    );
}

add_action("after_setup_theme", "plz_add_sidebar");

function plz_add_custom_post_type(){

  $labels = array(
    'name' => 'Product',
    'singular_name' => 'Product',
    'all_items' => 'All products',
    'add_new' => 'Add product'
  );

  $args = array(
    'labels'              =>  $labels,
    'description'         =>  'Products to list in a catalogue.',
    'public'              =>  true,
    'publicly_queryable'  =>  true,
    'show_in_menu'        =>  true,
    'query_var'           =>  true,
    'rewrite'             =>  array( 'slug' => 'product' ),  
    'capability_type'     =>  'post',    
    'has_archive'         =>  true,
    'hierarchical'        =>  false,
    'menu_position'       =>  5,
    'supports'            =>  array( 'title', 'editor', 'author', 'thumbnail' ),
    'taxonomies'          =>  array( 'category' ),
    'show_in_rest'        =>  true,
    'menu_icon'           =>  'dashicons-cart'
  );

  register_post_type('product', $args);

}

add_action("init", "plz_add_custom_post_type");

function plz_add_to_signin_menu(){

  $current_user = wp_get_current_user();

  // var_dump($current_user);  // debug
  $msg = is_user_logged_in()? $current_user->user_email : "Sign In";

  echo $msg;
}

add_action("plz_signin", "plz_add_to_signin_menu");