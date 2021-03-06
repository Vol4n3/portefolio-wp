<?php
/**
 * Created by PhpStorm.
 * User: vol4n3
 * Date: 17/08/2017
 * Time: 20:12
 */
function portfolio_setup() {

	add_theme_support( 'title-tag' );

	load_theme_textdomain( 'portfolio' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 480, 320, true );


	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'portfolio' ),
		'footer-menu' => __( 'Footer Menu', 'portfolio' ),
		'social-menu' => __( 'Social Menu', 'portfolio' )
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 48,
		'width'       => 48,
		'flex-height' => true,
	) );

	/*    register_post_type('offre',
			array(
				'labels' => array(
					'name' => __('Offres'),
					'singular_name' => __('Offre')
				),
				'supports' => array('title', 'editor'),
				'menu_icon' => 'dashicons-cart',
				'public' => true
			)
		);*/
	remove_filter( 'the_content', 'wptexturize' );
}

add_action( 'after_setup_theme', 'portfolio_setup' );

function sauvant_scripts() {
	$verCache = '0.12';
	/*CSS load*/
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array(), $verCache, 'all' );
	wp_enqueue_style( 'css_tools', get_theme_file_uri( '/css/css_tools.css' ), array(), $verCache, 'all' );
	wp_enqueue_style( 'main', get_theme_file_uri( '/css/main.css' ), array(), $verCache, 'all' );
	/*JS load*/
	wp_enqueue_script( 'jquery', get_theme_file_uri( '/js/jquery.min.js' ), array(), $verCache, true );
	wp_enqueue_script( 'app', get_theme_file_uri( '/js/main.js' ), array( 'jquery' ), $verCache, true );
	if ( is_single() ) {
		wp_enqueue_style( 'highlight-atom', get_theme_file_uri( '/css/atom-one-dark.css' ), array(), $verCache, 'all' );
		wp_enqueue_script( 'highlight', get_theme_file_uri( '/js/highlight.pack.js' ), array(), $verCache, true );

	}
}

add_action( 'wp_enqueue_scripts', 'sauvant_scripts' );

function sauvant_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header', 'portfolio' ),
		'id'            => 'header-widget',
		'description'   => __( 'Ajouter ici le contenu', 'portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<label class="widget-title">',
		'after_title'   => '</label>',
	) );
}

add_action( 'widgets_init', 'sauvant_widgets_init' );
