<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Biblioteca_ICG;

/**
 * Description of Theme
 *
 * @author User
 */
class Theme {

	public function __construct() {
		add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
		add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
		add_filter( 'comment_form_default_fields', array( __CLASS__, 'comment_form_default_fields' ) );
	}

	public static function after_setup_theme() {

		$custom_header_defaults = array(
			'default-image'		 => get_stylesheet_directory_uri() . '/images/bg.jpg',
			'width'				 => 1500,
			'height'			 => 600,
			'flex-width'		 => false,
			'flex-height'		 => true,
			'default-text-color' => '#FFFFFF',
			'header-text'		 => false,
			'uploads'			 => true,
		);

		load_theme_textdomain( 'bookpress', get_template_directory() . '/languages' );

		add_theme_support( 'custom-header', $custom_header_defaults );
		add_theme_support( 'menus' );
		add_theme_support( 'html5' );
		register_nav_menu( 'primary', __( 'Primary Menu', 'bookpress' ) );
	}

	public static function comment_form_default_fields( $fields ) {
		$fields[ 'url' ] = '';
		$fields[ 'rating' ] = 'Rating';
		return $fields;
	}

	public static function widgets_init() {
		$args = array(
			'id'			 => 'home-column4',
			'before_widget'	 => '<div class="column4">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="title"><h2>',
			'after_title'	 => '</h2></div>',
		);
		register_sidebar( $args );
	}

}

return new Theme();
