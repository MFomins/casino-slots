<?php

if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('Slot_Games_Shortcodes')) {

    class Slot_Games_Shortcodes
    {

        private $plugin_name;

        private $version;


        public function __construct($plugin_name, $version)
        {
            $this->plugin_name = $plugin_name;

            $this->version = $version;

            $this->setup_hooks();
        }

        /**
         * Setup action/filter hooks
         * 
         */
        public function setup_hooks()
        {
            add_action('wp_enqueue_scripts', array($this, 'register_style'));
        }

        /**
         * Register placeholder style
         */
        public function register_style()
        {
            wp_register_style(
                $this->plugin_name . '-shortcodes',
                CASINO_SLOTS_PLUGIN_URL . 'public/css/casino-slots-shortcodes.css'
            );
        }


        /**
         * Shortcode for casino LIST
         */

        public function slots_list($atts, $content)
        {
            $atts = shortcode_atts(
                array(
                    'limit' => get_option('posts_per_page'),
                    'id' => '',
                    'pagination' => '',
                    'col' => '4',
                ),
                $atts,
                'slots_list'
            );

            $ids = $atts['id'];

            $ids = explode(',', $ids);

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $loop_args = array(
                'paged' => $paged,
                'orderby' => 'post__in date',
                'order' => 'ASC',
                'post_type' => 'slot',
                'posts_per_page' => $atts['limit'],
            );

            if (!empty($atts['id'])) {
                $loop_args['post__in'] = $ids;
            }

            $col_count = 'slots-col-' . $atts['col'];

            $loop = new WP_Query($loop_args);

            ob_start();
?>
            <div class="slots-container">
                <div class="slots-filter">
                    <?php include CASINO_SLOTS_BASE_DIR . 'includes/parts/slots-ajax-filter.php'; ?>
                </div>
                <div id='slots-loader' style="display: none;">
                    <img src=<?php echo '/wp-content/plugins/casino-slots/public/img/reload.gif'; ?>>
                </div>
                <div class="<?php echo $col_count; ?> slots-list">

                    <?php

                    while ($loop->have_posts()) :
                        $loop->the_post();
                        include CASINO_SLOTS_BASE_DIR . 'templates/shortcodes/slots-list.php';
                    // End the loop.
                    endwhile;
                    ?>
                </div>
                <?php if ($atts['pagination'] === 'on') : ?>
                    <div class="slots-pagination">
                        <?php
                        echo paginate_links(array(
                            'total'        => $loop->max_num_pages,
                            'current' => max(1, get_query_var('paged')),
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
<?php
            // Restore original post
            wp_reset_postdata();

            return ob_get_clean();
        }
    }
}