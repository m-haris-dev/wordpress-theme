<?php

/**
 * File: class.pcs-settings
 */
if (!class_exists('PCS_CUSTOM_SETTING')) {

    class PCS_CUSTOM_SETTING
    {
        public function __construct()
        {
            add_action('acf/init', array($this,'my_acf_op_init'));
            add_action( 'init', array($this, 'testimonial_post_type'));
            add_action( 'init', array($this, 'publication_post_type'));
            add_action( 'init', array($this, 'event_post_type'));
            add_action( 'init', array($this, 'practice_area_post_type'));
            add_action( 'init', array($this, 'industry_team_post_type'));
            add_action( 'init', array($this, 'industry_group_post_type'));
            add_action( 'init', array($this, 'market_focused_post_type'));
            add_action( 'init', array($this, 'attorney_post_type'));
            add_action( 'init', array($this, 'book_post_type'));
            add_action( 'init', array($this, 'alert_post_type'));
            add_action( 'init', array($this, 'award_post_type'));
            add_action( 'init', array($this, 'newsletter_post_type'));
            add_action( 'init', array($this, 'video_post_type'));
            add_action( 'init', array($this, 'custom_taxonomy_newsletter_cat'));
            add_action( 'init', array($this, 'custom_taxonomy_event_topic'));
            add_action( 'init', array($this, 'custom_taxonomy_practice_area'));
            add_action( 'init', array($this, 'custom_taxonomy_industry_team'));
            add_action( 'init', array($this, 'custom_taxonomy_market_focus'));
            add_action( 'init', array($this, 'custom_taxonomy_office'));
            add_action( 'init', array($this, 'custom_taxonomy_title'));

            add_action( 'init', array($this, 'custom_taxonomy_industry_group'));

            add_action('save_post', array($this, 'save_first_letter_as_post_meta'));
            add_action('save_post', array($this, 'save_last_word_as_post_meta'));

            add_action('wp_ajax_custom_search',  array($this,'custom_search_ajax_callback'));
            add_action('wp_ajax_nopriv_custom_search',  array($this,'custom_search_ajax_callback'));

            add_action('wp_ajax_news_search',  array($this,'news_search_ajax_callback'));
            add_action('wp_ajax_nopriv_news_search',  array($this,'news_search_ajax_callback'));

            add_action('wp_ajax_video_search',  array($this,'video_search_ajax_callback'));
            add_action('wp_ajax_nopriv_video_search',  array($this,'video_search_ajax_callback'));

            add_action('wp_ajax_alert_search',  array($this,'alert_search_ajax_callback'));
            add_action('wp_ajax_nopriv_alert_search',  array($this,'alert_search_ajax_callback'));

            add_action('wp_ajax_article_search',  array($this,'article_search_ajax_callback'));
            add_action('wp_ajax_nopriv_article_search',  array($this,'article_search_ajax_callback'));


        }

        function my_acf_op_init()
        {

            // Check function exists.
            if (function_exists('acf_add_options_page')) {
                
                acf_add_options_page(array(
                    'page_title'    => 'Theme General Settings',
                    'menu_title'    => 'Theme Settings',
                    'menu_slug'     => 'theme-general-settings',
                    'redirect'      => false
                ));
                
                acf_add_options_sub_page(array(
                    'page_title'    => 'Theme Header Settings',
                    'menu_title'    => 'Header',
                    'parent_slug'   => 'theme-general-settings',
                ));
                
                acf_add_options_sub_page(array(
                    'page_title'    => 'Theme Footer Settings',
                    'menu_title'    => 'Footer',
                    'parent_slug'   => 'theme-general-settings',
                ));                                
            }
        }

        function award_post_type() {
            $labels = array(
                'name'                  => _x( 'Awards', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Award', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Award', 'text_domain' ),
                'name_admin_bar'        => __( 'Award', 'text_domain' ),
                'archives'              => __( 'Award Archives', 'text_domain' ),
                'attributes'            => __( 'Award Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Award', 'text_domain' ),
                'add_new_item'          => __( 'Add New Award', 'text_domain' ),
                'add_new'               => __( 'Add Award', 'text_domain' ),
                'new_item'              => __( 'New Award', 'text_domain' ),
                'edit_item'             => __( 'Edit Award', 'text_domain' ),
                'update_item'           => __( 'Update Award', 'text_domain' ),
                'view_item'             => __( 'View Award', 'text_domain' ),
                'view_items'            => __( 'View Award', 'text_domain' ),
                'search_items'          => __( 'Search Award', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Award', 'text_domain' ),
                'description'           => __( 'Award Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'award', $args );

        }

        function testimonial_post_type() {

            $labels = array(
                'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Testimonial', 'text_domain' ),
                'name_admin_bar'        => __( 'Testimonial', 'text_domain' ),
                'archives'              => __( 'Testimonial Archives', 'text_domain' ),
                'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Testimonial', 'text_domain' ),
                'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
                'add_new'               => __( 'Add Testimonial', 'text_domain' ),
                'new_item'              => __( 'New Testimonial', 'text_domain' ),
                'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
                'update_item'           => __( 'Update Testimonial', 'text_domain' ),
                'view_item'             => __( 'View Testimonial', 'text_domain' ),
                'view_items'            => __( 'View Testimonial', 'text_domain' ),
                'search_items'          => __( 'Search Testimonial', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Testimonial', 'text_domain' ),
                'description'           => __( 'Testimonial Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'testimonial', $args );

        }

        function publication_post_type() {

            $labels = array(
                'name'                  => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Article', 'text_domain' ),
                'name_admin_bar'        => __( 'Article', 'text_domain' ),
                'archives'              => __( 'Article Archives', 'text_domain' ),
                'attributes'            => __( 'Article Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Article', 'text_domain' ),
                'add_new_item'          => __( 'Add New Article', 'text_domain' ),
                'add_new'               => __( 'Add Article', 'text_domain' ),
                'new_item'              => __( 'New Article', 'text_domain' ),
                'edit_item'             => __( 'Edit Article', 'text_domain' ),
                'update_item'           => __( 'Update Article', 'text_domain' ),
                'view_item'             => __( 'View Article', 'text_domain' ),
                'view_items'            => __( 'View Article', 'text_domain' ),
                'search_items'          => __( 'Search Article', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Article', 'text_domain' ),
                'description'           => __( 'Article Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'publication', $args );

        }

        function event_post_type() {

            $labels = array(
                'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Event', 'text_domain' ),
                'name_admin_bar'        => __( 'Event', 'text_domain' ),
                'archives'              => __( 'Event Archives', 'text_domain' ),
                'attributes'            => __( 'Event Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Event', 'text_domain' ),
                'add_new_item'          => __( 'Add New Event', 'text_domain' ),
                'add_new'               => __( 'Add Event', 'text_domain' ),
                'new_item'              => __( 'New Event', 'text_domain' ),
                'edit_item'             => __( 'Edit Event', 'text_domain' ),
                'update_item'           => __( 'Update Event', 'text_domain' ),
                'view_item'             => __( 'View Event', 'text_domain' ),
                'view_items'            => __( 'View Event', 'text_domain' ),
                'search_items'          => __( 'Search Event', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Event', 'text_domain' ),
                'description'           => __( 'Event Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'event', $args );

        }

        function practice_area_post_type() {

            $labels = array(
                'name'                  => _x( 'Practice Areas', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Practice Area', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Practice Area', 'text_domain' ),
                'name_admin_bar'        => __( 'Practice Area', 'text_domain' ),
                'archives'              => __( 'Practice Area Archives', 'text_domain' ),
                'attributes'            => __( 'Practice Area Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Practice Area', 'text_domain' ),
                'add_new_item'          => __( 'Add New Practice Area', 'text_domain' ),
                'add_new'               => __( 'Add Practice Area', 'text_domain' ),
                'new_item'              => __( 'New Practice Area', 'text_domain' ),
                'edit_item'             => __( 'Edit Practice Area', 'text_domain' ),
                'update_item'           => __( 'Update Practice Area', 'text_domain' ),
                'view_item'             => __( 'View Practice Area', 'text_domain' ),
                'view_items'            => __( 'View Practice Area', 'text_domain' ),
                'search_items'          => __( 'Search Practice Area', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Practice Area', 'text_domain' ),
                'description'           => __( 'Practice Area Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'practice-area', $args );

        }

        function market_focused_post_type() {

            $labels = array(
                'name'                  => _x( 'Market Focused', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Market Focused', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Market Focused', 'text_domain' ),
                'name_admin_bar'        => __( 'Market Focused', 'text_domain' ),
                'archives'              => __( 'Market Focused Archives', 'text_domain' ),
                'attributes'            => __( 'Market Focused Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Market Focused', 'text_domain' ),
                'add_new_item'          => __( 'Add New Market Focused', 'text_domain' ),
                'add_new'               => __( 'Add Market Focused', 'text_domain' ),
                'new_item'              => __( 'New Market Focused', 'text_domain' ),
                'edit_item'             => __( 'Edit Market Focused', 'text_domain' ),
                'update_item'           => __( 'Update Market Focused', 'text_domain' ),
                'view_item'             => __( 'View Market Focused', 'text_domain' ),
                'view_items'            => __( 'View Market Focused', 'text_domain' ),
                'search_items'          => __( 'Search Market Focused', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Market Focused', 'text_domain' ),
                'description'           => __( 'Market Focused Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'market-focused', $args );

        }

        function industry_team_post_type() {

            $labels = array(
                'name'                  => _x( 'Industry Teams', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Industry Team', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Industry Team', 'text_domain' ),
                'name_admin_bar'        => __( 'Industry Team', 'text_domain' ),
                'archives'              => __( 'Industry Team Archives', 'text_domain' ),
                'attributes'            => __( 'Industry Team Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Industry Team', 'text_domain' ),
                'add_new_item'          => __( 'Add New Industry Team', 'text_domain' ),
                'add_new'               => __( 'Add Industry Team', 'text_domain' ),
                'new_item'              => __( 'New Industry Team', 'text_domain' ),
                'edit_item'             => __( 'Edit Industry Team', 'text_domain' ),
                'update_item'           => __( 'Update Industry Team', 'text_domain' ),
                'view_item'             => __( 'View Industry Team', 'text_domain' ),
                'view_items'            => __( 'View Industry Team', 'text_domain' ),
                'search_items'          => __( 'Search Industry Team', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Industry Team', 'text_domain' ),
                'description'           => __( 'Industry Team Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'industry-team', $args );

        }

        function industry_group_post_type() {

            $labels = array(
                'name'                  => _x( 'Industry Groups', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Industry Group', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Industry Group', 'text_domain' ),
                'name_admin_bar'        => __( 'Industry Group', 'text_domain' ),
                'archives'              => __( 'Industry Group Archives', 'text_domain' ),
                'attributes'            => __( 'Industry Group Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Industry Group', 'text_domain' ),
                'add_new_item'          => __( 'Add New Industry Group', 'text_domain' ),
                'add_new'               => __( 'Add Industry Group', 'text_domain' ),
                'new_item'              => __( 'New Industry Group', 'text_domain' ),
                'edit_item'             => __( 'Edit Industry Group', 'text_domain' ),
                'update_item'           => __( 'Update Industry Group', 'text_domain' ),
                'view_item'             => __( 'View Industry Group', 'text_domain' ),
                'view_items'            => __( 'View Industry Group', 'text_domain' ),
                'search_items'          => __( 'Search Industry Group', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Industry Group', 'text_domain' ),
                'description'           => __( 'Industry Group Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail', 'excerpt'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'industry-group', $args );

        }

        function attorney_post_type() {

            $labels = array(
                'name'                  => _x( 'People', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'People', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'People', 'text_domain' ),
                'name_admin_bar'        => __( 'People', 'text_domain' ),
                'archives'              => __( 'People Archives', 'text_domain' ),
                'attributes'            => __( 'People Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All People', 'text_domain' ),
                'add_new_item'          => __( 'Add New People', 'text_domain' ),
                'add_new'               => __( 'Add People', 'text_domain' ),
                'new_item'              => __( 'New People', 'text_domain' ),
                'edit_item'             => __( 'Edit People', 'text_domain' ),
                'update_item'           => __( 'Update People', 'text_domain' ),
                'view_item'             => __( 'View People', 'text_domain' ),
                'view_items'            => __( 'View People', 'text_domain' ),
                'search_items'          => __( 'Search People', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'People', 'text_domain' ),
                'description'           => __( 'People Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt'),
                'taxonomies'            => array('practice_area', 'industry_team', 'market_focus', 'location', 'job_title'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'attorney', $args );

        }

        function custom_taxonomy_practice_area() {
            $labels = array(
                'name'                       => 'Practice Areas',
                'singular_name'              => 'Practice Area',
                'menu_name'                  => 'Practice Areas',
                'all_items'                  => 'All Practice Areas',
                'parent_item'                => 'Parent Practice Area',
                'parent_item_colon'          => 'Parent Practice Area:',
                'new_item_name'              => 'New Practice Area Name',
                'add_new_item'               => 'Add New Practice Area',
                'edit_item'                  => 'Edit Practice Area',
                'update_item'                => 'Update Practice Area',
                'view_item'                  => 'View Practice Area',
                'separate_items_with_commas' => 'Separate practice areas with commas',
                'add_or_remove_items'        => 'Add or remove practice areas',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Practice Areas',
                'search_items'               => 'Search Practice Areas',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No practice areas',
                'items_list'                 => 'Practice areas list',
                'items_list_navigation'      => 'Practice areas list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('practice_area', array('attorney','post','video','alert','publication'), $args);
        }

        function custom_taxonomy_newsletter_cat() {
            $labels = array(
                'name'                       => 'Newsletter Category',
                'singular_name'              => 'Newsletter Category',
                'menu_name'                  => 'Newsletter Category',
                'all_items'                  => 'All Newsletter Category',
                'parent_item'                => 'Parent Newsletter Category',
                'parent_item_colon'          => 'Parent Newsletter Category:',
                'new_item_name'              => 'New Newsletter Category Name',
                'add_new_item'               => 'Add New Newsletter Category',
                'edit_item'                  => 'Edit Newsletter Category',
                'update_item'                => 'Update Newsletter Category',
                'view_item'                  => 'View Newsletter Category',
                'separate_items_with_commas' => 'Separate Newsletter Category with commas',
                'add_or_remove_items'        => 'Add or remove Newsletter Category',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Newsletter Category',
                'search_items'               => 'Search Newsletter Category',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Newsletter Category',
                'items_list'                 => 'Newsletter Category list',
                'items_list_navigation'      => 'Newsletter Category list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('newsletter_cat', array('newsletter'), $args);
        }

        function custom_taxonomy_event_topic() {
            $labels = array(
                'name'                       => 'Event Topic',
                'singular_name'              => 'Event Topic',
                'menu_name'                  => 'Event Topic',
                'all_items'                  => 'All Event Topic',
                'parent_item'                => 'Parent Event Topic',
                'parent_item_colon'          => 'Parent Event Topic:',
                'new_item_name'              => 'New Event Topic Name',
                'add_new_item'               => 'Add New Event Topic',
                'edit_item'                  => 'Edit Event Topic',
                'update_item'                => 'Update Event Topic',
                'view_item'                  => 'View Event Topic',
                'separate_items_with_commas' => 'Separate Event Topic with commas',
                'add_or_remove_items'        => 'Add or remove Event Topic',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Event Topic',
                'search_items'               => 'Search Event Topic',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Event Topic',
                'items_list'                 => 'Event Topic list',
                'items_list_navigation'      => 'Event Topic list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('event_topic', array('event'), $args);
        }

        function custom_taxonomy_industry_team() {
            $labels = array(
                'name'                       => 'Industry Teams',
                'singular_name'              => 'Industry Team',
                'menu_name'                  => 'Industry Teams',
                'all_items'                  => 'All Industry Teams',
                'parent_item'                => 'Parent Industry Team',
                'parent_item_colon'          => 'Parent Industry Team:',
                'new_item_name'              => 'New Industry Team Name',
                'add_new_item'               => 'Add New Industry Team',
                'edit_item'                  => 'Edit Industry Team',
                'update_item'                => 'Update Industry Team',
                'view_item'                  => 'View Industry Team',
                'separate_items_with_commas' => 'Separate Industry Teams with commas',
                'add_or_remove_items'        => 'Add or remove Industry Teams',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Industry Teams',
                'search_items'               => 'Search Industry Teams',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Industry Teams',
                'items_list'                 => 'Industry Teams list',
                'items_list_navigation'      => 'Industry teams list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('industry_team', array('alert'), $args);
        }

        function custom_taxonomy_industry_group() {
            $labels = array(
                'name'                       => 'Industry Groups',
                'singular_name'              => 'Industry Group',
                'menu_name'                  => 'Industry Groups',
                'all_items'                  => 'All Industry Groups',
                'parent_item'                => 'Parent Industry Group',
                'parent_item_colon'          => 'Parent Industry Group:',
                'new_item_name'              => 'New Industry Group Name',
                'add_new_item'               => 'Add New Industry Group',
                'edit_item'                  => 'Edit Industry Group',
                'update_item'                => 'Update Industry Group',
                'view_item'                  => 'View Industry Group',
                'separate_items_with_commas' => 'Separate Industry Groups with commas',
                'add_or_remove_items'        => 'Add or remove Industry Groups',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Industry Groups',
                'search_items'               => 'Search Industry Groups',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Industry Groups',
                'items_list'                 => 'Industry groups list',
                'items_list_navigation'      => 'Industry groups list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('industry_group', array('attorney','publication','post','video','alert'), $args);
        }

        function custom_taxonomy_market_focus() {
            $labels = array(
                'name'                       => 'Market Focus',
                'singular_name'              => 'Market Focus',
                'menu_name'                  => 'Market Focus',
                'all_items'                  => 'All Market Focus',
                'parent_item'                => 'Parent Market Focus',
                'parent_item_colon'          => 'Parent Market Focus:',
                'new_item_name'              => 'New Market Focus Name',
                'add_new_item'               => 'Add New Market Focus',
                'edit_item'                  => 'Edit Market Focus',
                'update_item'                => 'Update Market Focus',
                'view_item'                  => 'View Market Focus',
                'separate_items_with_commas' => 'Separate Market Focus with commas',
                'add_or_remove_items'        => 'Add or remove Market Focus',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Market Focus',
                'search_items'               => 'Search Market Focus',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Market Focus',
                'items_list'                 => 'Market Focus list',
                'items_list_navigation'      => 'Market Focus list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('market_focus', array('attorney','post','video','alert','publication'), $args);
        }

        function custom_taxonomy_office() {
            $labels = array(
                'name'                       => 'Office',
                'singular_name'              => 'Office',
                'menu_name'                  => 'Office',
                'all_items'                  => 'All Office',
                'parent_item'                => 'Parent Office',
                'parent_item_colon'          => 'Parent Office:',
                'new_item_name'              => 'New Office Name',
                'add_new_item'               => 'Add New Office',
                'edit_item'                  => 'Edit Office',
                'update_item'                => 'Update Office',
                'view_item'                  => 'View Office',
                'separate_items_with_commas' => 'Separate Office with commas',
                'add_or_remove_items'        => 'Add or remove Office',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Office',
                'search_items'               => 'Search Office',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Office',
                'items_list'                 => 'Office list',
                'items_list_navigation'      => 'Office list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('office', array('attorney','post','video','alert'), $args);
        }

        function custom_taxonomy_title() {
            $labels = array(
                'name'                       => 'Title',
                'singular_name'              => 'Title',
                'menu_name'                  => 'Title',
                'all_items'                  => 'All Title',
                'parent_item'                => 'Parent Title',
                'parent_item_colon'          => 'Parent Title:',
                'new_item_name'              => 'New Title Name',
                'add_new_item'               => 'Add New Title',
                'edit_item'                  => 'Edit Title',
                'update_item'                => 'Update Title',
                'view_item'                  => 'View Title',
                'separate_items_with_commas' => 'Separate Title with commas',
                'add_or_remove_items'        => 'Add or remove Title',
                'choose_from_most_used'      => 'Choose from the most used',
                'popular_items'              => 'Popular Title',
                'search_items'               => 'Search Title',
                'not_found'                  => 'Not Found',
                'no_terms'                   => 'No Title',
                'items_list'                 => 'Title list',
                'items_list_navigation'      => 'Title list navigation',
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy('title', array('attorney'), $args);
        }

        function book_post_type() {
            $labels = array(
                'name'                  => _x( 'Books', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Book', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Book', 'text_domain' ),
                'name_admin_bar'        => __( 'Book', 'text_domain' ),
                'archives'              => __( 'Book Archives', 'text_domain' ),
                'attributes'            => __( 'Book Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Book', 'text_domain' ),
                'add_new_item'          => __( 'Add New Book', 'text_domain' ),
                'add_new'               => __( 'Add Book', 'text_domain' ),
                'new_item'              => __( 'New Book', 'text_domain' ),
                'edit_item'             => __( 'Edit Book', 'text_domain' ),
                'update_item'           => __( 'Update Book', 'text_domain' ),
                'view_item'             => __( 'View Book', 'text_domain' ),
                'view_items'            => __( 'View Book', 'text_domain' ),
                'search_items'          => __( 'Search Book', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Book', 'text_domain' ),
                'description'           => __( 'Book Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'book', $args );

        }

        function alert_post_type() {
            $labels = array(
                'name'                  => _x( 'Alerts', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Alert', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Alert', 'text_domain' ),
                'name_admin_bar'        => __( 'Alert', 'text_domain' ),
                'archives'              => __( 'Alert Archives', 'text_domain' ),
                'attributes'            => __( 'Alert Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Alert', 'text_domain' ),
                'add_new_item'          => __( 'Add New Alert', 'text_domain' ),
                'add_new'               => __( 'Add Alert', 'text_domain' ),
                'new_item'              => __( 'New Alert', 'text_domain' ),
                'edit_item'             => __( 'Edit Alert', 'text_domain' ),
                'update_item'           => __( 'Update Alert', 'text_domain' ),
                'view_item'             => __( 'View Alert', 'text_domain' ),
                'view_items'            => __( 'View Alert', 'text_domain' ),
                'search_items'          => __( 'Search Alert', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Alert', 'text_domain' ),
                'description'           => __( 'Alert Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'alert', $args );

        }

        function newsletter_post_type() {
            $labels = array(
                'name'                  => _x( 'Newsletters', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Newsletter', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Newsletter', 'text_domain' ),
                'name_admin_bar'        => __( 'Newsletter', 'text_domain' ),
                'archives'              => __( 'Newsletter Archives', 'text_domain' ),
                'attributes'            => __( 'Newsletter Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Newsletter', 'text_domain' ),
                'add_new_item'          => __( 'Add New Newsletter', 'text_domain' ),
                'add_new'               => __( 'Add Newsletter', 'text_domain' ),
                'new_item'              => __( 'New Newsletter', 'text_domain' ),
                'edit_item'             => __( 'Edit Newsletter', 'text_domain' ),
                'update_item'           => __( 'Update Newsletter', 'text_domain' ),
                'view_item'             => __( 'View Newsletter', 'text_domain' ),
                'view_items'            => __( 'View Newsletter', 'text_domain' ),
                'search_items'          => __( 'Search Newsletter', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Newsletter', 'text_domain' ),
                'description'           => __( 'Newsletter Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'newsletter', $args );

        }

        function video_post_type() {
            $labels = array(
                'name'                  => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
                'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'             => __( 'Video', 'text_domain' ),
                'name_admin_bar'        => __( 'Video', 'text_domain' ),
                'archives'              => __( 'Video Archives', 'text_domain' ),
                'attributes'            => __( 'Video Attributes', 'text_domain' ),
                'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
                'all_items'             => __( 'All Video', 'text_domain' ),
                'add_new_item'          => __( 'Add New Video', 'text_domain' ),
                'add_new'               => __( 'Add Video', 'text_domain' ),
                'new_item'              => __( 'New Video', 'text_domain' ),
                'edit_item'             => __( 'Edit Video', 'text_domain' ),
                'update_item'           => __( 'Update Video', 'text_domain' ),
                'view_item'             => __( 'View Video', 'text_domain' ),
                'view_items'            => __( 'View Video', 'text_domain' ),
                'search_items'          => __( 'Search Video', 'text_domain' ),
                'not_found'             => __( 'Not found', 'text_domain' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
                'featured_image'        => __( 'Featured Image', 'text_domain' ),
                'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
                'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
                'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
                'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
                'items_list'            => __( 'Items list', 'text_domain' ),
                'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
                'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
            );
            $args = array(
                'label'                 => __( 'Video', 'text_domain' ),
                'description'           => __( 'Video Description', 'text_domain' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'thumbnail'),
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
                'capability_type'       => 'page',
            );
            register_post_type( 'video', $args );

        }

        // Add AJAX callback for custom search
        function custom_search_ajax_callback() {
            $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
            $practice_area = isset($_POST['practice_area']) ? sanitize_text_field($_POST['practice_area']) : '';
            $industry_team = isset($_POST['industry_team']) ? sanitize_text_field($_POST['industry_team']) : '';
            $market_focus = isset($_POST['market_focus']) ? sanitize_text_field($_POST['market_focus']) : '';
            $office = isset($_POST['office']) ? sanitize_text_field($_POST['office']) : '';
            $title = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';
            $select_letter = isset($_POST['select_letter']) ? sanitize_text_field($_POST['select_letter']) : '';
            


$tax_query = array('relation' => 'AND');
$meta_query = array('relation' => 'AND');
$excluded_titles = array('advisor', 'law-clerk', 'professional-staff');
// Check if the user has selected any term for each taxonomy field
// If yes, add the taxonomy query to the $tax_query array
if (!empty($practice_area)) {
    $tax_query[] = array(
        'taxonomy' => 'practice_area',
        'field'    => 'slug',
        'terms'    => $practice_area,
    );
}

if (!empty($industry_team)) {
    $tax_query[] = array(
        'taxonomy' => 'industry_group',
        'field'    => 'slug',
        'terms'    => $industry_team,
    );
}

if (!empty($market_focus)) {
    $tax_query[] = array(
        'taxonomy' => 'market_focus',
        'field'    => 'slug',
        'terms'    => $market_focus,
    );
}

if (!empty($office)) {
    $tax_query[] = array(
        'taxonomy' => 'office',
        'field'    => 'slug',
        'terms'    => $office,
    );
}

if (!empty($title)) {
    $tax_query[] = array(
        'taxonomy' => 'title',
        'field'    => 'slug',
        'terms'    => $title,
    );
    $excluded_titles = array('');
}

// Define the meta query to include the alphabet meta value
if (!empty($select_letter)) {
    $meta_query[] = array(
        'key' => 'first_letter',
        'value' => $select_letter,
        'compare' => '=',
    );
}

// Define the tax query to exclude specified titles
$title_tax_query = array(
    'taxonomy' => 'title',
    'field'    => 'slug',
    'terms'    => $excluded_titles,
    'operator' => 'NOT IN', // Exclude posts with these titles
);

// Define the query arguments
$args = array(
    'post_type'      => 'attorney',
    'posts_per_page' => -1,
    'post_status' => array('publish'),
    's'              => $search_query, // Search query
    'tax_query'      => array(
        'relation' => 'AND',
        $tax_query,
        $title_tax_query,
    ), // Taxonomy query excluding specified titles
    'meta_query'     => $meta_query, // Meta query for alphabet
    'orderby'        => 'meta_value', // Order by meta value
    'meta_key'       => 'attorney_last_word', // Meta key for ordering
    'order'          => 'ASC', // Order direction (ascending)
);          

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/people-default.jpg';
                $titles = get_the_terms(get_the_ID(), 'title');
                $offices = get_the_terms(get_the_ID(), 'office');
                ?>
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="attorneys-card">
                        <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title().' '.get_field('title_suffix'); ?></h6>
                                <p>
                                <?php
                                if ($titles && !is_wp_error($titles)) {
                                    $title_names = array();
                                    foreach ($titles as $title) {
                                        $title_names[] = $title->name;
                                    }
                                    echo implode(', ', $title_names);
                                }
                                ?>
                                ,
                                <?php
                                if ($offices && !is_wp_error($offices)) {
                                    $office_names = array();
                                    foreach ($offices as $office) {
                                        $office_names[] = $office->name;
                                    }
                                    echo implode(', ', $office_names);
                                }?>
                                </p>
                            </div>
                            <div class="card-arrow">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>    
                <?php
                }
                $people_posts = get_posts($args);
                $people_count = count($people_posts);
                if($people_count > 9){
                ?>
                <div class="loadmorebtnarea">
                    <div class="load-more-btn">
                        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            } else {
                echo '<p style="text-align: center; width: 100%;">No matches were found. Please try a different selection.</p>';
            }

            wp_die();
        }

        function save_first_letter_as_post_meta($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
                return;

            $post = get_post($post_id);

            // Check if the post is of your custom post type
            if ($post->post_type === 'attorney') {
                $post_title = get_the_title($post_id);
                $words = explode(' ', $post_title);
                $last_word = end($words);
                $first_letter = strtoupper(substr($last_word, 0, 1));
                update_post_meta($post_id, 'first_letter', $first_letter);
            }
        }

        function save_last_word_as_post_meta($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
                return;

            $post = get_post($post_id);

            // Check if the post is of your custom post type
            if ($post->post_type === 'attorney') {
                $post_title = get_the_title($post_id);
                $words = explode(' ', $post_title);
                $last_word = end($words);
                update_post_meta($post_id, 'attorney_last_word', $last_word);
            }
        }

        // article search

        function article_search_ajax_callback() {
            $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
            $practice_area = isset($_POST['practice_area']) ? sanitize_text_field($_POST['practice_area']) : '';
            $industry_team = isset($_POST['industry_team']) ? sanitize_text_field($_POST['industry_team']) : '';
            $market_focus = isset($_POST['market_focus']) ? sanitize_text_field($_POST['market_focus']) : '';
            $office = isset($_POST['office']) ? sanitize_text_field($_POST['office']) : '';
            $news_types = isset($_POST['news_types']) ? sanitize_text_field($_POST['news_types']) : '';

            if (have_rows("publication_header", "option")) {
                while (have_rows("publication_header", "option")) : the_row();
                $pinned_article_id = get_sub_field("article_pinned");
                endwhile;
            }
            $args_article_pinned = array(
                'post_type' => 'publication',
                'post__in' => array($pinned_article_id),
            );

            if (empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) ) {
                $args = array(
                    'post_type' => 'publication', // Change to your custom post type name
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_article_id),
                    
                );
            } elseif (!empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus)  ) {
                $args = array(
                    'post_type' => 'publication', // Change to your custom post type name
                    's' => $search_query,
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_article_id),
                );
            }
            else {

            $args = array(
                'post_type' => 'publication', // Change to your custom post type name
                's' => $search_query,
                'posts_per_page' => -1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'practice_area',
                        'field'    => 'slug',
                        'terms'    => $practice_area,
                    ),
                    array(
                        'taxonomy' => 'industry_group',
                        'field'    => 'slug',
                        'terms'    => $industry_team,
                    ),
                    array(
                        'taxonomy' => 'market_focus',
                        'field'    => 'slug',
                        'terms'    => $market_focus,
                    ),
                ),
                'post__not_in' => array($pinned_article_id),
            );

          }

            $query = new WP_Query($args);

            $article_pinned_query = new WP_Query($args_article_pinned);
        if ($query->have_posts()) {
            if ($article_pinned_query->have_posts()) {
                while ($article_pinned_query->have_posts()) {
                $article_pinned_query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1-6.png';
                ?>
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                    <div class="attorneys-card">
                        <div class="event-schedule-img">
                            <div class="pin-mark"><a href="javascript:void(0)">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/marker--icon.png" alt="image" class="img-fluid"></a>
                            </div>                            
                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        </div>
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title(); ?></h6>
                                <p><?php if(!empty( get_field("publication_sub_title") )){ echo get_field("publication_sub_title") .' / '; } echo get_the_date(); ?></p>
                            </div>
                            <div class="card-arrow">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        }

            
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1-6.png';
                ?>
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                    <div class="attorneys-card">
                        <div class="event-schedule-img">                            
                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        </div>
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title(); ?></h6>
                                <p><?php if(!empty( get_field("publication_sub_title") )){ echo get_field("publication_sub_title") .' / '; } echo get_the_date(); ?></p>
                            </div>
                            <div class="card-arrow">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>    
                <?php
                }
                $article_posts = get_posts($args);
                $article_count = count($article_posts);
                if($article_count > 9){
                ?>
                <div class="loadmorebtnarea">
                    <div class="load-more-btn">
                        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            } else {
                echo '<p style="text-align: center; width: 100%;">No matches were found. Please try a different selection.</p>';
            }

            wp_die();
        }


        // news search

        function news_search_ajax_callback() {
            $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
            $practice_area = isset($_POST['practice_area']) ? sanitize_text_field($_POST['practice_area']) : '';
            $industry_team = isset($_POST['industry_team']) ? sanitize_text_field($_POST['industry_team']) : '';
            $market_focus = isset($_POST['market_focus']) ? sanitize_text_field($_POST['market_focus']) : '';
            $office = isset($_POST['office']) ? sanitize_text_field($_POST['office']) : '';
            $news_types = isset($_POST['news_types']) ? sanitize_text_field($_POST['news_types']) : '';

            if (have_rows("news_header", "option")) {
                while (have_rows("news_header", "option")) : the_row();
                $pinned_post_id = get_sub_field("pinned_post");
                endwhile;
            }

            $args_pinned = array(
                'post_type' => 'post',
                'post__in' => array($pinned_post_id),
            );
            

            if (empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) && empty($news_types) ) {
                $args = array(
                    'post_type' => 'post', // Change to your custom post type name
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_post_id),
                    
                );
            } elseif (!empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) && empty($news_types) ) {
                $args = array(
                    'post_type' => 'post', // Change to your custom post type name
                    's' => $search_query,
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_post_id),
                );
            }
            else {

            $args = array(
                'post_type' => 'post', // Change to your custom post type name
                's' => $search_query,
                'posts_per_page' => -1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'practice_area',
                        'field'    => 'slug',
                        'terms'    => $practice_area,
                    ),
                    array(
                        'taxonomy' => 'industry_group',
                        'field'    => 'slug',
                        'terms'    => $industry_team,
                    ),
                    array(
                        'taxonomy' => 'market_focus',
                        'field'    => 'slug',
                        'terms'    => $market_focus,
                    ),
                    array(
                        'taxonomy' => 'office',
                        'field'    => 'slug',
                        'terms'    => $office,
                    ),
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $news_types,
                    ),
                ),
                'post__not_in' => array($pinned_post_id),
            );

          }

            $query_pinned = new WP_Query($args_pinned);

            $query = new WP_Query($args);
            if ($query->have_posts()) {

            if ($query_pinned->have_posts()){
                while ($query_pinned->have_posts()){
                    $query_pinned->the_post();
                    $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1-6.png';
                    ?>
                    <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                        <div class="attorneys-card">
                            <div class="event-schedule-img">                                
                                <div class="pin-mark"><a href="javascript:void(0)">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/marker--icon.png" alt="image" class="img-fluid"></a>
                                </div>
                                <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                            </div>
                            <div class="card-content-flex">
                                <div class="card-content-text">
                                    <h6><?php echo get_the_title(); ?></h6>
                                    <p><?php echo get_the_date(); ?></p>
                                </div>
                                <div class="card-arrow">
                                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
                wp_reset_postdata();
            }
            
            }

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/sli1-6.png';
                ?>
                <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                    <div class="attorneys-card">
                        <div class="event-schedule-img">                            
                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        </div>
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title(); ?></h6>
                                <p><?php echo get_the_date(); ?></p>
                            </div>
                            <div class="card-arrow">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>    
                <?php
                }
                
                $news_posts = get_posts($args);
                $news_count = count($news_posts);
                if($news_count > 9){
                ?>
                <div class="loadmorebtnarea">
                    <div class="load-more-btn">
                        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                </div>
                <?php
                }    

                wp_reset_postdata();
            } else {
                echo '<p style="text-align: center; width: 100%;">No matches were found. Please try a different selection.</p>';
            }

            wp_die();
        }

        //video search

        function video_search_ajax_callback() {
            $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
            $practice_area = isset($_POST['practice_area']) ? sanitize_text_field($_POST['practice_area']) : '';
            $industry_team = isset($_POST['industry_team']) ? sanitize_text_field($_POST['industry_team']) : '';
            $market_focus = isset($_POST['market_focus']) ? sanitize_text_field($_POST['market_focus']) : '';
            $office = isset($_POST['office']) ? sanitize_text_field($_POST['office']) : '';

            if (have_rows("video_header", "option")) {
                while (have_rows("video_header", "option")) : the_row();
                $pinned_video_id = get_sub_field("pinned_video");
                endwhile;
            }
            $args_video_pinned = array(
                'post_type' => 'video',
                'post__in' => array($pinned_video_id),
            );

            if (empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) ) {
                $args = array(
                    'post_type' => 'video', // Change to your custom post type name
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_video_id),
                    
                );
            } elseif (!empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) ) {
                $args = array(
                    'post_type' => 'video', // Change to your custom post type name
                    's' => $search_query,
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_video_id),
                );
            }
            else {

            $args = array(
                'post_type' => 'video', // Change to your custom post type name
                's' => $search_query,
                'posts_per_page' => -1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'practice_area',
                        'field'    => 'slug',
                        'terms'    => $practice_area,
                    ),
                    array(
                        'taxonomy' => 'industry_group',
                        'field'    => 'slug',
                        'terms'    => $industry_team,
                    ),
                    array(
                        'taxonomy' => 'market_focus',
                        'field'    => 'slug',
                        'terms'    => $market_focus,
                    ),
                    array(
                        'taxonomy' => 'office',
                        'field'    => 'slug',
                        'terms'    => $office,
                    ),
                ),
                'post__not_in' => array($pinned_video_id),
            );

          }

            $video_pinned_query = new WP_Query($args_video_pinned);
            if ($video_pinned_query->have_posts()) {
                while ($video_pinned_query->have_posts()) {
                    $video_pinned_query->the_post();
                    $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12" >
                        <div class="attorneys-card">
                            <div class="event-schedule-img">
                                <div class="pin-mark"><a href="javascript:void(0)">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/marker--icon.png" alt="image" class="img-fluid"></a>
                                </div>
                                <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                                <div class="play-btn"><a href="<?php echo get_field("video_post_type_url", $query->ID); ?>" data-fancybox="gallery"><i class="fa fa-play" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="card-content-flex">
                                <div class="card-content-text">
                                    <h6><?php echo get_the_title(); ?></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
                ?>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12" >
                    <div class="attorneys-card">
                        <div class="event-schedule-img">
                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                            <div class="play-btn"><a href="<?php echo get_field("video_post_type_url", $query->ID); ?>" data-fancybox="gallery"><i class="fa fa-play" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title(); ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                $video_posts = get_posts($args);
                $video_count = count($video_posts);
                if($video_count > 9){
                ?>
                <div class="loadmorebtnarea">
                    <div class="load-more-btn">
                        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            } else {
                echo '<p style="text-align: center; width: 100%;">No matches were found. Please try a different selection.</p>';
            }

            wp_die();
        }

        // Alerts

        function alert_search_ajax_callback() {
            $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
            $practice_area = isset($_POST['practice_area']) ? sanitize_text_field($_POST['practice_area']) : '';
            $industry_team = isset($_POST['industry_team']) ? sanitize_text_field($_POST['industry_team']) : '';
            $market_focus = isset($_POST['market_focus']) ? sanitize_text_field($_POST['market_focus']) : '';
            $office = isset($_POST['office']) ? sanitize_text_field($_POST['office']) : '';
            
            if (have_rows("alert_header", "option")) {
                while (have_rows("alert_header", "option")) : the_row();
                $pinned_alert_id = get_sub_field("pinned_alert");
                endwhile;
            }
            $args_alert_pinned = array(
                'post_type' => 'alert',
                'post__in' => array($pinned_alert_id),
            );

            if (empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) ) {
                $args = array(
                    'post_type' => 'alert', // Change to your custom post type name
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_alert_id),
                    
                );
            } elseif (!empty($search_query) && empty($practice_area) && empty($industry_team) && empty($market_focus) && empty($office) ) {
                $args = array(
                    'post_type' => 'alert', // Change to your custom post type name
                    's' => $search_query,
                    'posts_per_page' => -1, // Show all posts
                    'post__not_in' => array($pinned_alert_id),
                );
            }
            else {

            $args = array(
                'post_type' => 'alert', // Change to your custom post type name
                's' => $search_query,
                'posts_per_page' => -1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'practice_area',
                        'field'    => 'slug',
                        'terms'    => $practice_area,
                    ),
                    array(
                        'taxonomy' => 'industry_group',
                        'field'    => 'slug',
                        'terms'    => $industry_team,
                    ),
                    array(
                        'taxonomy' => 'market_focus',
                        'field'    => 'slug',
                        'terms'    => $market_focus,
                    ),
                    array(
                        'taxonomy' => 'office',
                        'field'    => 'slug',
                        'terms'    => $office,
                    ),
                ),
                'post__not_in' => array($pinned_alert_id),
            );

          }

            $query = new WP_Query($args);

            $alert_pinned_query = new WP_Query($args_alert_pinned);

            if ($query->have_posts()) {
                if ($alert_pinned_query->have_posts()) {
                    while ($alert_pinned_query->have_posts()) {
                    $alert_pinned_query->the_post();
                    $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
                    ?>
    
                    <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                        <div class="attorneys-card">
                            <div class="event-schedule-img">
                                <div class="pin-mark"><a href="javascript:void(0)">
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/marker--icon.png" alt="image" class="img-fluid"></a>
                                </div>
                                <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                            </div>
                            <div class="card-content-flex">
                                <div class="card-content-text">
                                    <h6><?php echo get_the_title(); ?></h6>
                                    <p><?php echo get_the_date(); ?></p>
                                </div>
                                <div class="card-arrow">
                                    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
            }


            if ($query->have_posts()) {
                while ($query->have_posts()) {
                $query->the_post();
                $featured_image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url() : get_stylesheet_directory_uri().'/assets/images/events2.png';
                ?>

                <div onclick="location.href='<?php echo get_the_permalink(); ?>';" class="col-lg-4 col-md-4 col-sm-4 col-12" >
                    <div class="attorneys-card">
                        <div class="event-schedule-img">
                            <img src="<?php echo $featured_image_url; ?>" alt="image" class="img-fluid">
                        </div>
                        <div class="card-content-flex">
                            <div class="card-content-text">
                                <h6><?php echo get_the_title(); ?></h6>
                                <p><?php echo get_the_date(); ?></p>
                            </div>
                            <div class="card-arrow">
                                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/blue-arrow.png" alt="image" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                $alert_posts = get_posts($args);
                $alert_count = count($alert_posts);
                if($alert_count > 9){
                ?>
                <div class="loadmorebtnarea">
                    <div class="load-more-btn">
                        <a href="javascript:void(0)" class="load-more"><span>Load More</span> <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ad-right-angle.png" alt="image" class="img-fluid"></a>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            } else {
                echo '<p style="text-align: center; width: 100%;">No matches were found. Please try a different selection.</p>';
            }

            wp_die();
        }


        

    }

    new PCS_CUSTOM_SETTING();
}