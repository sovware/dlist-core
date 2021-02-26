<?php
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Plugin as Plugin;

if (!class_exists('dlistWidgets')) {
    final class dlistWidgets
    {
        const VERSION = '1.0.0';
        const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
        const MINIMUM_PHP_VERSION = '5.6';

        private static $_instance = null;

        public static function instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct()
        {
            add_action('plugins_loaded', [$this, 'init']);
        }

        public function init()
        {
            // Add Plugin actions
            add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
            add_action('elementor/elements/categories_registered', [$this, 'dlist_widget_category']);
        }

        public function init_widgets()
        {
            require_once(__DIR__ . '/widgets.php');

            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Accordion());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Blogs());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Counter());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_ContactForm());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_videoPopup());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_FeatureBox());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Testimonial());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Team());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Heading());
            Plugin::instance()->widgets_manager->register_widget_type(new dlist_Subscribe());
            Plugin::instance()->widgets_manager->register_widget_type(new CTA());
            
            if ( class_exists( 'Directorist_Base' ) ) {
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_ContactItems());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_AddListing_Form());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Categories());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Checkout());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Logos());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Profile());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Dashboard());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Listings());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_ListingsCarousel());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_ListingsMap());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Locations());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Login());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Registration());
                Plugin::instance()->widgets_manager->register_widget_type(new booking_confirmation());
                if ( class_exists( 'Post_Your_Need' ) ) {
                    Plugin::instance()->widgets_manager->register_widget_type(new dlist_NeedCategories());
                    Plugin::instance()->widgets_manager->register_widget_type(new dlist_NeedLocations());
                    Plugin::instance()->widgets_manager->register_widget_type(new dlist_NeedSingleCat());
                    Plugin::instance()->widgets_manager->register_widget_type(new dlist_NeedSingleLoc());
                    Plugin::instance()->widgets_manager->register_widget_type(new dlist_Needs());
                }
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Payment());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_PricingPlan());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SearchForm());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SearchResult());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SearchResultMap());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleCat());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleCatMap());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleLoc());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleLocMap());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleTag());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_SingleTagMap());
                Plugin::instance()->widgets_manager->register_widget_type(new dlist_Transaction());
            }
        }

        public function dlist_widget_category($manager)
        {
            $manager->add_category(
                'dlist_category',
                [
                    'title' => __('dlist', 'dlist-core'),
                ]
            );
        }
    }

    dlistWidgets::instance();
}
