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
		add_action('after_setup_theme', array (__CLASS__, 'after_setup_theme'));
			
	}
	
	public static function after_setup_theme (){
		
		$custom_header_defaults = array(
			'default-image' => get_stylesheet_directory_uri() . '/images/bg.jpg',
			'width' => 1500,
			'height' => 600,
			'flex-width' => false,
			'flex-height' => true,
			'default-text-color' => '#FFFFFF',
			'header-text' => false,
			'uploads' => true,
		);
		
		load_theme_textdomain('bookpress', get_template_directory() . '/languages');
		
		add_theme_support('custom-header', $custom_header_defaults);
		add_theme_support('menus');
		register_nav_menu('primary', __('Primary Menu', 'bookpress'));
	}
}

return new Theme();
