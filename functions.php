<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header_menu' => __( 'Header' ),
      'footer_menu' => __( 'Footer' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Default Sidebar',
'id' => 'default_sidebar',
'before_widget' => '<li id="%1$s" class="widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Featured Products',
'id' => 'featured_products_sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header Search',
'id' => 'header_search_sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

add_theme_support( 'woocommerce' );
