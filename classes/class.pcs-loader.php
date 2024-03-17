<?php

/**
 * File: class.pcs-loader.php
 */
if (!class_exists('PCS_LOADER')) {

	class PCS_LOADER
	{
		public function __construct()
		{
			add_action('wp_enqueue_scripts', array($this, 'load_stylesheets'));
			add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'enqueue_custom_search_scripts'));
		}

		function load_stylesheets()
		{
			wp_register_style('custom-css', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), 1, 'all');
			wp_enqueue_style('custom-css');

			wp_register_style('fancy-css', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), 1, 'all');
			wp_enqueue_style('fancy-css');
		}

		function load_scripts()
		{
			wp_register_script('fancy-js', get_stylesheet_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), 1, 'all');
			wp_enqueue_script('fancy-js');
			
		}

		function enqueue_custom_search_scripts() {
		    wp_enqueue_script('custom-search', get_stylesheet_directory_uri() . '/assets/js/custom-search.js', array('jquery'), '1.0', true);
		    wp_localize_script('custom-search', 'customSearchAjax', array(
		        'ajaxurl' => admin_url('admin-ajax.php'),
		    ));
		}

	}
	new PCS_LOADER();
}