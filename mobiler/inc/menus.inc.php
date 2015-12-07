<?php
function mobiler_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Menu główne', 'mobiler' ),
      'footer-menu' => __( 'Menu w stopce', 'mobiler' ),
    )
  );
}
add_action( 'init', 'mobiler_my_menus' );

function mobiler_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar w stopce 1', 'mobiler' ),
        'id' => 'footer-sidebar-1',
        'description' => __( 'Widżety widoczne w stopce.', 'mobiler' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
	register_sidebar( array(
        'name' => __( 'Sidebar w stopce 2', 'mobiler' ),
        'id' => 'footer-sidebar-2',
        'description' => __( 'Widżety widoczne w stopce.', 'mobiler' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
	register_sidebar( array(
        'name' => __( 'Sidebar w stopce 3', 'mobiler' ),
        'id' => 'footer-sidebar-3',
        'description' => __( 'Widżety widoczne w stopce.', 'mobiler' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
	register_sidebar( array(
        'name' => __( 'Sidebar w stopce 4', 'mobiler' ),
        'id' => 'footer-sidebar-4',
        'description' => __( 'Widżety widoczne w stopce.', 'mobiler' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
	register_sidebar( array(
        'name' => __( 'Sidebar boczny', 'mobiler' ),
        'id' => 'main-sidebar',
        'description' => __( 'Widżety widoczne w sidebarze aktualności strony.', 'mobiler' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
	
}
add_action( 'widgets_init', 'mobiler_widgets_init' );