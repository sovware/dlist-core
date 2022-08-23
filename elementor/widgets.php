<?php
use \Directorist\Directorist_Listing_Search_Form;
use Directorist\Helper;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Repeater;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}

//Heading Pro
class dlist_Heading extends Widget_Base
{

    public function get_name()
    {
        return 'heading_pro section-title';
    }

    public function get_title()
    {
        return __('Heading Pro', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-t-letter';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['heading', 'pro', 'Heading Pro'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'heading_pro',
            [
                'label' => __('Title & Subtitle', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Title', 'dlist-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter your title', 'dlist-core'),
                'default'     => __('Add Your Heading Text Here', 'dlist-core'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Link', 'dlist-core'),
                'type'  => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'header_size',
            [
                'label'   => __('HTML Tag', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'h1'   => 'H1',
                    'h2'   => 'H2',
                    'h3'   => 'H3',
                    'h4'   => 'H4',
                    'h5'   => 'H5',
                    'h6'   => 'H6',
                    'div'  => 'div',
                    'span' => 'span',
                    'p'    => 'p',
                ],
                'default' => 'h2',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'       => __('Subtitle', 'dlist-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter your subtitle', 'dlist-core'),
                'default'     => __('Add Your subtitle Text Here', 'dlist-core'),
            ]
        );

        $this->add_control(
            'align',
            [
                'label'   => __('Alignment', 'dlist-core'),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'dlist-core'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'dlist-core'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'dlist-core'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'dlist-core'),
                        'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'  => __('Title  Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'  => __('Subtitle  Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $title      = $settings['title'];
        $subtitle   = $settings['subtitle'] ? '<p>' . $settings['subtitle'] . '</p>' : '';
        $header     = $settings['header_size'];
        $link       = $settings['link']['url'];
        $target     = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['link']['nofollow'] ? 'rel="nofollow"' : '';
        $title_attr = $settings['link']['custom_attributes'];

        if ($link) {
            $title = sprintf('<a href="%s" %s %s title="%s" >%s</a>', $link, $target, $nofollow, $title_attr, $title);
        }

        echo sprintf('<div class="section-title"> <%1$s> %2$s </%1$s> %3$s</div>', $header, $title, $subtitle);
    }
}

//Accordion
class dlist_Accordion extends Widget_Base
{

    public function get_name()
    {
        return 'accordion';
    }

    public function get_title()
    {
        return __('Faq', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['accordion', 'tabs', 'faq'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => __('Faq', 'dlist-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label'       => __('Title & Content', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Accordion Title', 'dlist-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'label'      => __('Content', 'dlist-core'),
                'type'       => Controls_Manager::TEXTAREA,
                'default'    => __('Accordion Content', 'dlist-core'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label'   => __('Accordion Items', 'dlist-core'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title'   => __('Title?', 'dlist-core'),
                        'tab_content' => __('Content description', 'dlist-core'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $accordions = $settings['tabs']; ?>

        <div class="faq-contents">
            <div class="atbd_content_module atbd_faqs_module">
                <div class="atbdb_content_module_contents">
                    <div class="atbdp-accordion dlist_accordion">
                        <?php if ($accordions) {
                            foreach ($accordions as $key => $accordion) {
                                $title = $accordion['tab_title'];
                                $desc  = $accordion['tab_content']; ?>
                                <div class="dacc_single <?php echo (0 == $key) ? esc_html('selected') : ''; ?>">
                                    <h3 class="faq-title">
                                        <a href="#" class="<?php echo (0 == $key) ? esc_html('active') : ''; ?>"><?php echo esc_attr($title); ?></a>
                                    </h3>
                                    <p class="dac_body"><?php echo esc_attr($desc); ?></p>
                                </div>
                                <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}

//Add listing form
class dlist_AddListing_Form extends Widget_Base
{
    public function get_name()
    {
        return 'add_listing_form';
    }

    public function get_title()
    {
        return __('Add Listing Form', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-post-excerpt';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['Listing form', 'form', 'add listing'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'add_listing_form',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'form_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        echo do_shortcode('[directorist_add_listing]');
    }
}

//Author Profile
class dlist_Profile extends Widget_Base
{
    public function get_name()
    {
        return 'author_profile';
    }

    public function get_title()
    {
        return __('Author Profile', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-site-identity';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['profile', 'author', 'author profile'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'author_profile',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'profile_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'profile_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="author_area">
            <?php echo do_shortcode('[directorist_author_profile]'); ?>
        </div>
    <?php
    }
}

//Blog Posts
class dlist_Blogs extends Widget_Base
{
    public function get_name()
    {
        return 'blog_posts';
    }

    public function get_title()
    {
        return __('Blogs', 'dlist-core');
    }

    public function get_icon()
    {
        return '  eicon-post';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['blog', 'post', 'blog post'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'blog_posts',
            [
                'label' => __('Blog Posts', 'dlist-core'),
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label'   => __('Number of Posts to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 3,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'ID'            => esc_html__(' Post ID', 'dlist-core'),
                    'author'        => esc_html__(' Author', 'dlist-core'),
                    'title'         => esc_html__(' Title', 'dlist-core'),
                    'name'          => esc_html__(' Post name (post slug)', 'dlist-core'),
                    'type'          => esc_html__(' Post type (available since Version 4.0)', 'dlist-core'),
                    'date'          => esc_html__(' Date', 'dlist-core'),
                    'modified'      => esc_html__(' Last modified date', 'dlist-core'),
                    'rand'          => esc_html__(' Random order', 'dlist-core'),
                    'comment_count' => esc_html__(' Number of comments', 'dlist-core')
                ],
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Order post', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC'  => esc_html__(' ASC', 'dlist-core'),
                    'DESC' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $post_count = $settings['post_count'];
        $order_by   = $settings['order_by'];
        $order_list = $settings['order_list'];

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_attr($post_count),
            'order'          => esc_attr($order_list),
            'orderby '       => esc_attr($order_by)
        );

        $posts = new WP_Query($args); ?>
        <div class="blog-posts row" data-uk-grid>
            <?php while ($posts->have_posts()) {
                $posts->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-posts__single">
                        <?php the_post_thumbnail('dlist_blog_grid'); ?>
                        <div class="blog-posts__single__contents">
                            <?php the_title(sprintf('<h4><a href="%s">', get_the_permalink()), '</a></h4>'); ?>
                            <ul>
                                <li><?php echo function_exists('dlist_time_link') ? dlist_time_link() : ''; ?></li>
                                <?php if (function_exists('dlist_post_cats')) {
                                    dlist_post_cats();
                                } ?>
                            </ul>
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata(); ?>
        </div>
    <?php
    }
}

//Categories
class Dlist_Categories extends Widget_Base
{
    public function get_name()
    {
        return 'categories';
    }

    public function get_title()
    {
        return __('Listing Categories', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-theme-builder';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['categories', 'all categories', 'listing categories'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'categories',
            [
                'label' => __('Listing categories', 'dlist-core'),
            ]
        );

        $this->add_control(
            'cat_type',
            [
                'label'   => __('Style', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'category-style1',
                'options' => [
                    'category-style1'    => esc_html__('Style 1', 'dlist-core'),
                    'style3' => esc_html__('Style 2', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
                'condition' => [
                    'cat_type!' => ['style3'],
                ]
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
                'condition' => [
                    'cat_type!' => ['style3'],
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => esc_html__('Categories Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '6' => esc_html__('6 Items / Row', 'dlist-core'),
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'cat_type!' => 'style3'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of categories to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
                'default' => 6,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => esc_html__('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id'    => esc_html__(' Cat ID', 'dlist-core'),
                    'count' => esc_html__('Listing Count', 'dlist-core'),
                    'name'  => esc_html__('Category name (A-Z)', 'dlist-core'),
                    'slug'  => esc_html__('Select Category', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'slug',
            [
                'label'     => esc_html__('Select Categories', 'dlist-core'),
                'type'      => Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => function_exists('dlist_listing_category') ? dlist_listing_category() : [],
                'condition' => [
                    'order_by' => 'slug'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => esc_html__('Categories Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => array(
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        if (!class_exists('Directorist_Base')) {
            return;
        }
        $settings   = $this->get_settings_for_display();
        $cat_type   = $settings['cat_type'];

        if ('style3' === $cat_type) {
            az_template('/elementor/cat/view2', $settings);
        } else {
            az_template('/elementor/cat/view1', $settings);
        }
    }
}

//Locations
class Dlist_Locations extends Widget_Base
{
    public function get_name()
    {
        return 'locations';
    }

    public function get_title()
    {
        return __('Listing Locations', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-map-pin';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['locations', 'all location', 'listing locations'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'locations',
            [
                'label' => __('Listing Locations', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('Style', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'masonry' => esc_html__('Masonry View', 'dlist-core'),
                    'carousel' => esc_html__('Carousel View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
                'condition' => [
                    'layout' => ['grid','list'],
                ]
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
                'condition' => [
                    'layout' => ['grid','list'],
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Locations Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => ['carousel','masonry'],
                ]
            ]
        );

        $this->add_control(
            'number_loc',
            [
                'label'   => __('Number of Locations to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 1000,
                'step'    => 1,
                'default' => 4,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id'    => esc_html__('Location ID', 'dlist-core'),
                    'count' => esc_html__('Listing Count', 'dlist-core'),
                    'name'  => esc_html__(' Location name (A-Z)', 'dlist-core'),
                    'slug'  => esc_html__('Select Location', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'slug',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : [],
                'condition' => [
                    'order_by' => 'slug',
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Locations Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $layout     = $settings['layout'];

        if ('masonry' === $layout) {
            az_template('/elementor/location/view2', $settings);
        } elseif ('carousel' === $layout) {
            az_template('/elementor/location/view3', $settings);
        } else {
            az_template('/elementor/location/view1', $settings);
        }
    }
}

//Checkout
class dlist_Checkout extends Widget_Base
{
    public function get_name()
    {
        return 'checkout';
    }

    public function get_title()
    {
        return __('Checkout', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-product-price';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['checkout', 'payment', 'checkout payment'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'checkout',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'checkout_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'checkout_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-directorist_checkout">
            <?php echo do_shortcode('[directorist_checkout]'); ?>
        </div>
        <?php
    }
}

//Contact form 7
class dlist_ContactForm extends Widget_Base
{
    public function get_name()
    {
        return 'contact_form';
    }

    public function get_title()
    {
        return __('Contact Form', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-form-horizontal';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['contact', 'form', 'contact form'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __('Contact Form', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Form Title', 'dlist-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __('Contact Form', 'dlist-core'),
                'default'     => 'Contact Form',
            ]
        );

        $this->add_control(
            'contact_form_id',
            [
                'label'   => __('Select Contact Form', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => function_exists('mp_get_cf7_names') ? mp_get_cf7_names() : [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $title           = $settings['title'];
        $contact_form_id = $settings['contact_form_id'];

        if ($contact_form_id) { ?>
            <div class="contact-wrapper ">
                <?php if ($title) { ?>
                    <div class="contact-wrapper__title">
                        <h4><?php echo esc_attr($title); ?></h4>
                    </div>
                <?php
                } ?>
                <div class="contact-wrapper__fields">
                    <?php echo do_shortcode('[contact-form-7 id="' . intval(esc_attr($contact_form_id)) . '" ]'); ?>
                </div>
            </div>
        <?php
        }
    }
}

//Contact items
class dlist_ContactItems extends Widget_Base
{
    public function get_name()
    {
        return 'contact_items';
    }

    public function get_title()
    {
        return __('Contact Items', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-bullet-list';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['address', 'list', 'item', 'contact items'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'contact_items',
            [
                'label' => __('Contact Items', 'dlist-core'),
            ]
        );

        //Contact Items
        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label'      => __('Title', 'dlist-core'),
                'type'       => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        );
        $repeater->add_control(
            'subtitle',
            [
                'label'      => __('Subtitle', 'dlist-core'),
                'type'       => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => __('Font-Awesome', 'dlist-core'),
                'type'  => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'items',
            [
                'label'   => __('Add New Items', 'dlist-core'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'icon'     => 'fa fa-map-o',
                        'title'    => __('Address', 'dlist-core'),
                        'subtitle' => __('Enter your address description', 'dlist-core'),
                    ]
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        az_template('/elementor/contact/view', $settings);
    }
}

//Counter
class dlist_Counter extends Widget_Base
{
    public function get_name()
    {
        return 'counter';
    }

    public function get_title()
    {
        return __('Counter', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-counter';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['count', 'counter', 'count down'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_counter',
            [
                'label' => __('Counter', 'dlist-core'),
            ]
        );

        $this->add_control(
            'number',
            [
                'label'   => __('Number', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 42,
            ]
        );

        $this->add_control(
            'suffix',
            [
                'label'   => __('Number Suffix', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'k+',
            ]
        );

        $this->add_control(
            'label',
            [
                'label'   => __('Title', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Business Listing',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $number   = $settings['number'];
        $suffix   = $settings['suffix'];
        $title    = $settings['label']; ?>
        <div class="list-unstyled counter-items">
            <div>
                <p>
                    <span class="count_up"><?php echo esc_attr($number); ?></span>
                    <?php echo esc_attr($suffix); ?>
                </p>
                <span><?php echo esc_attr($title); ?></span>
            </div>
        </div>
    <?php
    }
}

//Counter
class dlist_videoPopup extends Widget_Base
{
    public function get_name()
    {
        return 'video_play';
    }

    public function get_title()
    {
        return __('Video Player', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-instagram-video';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['video play', 'Play', 'popup'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'video_play',
            [
                'label' => __('Video Play', 'dlist-core'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Video Thumbnail', 'dlist-core'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label'       => __('Video Link', 'dlist-core'),
                'type'        => Controls_Manager::URL,
                'description' => esc_html__('Enter link to video.', 'dlist-core'),
            ]
        );

        $this->add_control(
            'btn',
            [
                'label'   => __('Play Button Text', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Play Video',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        $image      = $settings['image'];
        $video_link = $settings['video_link'];
        $btn        = $settings['btn']; ?>

        <div class="video_wrapper bgimage">
            <div class="bg_image_holder">
                <img src="<?php echo esc_url($image['url']); ?>" alt="video">
            </div>
            <div class="content_above">
                <?php if ( $video_link['url'] ) { ?>
                    <a href="<?php echo esc_url($video_link['url']); ?>" class="video-iframe btn-play">
                        <span class="btn-icon"><i class="la la-youtube-play"></i></span>
                        <span><?php echo esc_attr($btn); ?></span>
                    </a>
                <?php } ?>
            </div>
        </div>

    <?php
    }
}

//Dashboard
class dlist_Dashboard extends Widget_Base
{
    public function get_name()
    {
        return 'dashboard';
    }

    public function get_title()
    {
        return __('Author Dashboard', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-dashboard';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['dashboard', 'author dashboard'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'dashboard',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dashboard_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dashboard_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        echo do_shortcode('[directorist_user_dashboard]');
    }
}


//Feature Box
class dlist_FeatureBox extends Widget_Base
{
    public function get_name()
    {
        return 'feature_box';
    }

    public function get_title()
    {
        return __('Feature List', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-post-list';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['feature', 'feature list', 'feature box'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'feature_box',
            [
                'label' => __('Feature List', 'dlist-core'),
            ]
        );

        $this->add_control(
            'type',
            [
                'label'   => __('Type', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image Type', 'dlist-core'),
                    'icon'  => esc_html__('Icon Type', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'     => __('Font-Awesome', 'dlist-core'),
                'type'      => Controls_Manager::ICON,
                'default'   => 'la la-money',
                'condition' => [
                    'type' => 'icon'
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     => __('Image', 'dlist-core'),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Feature title'
            ]
        );

        $this->add_control(
            'desc',
            [
                'label'   => __('Description', 'dlist-core'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Feature description',
            ]
        );

        $this->end_controls_section();

        //Style section
        $this->start_controls_section(
            'feature_box_style',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'  => __('Icon  Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label'  => __('Icon Background  Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block-single__icon' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $type     = $settings['type'];
        $image    = $settings['image'];
        $icon     = $settings['icon'];
        $title    = $settings['title'];
        $desc     = $settings['desc']; ?>
        <div class="block-single">
            <?php
            if ('icon' == $type) { ?>
                <div class="block-single__icon">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
            <?php
            } else { ?>
                <div class="block-single__image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo function_exists('dlist_get_image_alt') ? esc_attr(dlist_get_image_alt($image['id'])) : ''; ?>">
                </div>
            <?php
            } ?>
            <h4 class="block-single__title"><?php echo esc_attr($title) ?></h4>
            <p class="block-single__text"><?php echo esc_attr($desc) ?></p>
        </div>
    <?php
    }
}

//Listings
class Dlist_Listings extends Widget_Base
{
    public function get_name()
    {
        return 'listings';
    }

    public function get_title()
    {
        return __('All Listings', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['listings', 'all listings'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'listings',
            [
                'label' => __('Listings', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'map'  => esc_html__('Map View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'zoom_level',
            [
                'label'   => __('Map Zoom Level', 'dlist-core'),
                'type'    => Controls_Manager::SLIDER ,
                'range' => [
					'px' => [
						'min' => 1,
						'max' => 18,
						'step' => 1,
					],
                ],
                'default' => [
					'unit' => 'px',
					'size' => 10,
				],
                'condition' => [
                    'layout' => 'map'
                ]
            ]
        );
        
        $this->add_control(
            'header',
            [
                'label'   => __('Show Header?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
                'condition' => [
                    'layout!' => 'carousel'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Listings Found Text', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Listings Found', 'dlist-core'),
                'label_block' => true,
                'condition'   => [
                    'header' => 'yes',
                    'layout!' => 'carousel'
                ]
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'       => __('Section Title', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition'   => [
                    'layout' => 'carousel'
                ]

            ]
        );

        $this->add_control(
            'view_more_label',
            [
                'label'       => __('View More Label', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition'   => [
                    'layout' => 'carousel'
                ]
            ]
        );

        $this->add_control(
            'view_more_url',
            [
                'label'       => __('View More URL', 'dlist-core'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'condition'   => [
                    'layout' => 'carousel'
                ]
            ]
        );

        $this->add_control(
            'sidebar',
            [
                'label'     => __('Show sidebar?', 'dlist-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'no',
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Listings Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid',
                ]
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label'     => __('Map Height', 'dlist-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 300,
                'max'       => 1980,
                'default'   => 500,
                'condition' => [
                    'layout' => 'map'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 6,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : [],
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
                'condition' => [
                    'layout!' => 'carousel'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $data   = $this->get_settings();
        
        $atts = array(
            'header'            => $data['header'],
            'show_pagination'   => $data['show_pagination'],
            'header_title'      => $data['title'],
            'advanced_filter'   => 'no',
            'view'              => $data['layout'],
            'listings_per_page' => $data['number_cat'],
            'columns'           => $data['row'],
            'category'          => $data['cat'] ? implode( ',', $data['cat'] ) : '',
            'location'          => $data['location'] ? implode( ',', $data['location'] ) : '',
            'tag'               => $data['tag'] ? implode( ',', $data['tag'] ) : '',
            'featured_only'     => $data['featured'],
            'popular_only'      => $data['popular'],
            'orderby'           => $data['order_by'],
            'order'             => $data['order_list'],
            'map_height'        => $data['map_height'],
            'sidebar'           => $data['sidebar'],
            'is_elementor'      => true,
        );

        if ( Helper::multi_directory_enabled() ) {
			if ( $data['types'] ) {
				$atts['directory_type'] = $data['types'];
			}
		}
        ?>

        <div id="<?php echo esc_attr( 'listing-' . $atts['view'] ); ?>" data-carousel-items="3" data-carousel-loop="false" data-carousel-autoplay="true" data-carousel-delay="2000">
            <?php wpwax_run_shortcode( 'directorist_all_listing', $atts ); ?>
        </div>

        <?php
    }
}

//Listings Carousel
class dlist_ListingsCarousel extends Widget_Base
{
    public function get_name()
    {
        return 'listings_carousel';
    }

    public function get_title()
    {
        return __('Listings Carousel', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-posts-carousel';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['carousel', 'listing carousel'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'listings_carousel',
            [
                'label' => __('Listings Carousel', 'dlist-core'),
            ]
        );
        
        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );
        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Listing Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Listing Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'column',
            [
                'type'    => Controls_Manager::SELECT,
                'label'     => esc_html__( 'Number of columns', 'dlist-core' ),
				'options'   => array(
					'2' => esc_html__( '2', 'dlist-core' ),
					'3' => esc_html__( '3', 'dlist-core' ),
					'4' => esc_html__( '4', 'dlist-core' ),
					'5' => esc_html__( '5', 'dlist-core' ),
					'6' => esc_html__( '6', 'dlist-core' ),
				),
                'default'   => '6',
            ]
        );
        $this->add_control(
            'list_num',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 6,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label'       => esc_html__( 'Autoplay', 'dlist-core' ),
				'label_on'    => esc_html__( 'On', 'dlist-core' ),
				'label_off'   => esc_html__( 'Off', 'dlist-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'dlist-core' ),
            ]
        );

        $this->add_control(
            'slider_interval',
            [
                'type'    => Controls_Manager::SELECT,
                'label'     => esc_html__( 'Number of columns', 'dlist-core' ),
				'label'       => esc_html__( 'Autoplay Interval', 'dlist-core' ),
				'options'     => array(
					'5000' => esc_html__( '5 Seconds', 'dlist-core' ),
					'4000' => esc_html__( '4 Seconds', 'dlist-core' ),
					'3000' => esc_html__( '3 Seconds', 'dlist-core' ),
					'2000' => esc_html__( '2 Seconds', 'dlist-core' ),
					'1000' => esc_html__( '1 Second', 'dlist-core' ),
				),
				'default'     => '2000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'dlist-core' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        az_template('/elementor/listing/view', $settings);
    }
}

//Listings with map
class dlist_ListingsMap extends Widget_Base
{
    public function get_name()
    {
        return 'listings_map';
    }

    public function get_title()
    {
        return __('Listings With Map', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-google-maps';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['map', 'listings map', 'listing map'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'listings_map',
            [
                'label' => __('Listings With Map', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Listings Found Text', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Listings Found', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => esc_html__('2 Column', 'dlist-core'),
                    '3' => esc_html__('3 Column', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 4,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ]               
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $cat             = $settings['cat'] ? implode($settings['cat'], []) : '';
        $tag             = $settings['tag'] ? implode($settings['tag'], []) : '';
        $location        = $settings['location'] ? implode($settings['location'], []) : '';
        $featured        = $settings['featured'];
        $popular         = $settings['popular'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : ''; ?>

        <input type="hidden" id="listing-listings_with_map">

        <?php echo do_shortcode( '[directorist_all_listing view="listings_with_map" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" action_before_after_loop="no" popular_only="' . esc_attr($popular) . '" header="yes" header_title ="' . esc_attr($title) . '" show_pagination="' . esc_attr($show_pagination) . '" display_preview_image="yes" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" listings_with_map_columns="' . esc_attr($layout) . '"]' );
    }
}

//Registration
class dlist_Registration extends Widget_Base
{
    public function get_name()
    {
        return 'registration';
    }

    public function get_title()
    {
        return __('Registration Form', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-lock-user';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'Registration',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'Registration_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'Registration_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-directorist_custom_registration">
            <?php echo do_shortcode('[directorist_custom_registration]'); ?>
        </div>
        <?php
    }
}

//Login
class dlist_Login extends Widget_Base
{
    public function get_name()
    {
        return 'login';
    }

    public function get_title()
    {
        return __('Login Form', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-lock-user';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'login',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'login_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'login_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-directorist_user_login">
            <?php echo do_shortcode('[directorist_user_login]'); ?>
        </div>
    <?php
    }
}

//Transaction
class dlist_Transaction extends Widget_Base
{
    public function get_name()
    {
        return 'transaction';
    }

    public function get_title()
    {
        return __('Transaction', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-sync';
    }

    public function get_keywords()
    {
        return ['transaction'];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }


    protected function register_controls()
    {
        $this->start_controls_section(
            'transaction',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'transaction_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'transaction_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-directorist_transaction_failure">
            <?php echo do_shortcode('[directorist_transaction_failure]'); ?>
        </div>
    <?php
    }
}

//Logos
class dlist_Logos extends Widget_Base
{
    public function get_name()
    {
        return 'logos';
    }

    public function get_title()
    {
        return __('Logos Carousel', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-carousel';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['logo', 'logos', 'carousel',];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'logos',
            [
                'label' => __('Logos', 'dlist-core'),
            ]
        );

        $this->add_control(
            'clients_logo',
            [
                'label'   => __('Add Logos', 'dlist-core'),
                'type'    => Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $logos    = $settings['clients_logo']; ?>
        <div class="logo-carousel owl-carousel">
            <?php
            if ($logos) {
                foreach ($logos as $logo) { ?>
                    <div class="carousel-single">
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo function_exists('dlist_get_image_alt') ? dlist_get_image_alt($logo['id']) : ''; ?>">
                    </div>
            <?php
                }
                wp_reset_postdata();
            } ?>
        </div>
        <?php
    }
}

//Payment
class dlist_Payment extends Widget_Base
{
    public function get_name()
    {
        return 'payment';
    }

    public function get_title()
    {
        return __('Payment', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-product-breadcrumbs';
    }

    public function get_keywords()
    {
        return ['payment',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'payment',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'payment_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'payment_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-payment-receipt">
            <?php echo do_shortcode('[directorist_payment_receipt]'); ?>
        </div>
    <?php
    }
}

//Pricing plan
class dlist_PricingPlan extends Widget_Base
{
    public function get_name()
    {
        return 'pricing_plan';
    }

    public function get_title()
    {
        return __('Pricing Plan', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    public function get_keywords()
    {
        return ['pricing', 'price',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'pricing_plan',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'pp_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'pp_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        echo do_shortcode('[directorist_pricing_plans]');
    }
}

//Hero area
class dlist_SearchForm extends Widget_Base
{

    public function get_name()
    {
        return 'search_form';
    }

    public function get_title()
    {
        return __('Listing Search Form', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-site-search';
    }

    public function get_keywords()
    {
        return ['search', 'form', 'listing form'];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'hero_area',
            [
                'label' => __('General', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
            ]
        );

        $this->add_control(
            'search',
            [
                'label'       => __('Search Button Text', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Search'
            ]
        );

        $this->add_control(
            'more_btn',
            [
                'label'   => __('More Filter Button', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Category?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'popular_cat_color',
            [
                'label'  => __('Category Text Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .directorist-listing-category-top ul li a p,
                    {{WRAPPER}} .directorist-listing-category-top ul li a span,
                    {{WRAPPER}} .directorist-search-contents .directorist-listing-type-selection .directorist-listing-type-selection__item .directorist-listing-type-selection__link--current' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .directorist-search-contents .directorist-listing-type-selection .directorist-listing-type-selection__item a:after' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings       = $this->get_settings_for_display();
        $search         = $settings['search'];
        $popular_cat    = $settings['popular'];
        $more_btn       = $settings['more_btn'];
        $default_types	= $settings['default_types'];
        $types          = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        ?>

        <?php echo do_shortcode( '[directorist_search_listing show_title_subtitle="no" search_button="yes" search_button_text="'.$search.'" more_filters_button="'.$more_btn.'" more_filters_text="" more_filters_display="overlapping" directory_type="'.$types.'" default_directory_type="'.$default_types.'" show_popular_category="'.$popular_cat.'"]' ); ?>

        <?php
    }
}

//Search result
class Dlist_SearchResult extends Widget_Base
{
    public function get_name()
    {
        return 'search_result';
    }

    public function get_title()
    {
        return __('Search Result', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-search-results';
    }

    public function get_keywords()
    {
        return ['result', 'search'];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'search_result',
            [
                'label' => __('Search Result', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
            ]
        );
        
        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'header',
            [
                'label'   => __('Show Header?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'map'  => esc_html__('Map View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Listings Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label'     => __('Map Height', 'dlist-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 300,
                'max'       => 1980,
                'default'   => 500,
                'condition' => [
                    'layout' => 'map'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $header          = $settings['header'];
        $show_pagination = $settings['show_pagination'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $row             = $settings['row'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $map_height      = $settings['map_height'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : '';

        echo do_shortcode('[directorist_search_result view="' . esc_attr($layout) . '" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" header="' . esc_attr($header) . '" columns="' . esc_attr($row) . '" show_pagination="' . esc_attr($show_pagination) . '" map_height="' . $map_height . '" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]');
    }
}

//Listings with map
class dlist_SearchResultMap extends Widget_Base
{
    public function get_name()
    {
        return 'search_result_map';
    }

    public function get_title()
    {
        return __('Search Result Map View', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-google-maps';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['search result map', 'search', 'result map'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'listings_map',
            [
                'label' => __('Search Result Map View', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => esc_html__('2 Column', 'dlist-core'),
                    '3' => esc_html__('3 Column', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 4,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $show_pagination = $settings['show_pagination'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $cat             = $settings['cat'] ? implode($settings['cat'], []) : '';
        $tag             = $settings['tag'] ? implode($settings['tag'], []) : '';
        $location        = $settings['location'] ? implode($settings['location'], []) : '';
        $featured        = $settings['featured'];
        $popular         = $settings['popular'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : ''; ?>

        <input type="hidden" id="listing-listings_with_map">

    <?php echo do_shortcode('[directorist_search_result view="listings_with_map" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" action_before_after_loop="no" popular_only="' . esc_attr($popular) . '" header="yes" show_pagination="' . esc_attr($show_pagination) . '" display_preview_image="yes" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" listings_with_map_columns="' . esc_attr($layout) . '"]');
    }
}

//Single category
class Dlist_SingleCat extends Widget_Base
{
    public function get_name()
    {
        return 'single_cat';
    }

    public function get_title()
    {
        return __('Single Category', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-theme-builder';
    }

    public function get_keywords()
    {
        return ['single category', 'single listing category', 'category',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_cat',
            [
                'label' => __('Single Listing Category', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
            ]
        );
        
        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'header',
            [
                'label'   => __('Show Header?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Listings Found Text', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Listings Found', 'dlist-core'),
                'label_block' => true,
                'condition'   => [
                    'header' => 'yes'
                ]

            ]
        );

        $this->add_control(
            'filter',
            [
                'label'   => __('Show More Filter?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'map'  => esc_html__('Map View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'sidebar',
            [
                'label'     => __('Show sidebar?', 'dlist-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Listings Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label'     => __('Map Height', 'dlist-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 300,
                'max'       => 1980,
                'default'   => 500,
                'condition' => [
                    'layout' => 'map'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : [],
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $header          = $settings['header'];
        $filter          = 'yes' == $settings['filter'] ? $settings['filter'] : 'no';
        $sidebar         = $settings['sidebar'];
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $row             = $settings['row'];
        $cat             = $settings['cat'] ? implode(',', $settings['cat']) : '';
        $location        = $settings['location'] ? implode(',', $settings['location']) : '';
        $tag             = $settings['tag'] ? implode(',', $settings['tag']) : '';
        $featured        = $settings['featured'];
        $popular         = $settings['popular'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $map_height      = $settings['map_height'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : '';

        echo do_shortcode('[directorist_category view="' . esc_attr($layout) . '" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" popular_only="' . esc_attr($popular) . '" header="' . esc_attr($header) . '" header_title ="' . esc_attr($title) . '" columns="' . esc_attr($row) . '" action_before_after_loop="' . esc_attr($sidebar) . '" show_pagination="' . esc_attr($show_pagination) . '" advanced_filter="' . esc_attr($filter) . '" map_height="' . $map_height . '" display_preview_image="yes" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]');
    }
}

//Single category map
class dlist_SingleCatMap extends Widget_Base
{
    public function get_name()
    {
        return 'single_cat_map';
    }

    public function get_title()
    {
        return __('Single Category Map View', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-google-maps';
    }

    public function get_keywords()
    {
        return ['map', 'single category'];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_cat',
            [
                'label' => __('Single Category Map View', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Listings Found Text', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Listings Found', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => esc_html__('2 Column', 'dlist-core'),
                    '3' => esc_html__('3 Column', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );
        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );
        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $cat             = $settings['cat'] ? implode($settings['cat'], []) : '';
        $location        = $settings['location'] ? implode($settings['location'], []) : '';
        $tag             = $settings['tag'] ? implode($settings['tag'], []) : '';
        $popular         = $settings['popular'];
        $featured        = $settings['featured'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : ''; ?>

        <input type="hidden" id="listing-listings_with_map">

    <?php echo do_shortcode('[directorist_category view="listings_with_map" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" action_before_after_loop="no" popular_only="' . esc_attr($popular) . '" header="yes" header_title ="' . esc_attr($title) . '" show_pagination="' . esc_attr($show_pagination) . '" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" listings_with_map_columns="' . esc_attr($layout) . '"]');
    }
}

//Single location
class Dlist_SingleLoc extends Widget_Base
{
    public function get_name()
    {
        return 'single_loc';
    }

    public function get_title()
    {
        return __('Single Location', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-map-pin';
    }

    public function get_keywords()
    {
        return ['single location', 'need location', 'location',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_loc',
            [
                'label' => __('Single Listing Location', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
            ]
        );
        
        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'header',
            [
                'label'   => __('Show Header?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Listings Found Text', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Listings Found', 'dlist-core'),
                'label_block' => true,
                'condition'   => [
                    'header' => 'yes'
                ]

            ]
        );

        $this->add_control(
            'filter',
            [
                'label'   => __('Show More Filter?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'map'  => esc_html__('Map View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'sidebar',
            [
                'label'     => __('Show sidebar?', 'dlist-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'no',
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Listings Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label'     => __('Map Height', 'dlist-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 300,
                'max'       => 1980,
                'default'   => 500,
                'condition' => [
                    'layout' => 'map'
                ]
            ]

        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : [],
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $header          = $settings['header'];
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $filter          = 'yes' == $settings['filter'] ? $settings['filter'] : 'no';
        $sidebar         = $settings['sidebar'];
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $row             = $settings['row'];
        $cat             = $settings['cat'] ? implode(',', $settings['cat']) : '';
        $location        = $settings['location'] ? implode(',', $settings['location']) : '';
        $tag             = $settings['tag'] ? implode(',', $settings['tag']) : '';
        $featured        = $settings['featured'];
        $popular         = $settings['popular'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $map_height      = $settings['map_height'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : '';

        echo do_shortcode('[directorist_location view="' . esc_attr($layout) . '" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" popular_only="' . esc_attr($popular) . '" header="' . esc_attr($header) . '" header_title ="' . esc_attr($title) . '" columns="' . esc_attr($row) . '" action_before_after_loop="' . esc_attr($sidebar) . '" show_pagination="' . esc_attr($show_pagination) . '" advanced_filter="' . esc_attr($filter) . '" map_height="' . $map_height . '" display_preview_image="yes" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]');
    }
}

//Single category map
class dlist_SingleLocMap extends Widget_Base
{
    public function get_name()
    {
        return 'single_loc_map';
    }

    public function get_title()
    {
        return __('Single Location Map View', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-google-maps';
    }

    public function get_keywords()
    {
        return ['single location', 'need location', 'location',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_cat',
            [
                'label' => __('Single Category Map View', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Listings Found Text', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Listings Found', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => esc_html__('2 Column', 'dlist-core'),
                    '3' => esc_html__('3 Column', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );
        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );
        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $cat             = $settings['cat'] ? implode($settings['cat'], []) : '';
        $location        = $settings['location'] ? implode($settings['location'], []) : '';
        $tag             = $settings['tag'] ? implode($settings['tag'], []) : '';
        $popular         = $settings['popular'];
        $featured        = $settings['featured'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : ''; ?>

        <input type="hidden" id="listing-listings_with_map">

    <?php echo do_shortcode('[directorist_location view="listings_with_map" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" action_before_after_loop="no" popular_only="' . esc_attr($popular) . '" header="yes" header_title ="' . esc_attr($title) . '" show_pagination="' . esc_attr($show_pagination) . '" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" listings_with_map_columns="' . esc_attr($layout) . '"]');
    }
}

//Single tag
class Dlist_SingleTag extends Widget_Base
{
    public function get_name()
    {
        return 'single_tag';
    }

    public function get_title()
    {
        return __('Single Tag', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-tags';
    }

    public function get_keywords()
    {
        return ['single tag', 'need tag', 'tag',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_cat',
            [
                'label' => __('Single Listing Category', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['general'],
            ]
        );
        
        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'general',
            ]
        );

        $this->add_control(
            'header',
            [
                'label'   => __('Show Header?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __('Listings Found Text', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Listings Found', 'dlist-core'),
                'label_block' => true,
                'condition'   => [
                    'header' => 'yes'
                ]

            ]
        );
        $this->add_control(
            'filter',
            [
                'label'   => __('Show More Filter?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                    'map'  => esc_html__('Map View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'sidebar',
            [
                'label'     => __('Show sidebar?', 'dlist-core'),
                'type'      => Controls_Manager::SWITCHER,
                'default'   => 'yes',
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'row',
            [
                'label'   => __('Listings Per Row', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid'
                ]
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label'     => __('Map Height', 'dlist-core'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 300,
                'max'       => 1980,
                'default'   => 500,
                'condition' => [
                    'layout' => 'map'
                ]
            ]

        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : [],
            ]
        );

        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
                'condition' => [
                    'layout!' => 'map'
                ]
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $header          = $settings['header'];
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $filter          = 'yes' == $settings['filter'] ? $settings['filter'] : 'no';
        $sidebar         = $settings['sidebar'];
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $row             = $settings['row'];
        $cat             = $settings['cat'] ? implode(',', $settings['cat']) : '';
        $location        = $settings['location'] ? implode(',', $settings['location']) : '';
        $tag             = $settings['tag'] ? implode(',', $settings['tag']) : '';
        $featured        = $settings['featured'];
        $popular         = $settings['popular'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $map_height      = $settings['map_height'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : '';

        echo do_shortcode('[directorist_tag view="' . esc_attr($layout) . '" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" popular_only="' . esc_attr($popular) . '" header="' . esc_attr($header) . '" header_title ="' . esc_attr($title) . '" columns="' . esc_attr($row) . '" action_before_after_loop="' . esc_attr($sidebar) . '" show_pagination="' . esc_attr($show_pagination) . '" advanced_filter="' . esc_attr($filter) . '" map_height="' . $map_height . '" display_preview_image="yes" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]');
    }
}

//Single category tag
class dlist_SingleTagMap extends Widget_Base
{
    public function get_name()
    {
        return 'single_tag_map';
    }

    public function get_title()
    {
        return __('Single Tag Map View', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-google-maps';
    }

    public function get_keywords()
    {
        return ['single tag', 'need tag', 'tag',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'single_cat',
            [
                'label' => __('Single Category Map View', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Listings Found Text', 'dlist-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Listings Found', 'dlist-core'),
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => __('View As', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '2' => esc_html__('2 Column', 'dlist-core'),
                    '3' => esc_html__('3 Column', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label'   => __('Only For Logged In User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label'   => __('Redirect User?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label'     => __('Redirect Link', 'dlist-core'),
                'type'      => Controls_Manager::URL,
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label'   => __('Number of Listings to Show:', 'dlist-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'cat',
            [
                'label'    => __('Specify Categories', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );
        $this->add_control(
            'location',
            [
                'label'    => __('Specify Locations', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );
        $this->add_control(
            'tag',
            [
                'label'    => __('Specify Tags', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('dlist_listing_tags') ? dlist_listing_tags() : []
            ]
        );

        $this->add_control(
            'featured',
            [
                'label'   => __('Show Featured Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'popular',
            [
                'label'   => __('Show Popular Only?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label'   => __('Order by', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'date'  => esc_html__(' Date', 'dlist-core'),
                    'price' => esc_html__(' Price', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label'   => __('Listings Order', 'dlist-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc'  => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'   => __('Show Pagination?', 'dlist-core'),
                'type'    => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $show_pagination = $settings['show_pagination'];
        $title           = $settings['title'];
        $cat             = $settings['cat'] ? implode($settings['cat'], []) : '';
        $location        = $settings['location'] ? implode($settings['location'], []) : '';
        $tag             = $settings['tag'] ? implode($settings['tag'], []) : '';
        $popular         = $settings['popular'];
        $featured        = $settings['featured'];
        $layout          = $settings['layout'];
        $number_cat      = $settings['number_cat'];
        $order_by        = $settings['order_by'];
        $order_list      = $settings['order_list'];
        $user            = $settings['user'];
        $web             = 'yes' == $user ? $settings['link']['url'] : ''; ?>

        <input type="hidden" id="listing-listings_with_map">

        <?php echo do_shortcode('[directorist_tag view="listings_with_map" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" listings_per_page="' . esc_attr($number_cat) . '" category="' . esc_attr($cat) . '" tag="' . esc_attr($tag) . '" location="' . esc_attr($location) . '" featured_only="' . esc_attr($featured) . '" action_before_after_loop="no" popular_only="' . esc_attr($popular) . '" header="yes" header_title ="' . esc_attr($title) . '" show_pagination="' . esc_attr($show_pagination) . '" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" listings_with_map_columns="' . esc_attr($layout) . '"]');
    }
}

//Testimonial
class dlist_Testimonial extends Widget_Base
{
    public function get_name()
    {
        return 'testimonials';
    }

    public function get_title()
    {
        return __('Testimonials', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['testimonial', 'client', 'testi'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'Testimonials',
            [
                'label' => __('Testimonials', 'dlist-core'),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label'       => __('Testimonials', 'dlist-core'),
                'type'        => Controls_Manager::REPEATER,
                'title_field' => '{{{ name }}}',
                'fields'      => [
                    [
                        'name'  => 'image',
                        'label' => __('Author Image', 'dlist-core'),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'        => 'name',
                        'label'       => __('Name', 'dlist-core'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => 'Mark Tony'
                    ],
                    [
                        'name'        => 'designation',
                        'label'       => __('Designation', 'dlist-core'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => 'Software Developer'
                    ],
                    [
                        'name'    => 'desc',
                        'label'   => __('Testimonial Text', 'dlist-core'),
                        'type'    => Controls_Manager::TEXTAREA,
                        'default' => 'Testimonial description'
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings     = $this->get_settings_for_display();
        $testimonials = $settings['testimonials'];

        if ($testimonials) {
            echo wp_kses_post('<div class="testimonial-carousel owl-carousel">');
            foreach ($testimonials as $test) {
                $id          = $test['image']['id'];
                $image       = wp_get_attachment_image_src($id, array(80, 80))[0];
                $name        = $test['name'] ? $test['name'] : '';
                $designation = $test['designation'] ? $test['designation'] : '';
                $desc        = $test['desc'] ? $test['desc'] : ''; ?>

                <div class="carousel-single">
                    <?php
                    $image_alt = function_exists('dlist_get_image_alt') ? dlist_get_image_alt($id)                                                                    : '';
                    echo       !empty($image) ? sprintf('<div class="author-thumb"><img src="%s" alt="%s" class="rounded-circle"></div>', esc_url($image), $image_alt) : ''; ?>
                    <div class="author-info">
                        <?php echo sprintf('<h4>%s</h4>', esc_attr($name));
                        echo sprintf('<span>%s</span>', esc_attr($designation)); ?>
                    </div>
                    <?php echo sprintf('<p class="author-comment">%s</p>', esc_attr($desc)); ?>
                </div>

            <?php
            }
            echo wp_kses_post('</div>');
        }
    }
}

//Testimonial
class dlist_Team extends Widget_Base
{
    public function get_name()
    {
        return 'team';
    }

    public function get_title()
    {
        return __('Team Member', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-user-circle-o';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['team', 'members', 'group'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'team',
            [
                'label' => __('Team Members', 'dlist-core'),
            ]
        );

        $this->add_control(
            'teams',
            [
                'label'       => __('teams', 'dlist-core'),
                'type'        => Controls_Manager::REPEATER,
                'title_field' => '{{{ name }}}',
                'fields'      => [
                    [
                        'name'        => 'name',
                        'label'       => __('Name', 'dlist-core'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => 'Mark Tony'
                    ],
                    [
                        'name'        => 'designation',
                        'label'       => __('Designation', 'dlist-core'),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => 'Software Developer'
                    ],
                    [
                        'name'  => 'image',
                        'label' => __('Author Image', 'dlist-core'),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $teams    = $settings['teams'];

        if ($teams) {
            echo wp_kses_post('<div class="row">');
            foreach ($teams as $team) {
                $image       = $team['image'];
                $name        = $team['name'];
                $designation = $team['designation']; ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="team-single">
                        <figure>
                            <?php
                            $image_alt = function_exists('dlist_get_image_alt') ? dlist_get_image_alt($image['id']) : '';
                            echo sprintf('<img src="%s" alt="%s">', esc_url($image['url']), esc_attr($image_alt)) ?>
                            <figcaption>
                                <h5><?php echo esc_attr($name); ?></h5>
                                <p><?php echo esc_attr($designation); ?></p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            echo wp_kses_post('</div>');
        }
    }
}

//Subscribe
class dlist_Subscribe extends Widget_Base
{

    public function get_name()
    {
        return 'subscribe';
    }

    public function get_title()
    {
        return __('Subscribe', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-mailchimp';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['Subscribe', 'like', 'mailchimp'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'subscribe',
            [
                'label' => __('Subscribe', 'dlist-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'dlist-core'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __('Subscribe to Newsletter', 'dlist-core'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'       => __('Subtitle', 'dlist-core'),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __('Enter your subtitle', 'dlist-core'),
                'default'     => __('Add Your subtitle Text Here', 'dlist-core'),
            ]
        );

        $this->add_control(
            'btn',
            [
                'label' => __('Subscribe Button Text', 'dlist-core'),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'action',
            [
                'label'       => __('Mailchimp Form Action Url', 'dlist-core'),
                'type'        => Controls_Manager::URL,
                'description' => function_exists('mail_desc') ? mail_desc() : '',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title    = $settings['title'];
        $subtitle = $settings['subtitle'];
        $btn      = $settings['btn'];
        $action   = $settings['action']['url']; ?>

        <section class="subscribe-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <?php echo sprintf('<h1>%s</h1>', esc_attr($title));
                        echo sprintf('<p>%s</p>', esc_attr($subtitle)) ?>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-8 offset-sm-2">
                                <form action="<?php echo esc_url($action); ?>" method="get" class="subscribe-form m-top-40">
                                    <div class="form-group">
                                        <span class="la la-envelope-o"></span>
                                        <input type="email" placeholder="<?php echo esc_attr_x('Enter your email', 'placeholder', 'dlist-core'); ?>" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
                                    </div>
                                    <input type="submit" value="<?php echo esc_attr($btn); ?>" class="btn btn-gradient btn-gradient-one">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}

//Booking Confirmation
class booking_confirmation extends Widget_Base
{
    public function get_name()
    {
        return 'booking';
    }

    public function get_title()
    {
        return __('Booking Confirmation', 'dlist-core');
    }

    public function get_icon()
    {
        return 'eicon-calendar';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'booking',
            [
                'label' => __('Styling', 'dlist-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'booking_margin',
            [
                'label'      => __('margin', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'booking_padding',
            [
                'label'      => __('Padding', 'dlist-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    { ?>
        <div class="dlist-booking-confirmation">
            <?php echo do_shortcode('[directorist_booking_confirmation]'); ?>
        </div>
        <?php
    }
}

//Call to action
class CTA extends Widget_Base
{
    public function get_name()
    {
        return 'call_to_action';
    }

    public function get_title()
    {
        return __('Call To Action', 'dlist-core');
    }

    public function get_icon()
    {
        return ' eicon-call-to-action';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['call_to_action', 'cta', 'call to action'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'categories',
            [
                'label' => __('General', 'dlist-core'),
            ]
        );
        $this->add_control(
            'title1',
            [
                'label' => __('Title First Part', 'dlist-core'),
                'type'  => Controls_Manager::TEXT,
                'default' => 'Find'
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title2',
            [
                'label'       => __('Title', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Shopping', 'dlist-core'),
            ]
        );

        $this->add_control(
            'texts',
            [
                'label'   => __('Changeable Text', 'dlist-core'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'title2'   => __('Shopping', 'dlist-core'),
                    ],
                ],
                'title_field' => '{{{ title2 }}}',
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => __('Title Last Part', 'dlist-core'),
                'type'  => Controls_Manager::TEXT,
                'default' => 'for your next trip'
            ]
        );
        $this->add_control(
            'btn',
            [
                'label'       => __('Button Label', 'dlist-core'),
                'type'        => Controls_Manager::TEXT,
                'default' => 'Explore Now'
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'       => __('Button URL', 'dlist-core'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'img',
            [
                'label' => __( 'Right Side Image', 'dcar' ),
                'type'  => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style',
            [
                'label' => __('Style', 'dlist-core'),
            ]
        );
        $this->add_control(
            'section_bg',
            [
                'label'  => __('Section BG  Color', 'dlist-core'),
                'type'   => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-wrapper' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings   = $this->get_settings_for_display();
        az_template('/elementor/cta/view', $settings);
    }
}


//Need categories
class dlist_NeedCategories extends Widget_Base
{
    public function get_name()
    {
        return 'need_categories';
    }

    public function get_title()
    {
        return __('Need Categories', 'dlist-core');
    }

    public function get_icon()
    {
        return ' far fa-question-circle';
    }

    public function get_keywords()
    {
        return ['need', 'categories', 'need categories',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'need_categories',
            [
                'label' => __('Need Categories', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['need-listings'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'need-listings',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __('Category Layout', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'cat_style',
            [
                'label' => __('Category Style', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'category-style1',
                'options' => [
                    'category-style1' => esc_html__('Style 1', 'dlist-core'),
                    'category-style-two' => esc_html__('Style 2', 'dlist-core'),
                ],
                'condition' => [
                    'layout' => 'grid',
                ],
            ]
        );

        $this->add_control(
            'row',
            [
                'label' => __('Categories Per Row', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'number_cat',
            [
                'label' => __('Number of categories to Show:', 'dlist-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 6,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order by', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__(' Cat ID', 'dlist-core'),
                    'count' => esc_html__('Needs Count', 'dlist-core'),
                    'name' => esc_html__(' Category name (A-Z)', 'dlist-core'),
                    'slug' => esc_html__('Select Category', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'slug',
            [
                'label' => __('Specify Locations', 'dlist-core'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => function_exists('dlist_listing_category') ? dlist_listing_category() : []
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label' => __('Locations Order', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label' => __('Only For Logged In User?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label' => __('Redirect User?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Redirect Link', 'dlist-core'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '',
                ],
                'separator' => 'before',
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $number_cat = $settings['number_cat'];
        $order_by = $settings['order_by'];
        $order_list = $settings['order_list'];
        $row = $settings['row'];
        $slug = $settings['slug'] ? implode($settings['slug'], []) : '';
        $cat_style = $settings['cat_style'];
        ?>

        <div id="<?php echo esc_attr($cat_style); ?>">
            <?php echo do_shortcode( '[directorist_all_categories view="layout" orderby="' . esc_attr( $order_by ) . '" order="' . esc_attr( $order_list ) . '" cat_per_page="' . esc_attr( $number_cat ) . '" columns="' . esc_attr( $row ) . '" slug="' . esc_attr( $slug ) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]' );
            ?>
        </div>
    <?php
    }
}

//Need locations
class dlist_NeedLocations extends Widget_Base
{
    public function get_name()
    {
        return 'need_locations';
    }

    public function get_title()
    {
        return __('Need Locations', 'dlist-core');
    }

    public function get_icon()
    {
        return ' far fa-question-circle';
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    public function get_keywords()
    {
        return ['locations', 'need locations',];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'need_locations',
            [
                'label' => __('Need Locations', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['need-listings'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'need-listings',
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __('Locations Layout', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__('Grid View', 'dlist-core'),
                    'list' => esc_html__('List View', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'row',
            [
                'label' => __('Location Per Row', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'number_loc',
            [
                'label' => __('Number of locations to Show:', 'dlist-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order by', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'id',
                'options' => [
                    'id' => esc_html__(' Cat ID', 'dlist-core'),
                    'count' => esc_html__('Needs Count', 'dlist-core'),
                    'name' => esc_html__(' Category name (A-Z)', 'dlist-core'),
                    'slug' => esc_html__('Select Category', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'slug',
            [
                'label' => __('Specify Locations', 'dlist-core'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => function_exists('dlist_listing_locations') ? dlist_listing_locations() : []
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label' => __('Locations Order', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => esc_html__(' ASC', 'dlist-core'),
                    'desc' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'user',
            [
                'label' => __('Only For Logged In User?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'redirect',
            [
                'label' => __('Redirect User?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Redirect Link', 'dlist-core'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '',
                ],
                'separator' => 'before',
                'condition' => [
                    'redirect' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $number_loc = $settings['number_loc'];
        $order_by = $settings['order_by'];
        $order_list = $settings['order_list'];
        $row = $settings['row'];
        $slug = $settings['slug'] ? implode($settings['slug'], []) : '';
        $layout = $settings['layout'];
        $user = $settings['user'];
        $web = 'yes' == $user ? $settings['link']['url'] : '';

        echo do_shortcode('[directorist_all_locations view="' . esc_attr($layout) . '" orderby="' . esc_attr($order_by) . '" order="' . esc_attr($order_list) . '" loc_per_page="' . esc_attr($number_loc) . '" columns="' . esc_attr($row) . '" slug="' . esc_attr($slug) . '" logged_in_user_only="' . esc_attr($user) . '" redirect_page_url="' . esc_attr($web) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '"]');
    }
}

//Need single category
class dlist_NeedSingleCat extends Widget_Base
{
    public function get_name()
    {
        return 'need_single_category';
    }

    public function get_title()
    {
        return __('Need Single Category', 'dlist-core');
    }

    public function get_icon()
    {
        return ' far fa-question-circle';
    }

    public function get_keywords()
    {
        return ['single category', 'need category', 'category',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'need_single_category',
            [
                'label' => __('Need Single Category', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['need-listings'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'need-listings',
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => __('Number of Needs to Show:', 'dlist-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __('Show Pagination?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $number = $settings['number'];
        $pagination = $settings['pagination'];

        echo do_shortcode('[directorist_category listings_per_page="' . $number . '" show_pagination="' . $pagination . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '" header="no" action_before_after_loop="no" display_preview_image="no"]');
    }
}

//Need single location
class dlist_NeedSingleLoc extends Widget_Base
{
    public function get_name()
    {
        return 'need_single_location';
    }

    public function get_title()
    {
        return __('Need Single Location', 'dlist-core');
    }

    public function get_icon()
    {
        return ' far fa-question-circle';
    }

    public function get_keywords()
    {
        return ['single location', 'need location', 'location',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'need_single_location',
            [
                'label' => __('Need Single Location', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['need-listings'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'need-listings',
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => __('Number of Needs to Show:', 'dlist-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __('Show Pagination?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $number = $settings['number'];
        $pagination = $settings['pagination'];

        echo do_shortcode('[directorist_location listings_per_page="' . $number . '" show_pagination="' . $pagination . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '" action_before_after_loop="no"]');
    }
}

//Needs
class dlist_Needs extends Widget_Base
{
    public function get_name()
    {
        return 'needs';
    }

    public function get_title()
    {
        return __('All Needs', 'dlist-core');
    }

    public function get_icon()
    {
        return ' far fa-question-circle';
    }

    public function get_keywords()
    {
        return ['need',];
    }

    public function get_categories()
    {
        return ['dlist_category'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'needs',
            [
                'label' => __('All Needs', 'dlist-core'),
            ]
        );

        $this->add_control(
            'types',
            [
                'label'    => __('Specify Listing Types', 'dlist-core'),
                'type'     => Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => ['need-listings'],
            ]
        );

        $this->add_control(
            'default_types',
            [
                'label'    => __('Set Default Listing Type', 'dlist-core'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => function_exists('directorist_listing_types') ? directorist_listing_types() : [],
                'default'  => 'need-listings',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => __('Needs Per Row', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '5' => esc_html__('5 Items / Row', 'dlist-core'),
                    '4' => esc_html__('4 Items / Row', 'dlist-core'),
                    '3' => esc_html__('3 Items / Row', 'dlist-core'),
                    '2' => esc_html__('2 Items / Row', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => __('Order by', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'ID' => esc_html__(' Post ID', 'dlist-core'),
                    'author' => esc_html__(' Author', 'dlist-core'),
                    'title' => esc_html__(' Title', 'dlist-core'),
                    'name' => esc_html__(' Post name (post slug)', 'dlist-core'),
                    'type' => esc_html__(' Post type (available since Version 4.0)', 'dlist-core'),
                    'date' => esc_html__(' Date', 'dlist-core'),
                    'modified' => esc_html__(' Last modified date', 'dlist-core'),
                    'rand' => esc_html__(' Random order', 'dlist-core'),
                    'comment_count' => esc_html__(' Number of comments', 'dlist-core')
                ],
            ]
        );

        $this->add_control(
            'order_list',
            [
                'label' => __('Order post', 'dlist-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC' => esc_html__(' ASC', 'dlist-core'),
                    'DESC' => esc_html__(' DESC', 'dlist-core'),
                ],
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => __('Number of Needs to Show:', 'dlist-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'default' => 3,
            ]
        );

        $this->add_control(
            'pagination',
            [
                'label' => __('Show Pagination?', 'dlist-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $default_types = $settings['default_types'];
        $types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
        $columns = $settings['columns'];
        $number = $settings['number'];
        $order = $settings['order_by'];
        $order_list = $settings['order_list'];
        $pagination = $settings['pagination'];
        
        echo do_shortcode('[directorist_all_listing view="grid" listings_per_page="' . esc_attr($number) . '" columns="' . esc_attr($columns) . '" show_pagination="' . esc_attr($pagination) . '" display_preview_image="no" action_before_after_loop="no" order_by="' . esc_attr($order) . '" sort_by="' . esc_attr($order_list) . '" directory_type="' . $types . '" default_directory_type="' . $default_types . '" header="no"]');

    }
}
