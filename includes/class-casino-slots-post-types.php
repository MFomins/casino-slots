<?php

if (!defined('ABSPATH')) {
    die;
}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Slot_Slots
 * @subpackage Slot_Slots/public
 */

/**
 * Functionality for Custom Post types
 *
 *
 * @package    Slot_Slots
 * @subpackage Slot_Slots/public
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */
if (!class_exists('Slot_Games_Post_Types')) :
    class Slot_Games_Post_Types
    {

        /**
         * The ID of this plugin.
         *
         * @since    1.0.0
         * @access   private
         * @var      string    $plugin_name    The ID of this plugin.
         */
        private $plugin_name;

        /**
         * The version of this plugin.
         *
         * @since    1.0.0
         * @access   private
         * @var      string    $version    The current version of this plugin.
         */
        private $version;

        private $template_loader;

        /**
         * Initialize the class and set its properties.
         *
         * @since    1.0.0
         * @param      string    $plugin_name       The name of the plugin.
         * @param      string    $version    The version of this plugin.
         */
        public function __construct($plugin_name, $version)
        {

            $this->plugin_name = $plugin_name;
            $this->version = $version;

            $this->template_loader = cs_get_template_loader();
        }

        /**
         * Hooked into 'init' action hook
         */

        public function init()
        {
            $this->register_cpt_slot();

            $this->register_taxonomy_category();
        }


        /**
         * Register custom Slot post type
         */

        public function register_cpt_slot()
        {
            $labels = array(
                'name'               => _x('Games', 'post type general name', 'casino-slots'),
                'singular_name'      => _x('Game', 'post type singular name', 'casino-slots'),
                'menu_name'          => _x('Games', 'admin menu', 'casino-slots'),
                'name_admin_bar'     => _x('Game', 'add new on admin bar', 'casino-slots'),
                'add_new'            => _x('Add New', 'game', 'casino-slots'),
                'add_new_item'       => __('Add New Game', 'casino-slots'),
                'new_item'           => __('New Game', 'casino-slots'),
                'edit_item'          => __('Edit Game', 'casino-slots'),
                'view_item'          => __('View Game', 'casino-slots'),
                'all_items'          => __('All Games', 'casino-slots'),
                'search_items'       => __('Search Games', 'casino-slots'),
                'parent_item_colon'  => __('Parent Games:', 'casino-slots'),
                'not_found'          => __('No games found.', 'casino-slots'),
                'not_found_in_trash' => __('No games found in Trash.', 'casino-slots'),
                'featured_image'     => __('Set Game Image', 'casino-slots')
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __('Description.', 'slot'),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array('slug' => 'spielautomaten'),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'taxonomies'         => array('slot'),
                'menu_position'      => null,
                'menu_icon'          => 'dashicons-image-filter',
                'supports'           => array('title', 'editor', 'author', 'thumbnail')
            );

            register_post_type('slot', $args);
        }

        public function register_taxonomy_category() {
            register_taxonomy('slot-category', array('slot'), array(
                'description'       => 'Slot Category',
                'labels'            => array(
                    'name'                       => _x('Slot Category', 'taxonomy general name', 'casino-slots'),
                    'singular_name'              => _x('Slot Category', 'taxonomy singular name', 'casino-slots'),
                    'search_items'               => __('Search Slot Category', 'casino-slots'),
                    'popular_items'              => __('Popular Slot Category', 'casino-slots'),
                    'all_items'                  => __('All Slot Category', 'casino-slots'),
                    'parent_item'                => __('Parent Slot Category', 'casino-slots'),
                    'parent_item_colon'          => __('Parent Slot Category:', 'casino-slots'),
                    'edit_item'                  => __('Edit Slot Category', 'casino-slots'),
                    'view_item'                  => __('View Slot Category', 'casino-slots'),
                    'update_item'                => __('Update Slot Category', 'casino-slots'),
                    'add_new_item'               => __('Add New Slot Category', 'casino-slots'),
                    'new_item_name'              => __('New Slot Category Name', 'casino-slots'),
                    'separate_items_with_commas' => __('Separate casino slot category with commas', 'casino-slots'),
                    'add_or_remove_items'        => __('Add or remove casino slot category', 'casino-slots'),
                    'choose_from_most_used'      => __('Choose from the most used casino slot category', 'casino-slots'),
                    'not_found'                  => __('No casino slot category found.', 'casino-slots'),
                ),
                'public'            => false,
                'show_ui'           => true,
                'show_in_nav_menus' => true,
                'show_admin_column' => true,
                'rewrite'           => false,
                'capabilities'      => array(),
                'show_in_rest'      => true,
            ));
        }

        /**
         * Single template for CPT Game
         */

        public function single_template_slot($template)
        {

            if (is_singular('slot')) {

                //template for CPT game

                return $this->template_loader->get_template_part('single', 'slot', false);
            }

            return $template;
        }

        /**
         * Archive template for CPT Game
         */

        public function archive_template_slot($template)
        {

            if (cs_is_archive_slot()) {

                //template for CPT game

                return $this->template_loader->get_template_part('archive', 'slot', false);
            }

            return $template;
        }

        /**
         * Adding Metaboxes using CMB2 framework
         */
        public function register_cmb2_metabox_slot()
        {
            /**
             * Creating METABOX for LIST layout
             */
            $games_list = new_cmb2_box(array(
                'id' => 'casino-slots-data',
                'title' => __('Games Meta Data', 'slots'),
                'object_types' => array('slot'),
                'context' => 'normal'
            ));

            $games_list->add_field(array(
                'name'    => 'Redirect LINK',
                'desc'    => 'Example - /iet-uz/optibet',
                'id'      => 'cg_redirect_link',
                'type'    => 'text'
            ));

            $games_list->add_field(array(
                'name'    => 'Game iframe source URL',
                'id'      => 'cg_game_src',
                'type'    => 'text'
            ));

            $games_list->add_field(array(
                'name'    => 'Provider',
                'desc'    => 'Enter provider',
                'id'      => 'cg_provider',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'RTP',
                'desc'    => 'Game RTP %',
                'id'      => 'cg_rtp',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'Released',
                'id'      => 'cg_released',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'Paylines',
                'id'      => 'cg_paylines',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'Reels',
                'id'      => 'cg_reels',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'Min Coins Per Line',
                'id'      => 'cg_min_per_line',
                'type'    => 'text_medium'
            ));

            $games_list->add_field(array(
                'name'    => 'Max Coins Per Line',
                'id'      => 'cg_max_per_line',
                'type'    => 'text_medium'
            ));

             // $games_list->add_field(array(
            //     'name'    => 'Jackpot',
            //     'id'      => 'cg_jackpot',
            //     'type'    => 'text_medium'
            // ));
        }
    }
endif;