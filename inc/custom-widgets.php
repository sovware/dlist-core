<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
dlist All Custom Widget
*/

//**************************************************************************************
// Subscribe for blog
//**************************************************************************************
class dlist_subscribe_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_details = array(
            'classname'     => 'dlist_subscribe_widget',
            'description'   => esc_html__('You can use it to display Subscribe form.', 'dlist-core')
        );

        parent::__construct('dlist_subscribe_widget', esc_html__('-[Subscribe]', 'dlist-core'), $widget_details);

    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $form = !empty($instance['form']) ? $instance['form'] : ''; ?>

        <div class="widget-wrapper">
            <div class="widget-default">
                <div class="widget-content">
                    <div class="subscribe-widget">
                        <form action="<?php echo esc_url($form); ?>" method="post">
                            <input type="email" class="form-control m-bottom-20"
                                   placeholder="<?php echo esc_html($title); ?>">
                            <button class="submit-btn" type="submit"><?php directorist_icon( 'las la-paper-plane' ); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function form($instance)
    {
        $title = !empty($instance["title"]) ? $instance["title"] : '';
        $form = !empty($instance["form"]) ? $instance["form"] : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("title")); ?>">
                <b><?php esc_html_e("Placeholder Text", "dlist"); ?></b>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("title")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("title")); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("form")); ?>">
                <b><?php esc_html_e("Mailchimp Action Url", "dlist"); ?></b>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("form")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("form")); ?>" type="text"
                   value="<?php echo esc_attr($form); ?>"/>
        </p>


        <p class="help">
            <?php echo __('<strong>Login <a href="https://mailchimp.com" target="_blank">Mailchimp</a> > Profile > Audience > Create  Audience / select existing audience</strong><br> Then go to <strong>Signup forms > Embedded forms </strong> and scroll down then you will found <strong>Copy/paste onto your site</strong> textarea including some text. Copy the form action URL and paste it here. <b style="color: green;">[For more details follow theme docs: <a href="http://directorist.com/docs" target="_blank">Widgets</a>]</b>', 'dlist-core'); ?>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {

        if (!empty($new_instance['title'])) {
            $new_instance['title'] = sanitize_text_field($new_instance['title']);
        }
        if (!empty($new_instance['form'])) {
            $new_instance['form'] = sanitize_text_field($new_instance['form']);
        }

        return $new_instance;
    }
}

//**************************************************************************************
// Popular post
//**************************************************************************************
class dlist_popular_post_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'dlist_popular_post_widget',
            'description' => esc_html__('You can use it to display popular post.', 'dlist-core')
        );
        parent::__construct('dlist_popular_post_widget', esc_html__('-[Popular Blog]', 'dlist-core'), $widget_details);
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance["title"]) ? $instance["title"] : '';
        $post_count = !empty($instance["post_count"]) ? $instance["post_count"] : '';

        // Popular posts
        query_posts(
            array(
                'posts_per_page' => $post_count,
                'post_type' => 'post',
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'post__not_in' => get_option('sticky_posts'),
                'order' => 'DESC',
            )
        ); ?>

        <div class="widget-wrapper">
            <div class="widget-default">
                <?php if (!empty($title)) { ?>
                    <div class="widget-header">
                        <h6 class="widget-title"><?php echo esc_html($title); ?></h6>
                    </div>
                <?php } ?>
                <?php if (have_posts()) { ?>
                    <div class="widget-content">
                        <div class="sidebar-post">
                            <?php while (have_posts()) {
                                the_post(); ?>
                                <div class="post-single">
                                    <div class="d-flex align-items-center">
                                        <?php the_post_thumbnail(array(60, 60), array('class' => 'rounded')); ?>
                                        <p>
                                            <a href="<?php the_permalink(); ?>" class="post-title">
                                                <?php the_title() ?>
                                            </a>
                                            <span><?php echo function_exists('dlist_time_link') ? dlist_time_link() : ''; ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php
                } else { ?>
                    <div class="widget-content">
                        <div class="sidebar-post"><h4> <?php esc_html_e('No Post Found.', 'dlist-core'); ?> </h4></div>
                    </div>
                    <?php
                }
                wp_reset_query(); ?>
            </div>
        </div>
        <?php
    }

    public function form($instance)
    {
        $title = !empty($instance["title"]) ? $instance["title"] : '';
        $post_count = !empty($instance["post_count"]) ? $instance["post_count"] : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("title")); ?>">
                <b><?php esc_html_e("Title", "dlist"); ?></b>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("title")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("title")); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("post_count")); ?>">
                <b><?php esc_html_e("How many posts you want to show ?", "dlist"); ?></b>
            </label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("post_count")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("post_count")); ?>"
                   type="text" value="<?php echo esc_attr($post_count); ?> "/>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {
        if (!empty($new_instance['title'])) {
            $new_instance['title'] = sanitize_text_field($new_instance['title']);
        }
        if (!empty($new_instance['post_count'])) {
            $new_instance['post_count'] = sanitize_text_field($new_instance['post_count']);
        }

        return $new_instance;
    }
}

//**************************************************************************************
// Latest post
//**************************************************************************************
class dlist_latest_post_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'dlist_latest_post_widget',
            'description' => esc_html__('You can use it to display latest post.', 'dlist-core')
        );
        parent::__construct('dlist_latest_post_widget', esc_html__('-[Latest Blog]', 'dlist-core'), $widget_details);
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance["title"]) ? $instance["title"] : '';
        $post_count = !empty($instance["post_count"]) ? $instance["post_count"] : '';


        // Popular posts
        query_posts(
            array(
                'posts_per_page' => $post_count,
                'post_type' => 'post',
                'post__not_in' => get_option('sticky_posts'),
                'order' => 'DESC',
            )
        );
        ?>

        <div class="widget-wrapper">
            <div class="widget-default">
                <?php if ( ! empty( $title ) ) { ?>
                    <div class="widget-header">
                        <h6 class="widget-title"><?php echo esc_html( $title ); ?></h6>
                    </div>
                    <?php 
                } ?>

                <?php if (have_posts()) { ?>
                    <div class="widget-content">
                        <div class="sidebar-post">
                            <?php while (have_posts()) {
                                the_post(); ?>
                                <div class="post-single">
                                    <div class="d-flex align-items-center">
                                        <?php the_post_thumbnail(array(60, 60), array('class' => 'rounded')); ?>
                                        <p>
                                            <a href="<?php the_permalink(); ?>"
                                               class="post-title"><?php the_title() ?></a>
                                            <span><?php echo function_exists('dlist_time_link') ? dlist_time_link() : ''; ?></span>

                                        </p>
                                    </div>
                                </div><!-- ends: .post-single -->
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="widget-content">
                        <div class="sidebar-post"><h4> <?php esc_html_e('No Post Found.', 'dlist-core'); ?> </h4></div>
                    </div>
                <?php }
                wp_reset_query(); ?>
            </div>
        </div>
        <?php
    }

    public function form($instance)
    {
        $title = !empty($instance["title"]) ? $instance["title"] : '';
        $post_count = !empty($instance["post_count"]) ? $instance["post_count"] : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("title")); ?>">
                <b><?php esc_html_e("Title", "dlist"); ?></b>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("title")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("title")); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("post_count")); ?>">
                <b><?php esc_html_e("How many posts you want to show ?", "dlist"); ?></b>
            </label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("post_count")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("post_count")); ?>"
                   type="text" value="<?php echo esc_attr($post_count); ?> "/>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance)
    {
        if (!empty($new_instance['title'])) {
            $new_instance['title'] = sanitize_text_field($new_instance['title']);
        }
        if (!empty($new_instance['post_count'])) {
            $new_instance['post_count'] = sanitize_text_field($new_instance['post_count']);
        }

        return $new_instance;
    }
}

//**************************************************************************************
// Social
//**************************************************************************************

class dlist_connect_follow_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'dlist_connect_follow_widget',
            'description' => esc_html__('You can use it to display social profile with icon.', 'dlist-core')
        );
        parent::__construct('dlist_connect_follow_widget', esc_html__('-[Social Icon]', 'dlist-core'), $widget_details);
    }

    public function widget($args, $instance)
    {
        $title = (!empty($instance['title'])) ? $instance['title'] : '';

        ?>
        <div class="widget-wrapper">
            <div class="widget-default">
                <?php if (!empty($title)) { ?>
                    <div class="widget-header">
                        <h6 class="widget-title"><?php echo esc_attr($title); ?></h6>
                    </div>
                <?php } ?>
                <div class="widget-content">
                    <div class="social social--small social--gray ">
                        <ul class="d-flex flex-wrap">
                            <?php for ($i = 1; $i <= $instance["social"]; $i++) {
                                $link_text = !empty($instance["link_text$i"]) ? $instance["link_text$i"] : '';
                                $link_url = !empty($instance["link_url$i"]) ? $instance["link_url$i"] : '';
                                if ($link_text): ?>
                                    <li>
                                        <a href="<?php echo esc_url($link_url); ?>" class="<?php echo esc_attr($link_text) ?>">
                                        <?php directorist_icon( 'fab fa-' . $link_text ); ?>
                                        </a>
                                    </li>
                                <?php endif;

                            }
                            wp_reset_postdata(); 
                            ?>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <?php

    }

    public function form($instance)
    {
        $title = (!empty($instance['title'])) ? $instance['title'] : '';
        $social = !empty($instance["social"]) ? $instance["social"] : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id("title")); ?>">
                <b><?php esc_html_e("Title", "dlist"); ?></b>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id("title")); ?>"
                   name="<?php echo esc_attr($this->get_field_name("title")); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id("social")); ?>">
                <b><?php esc_html_e("How many social field would you want? & hit save.", "dlist"); ?></b>
            </label>
        </p>

        <p><input class="widefat" id="<?php echo esc_attr($this->get_field_id("social")); ?>"
                  name="<?php echo esc_attr($this->get_field_name("social")); ?>" type="text"
                  value="<?php echo esc_attr($social); ?>"/>
        </p>

        <?php
        if (!empty($social)) {
            printf("<p style='font-size: 12px; color: #9d9d9d; font-style: italic'>%s | <a href='https://fontawesome.com/icons?d=listing&m=free' target='_blank'>%s</a></p>", esc_html__('Please Note: Social Icon Names are just Fonts Awesome Icon Name in lower case(eg. facebook-f or twitter etc)', 'dlist-core'), esc_html__('Font Awesome Icons List', 'dlist-core'));
            for ($i = 1; $i <= $social; $i++) {

                $link_text = !empty($instance["link_text$i"]) ? $instance["link_text$i"] : '';
                $link_url = !empty($instance["link_url$i"]) ? $instance["link_url$i"] : '';
                ?>

                <p style="border: 1px solid #f5548e; padding: 10px; ">
                    <label for="<?php echo esc_attr($this->get_field_id("link_text$i")); ?>"><?php echo "#$i : Social Icon Name"; ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id("link_text$i")); ?>"
                           name="<?php echo esc_attr($this->get_field_name("link_text$i")); ?>" type="text"
                           value="<?php echo esc_attr($link_text); ?>"/>

                    <label for="<?php echo esc_attr($this->get_field_id("link_url$i")); ?>"><?php echo "#$i : Social url"; ?></label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id("link_url$i")); ?>"
                           name="<?php echo esc_attr($this->get_field_name("link_url$i")); ?>" type="text"
                           value="<?php echo esc_attr($link_url); ?>"/>
                </p>

            <?php }
            wp_reset_postdata();
        } ?>

        <?php
    }

    public function update($new_instance, $old_instance)
    {

        if (!empty($new_instance['title'])) {
            $new_instance['title'] = sanitize_text_field($new_instance['title']);
        }
        if (!empty($new_instance['social'])) {
            $new_instance['social'] = sanitize_text_field($new_instance['social']);
        }

        return $new_instance;
    }
}

//**************************************************************************************
// search
//**************************************************************************************

class dlist_search_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'dlist_search_widget',
            'description' => esc_html__('You can use it to display a search form.', 'dlist-core')
        );
        parent::__construct('dlist_search_widget', esc_html__('-[Search]', 'dlist-core'), $widget_details);
    }

    public function widget($args, $instance)
    {

        ?>
        <div class="widget-wrapper">
            <div class="search-widget">
                <form role="search" method="get" action="<?php echo esc_url(home_url()); ?>">
                    <div class="input-group">
                        <input type="search" value="<?php echo esc_attr(get_search_query()); ?>" name="s"
                               class="fc--rounded"
                               placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'dlist-core'); ?>">
                        <button value="search" type="submit"><?php directorist_icon( 'las la-search' ); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <?php

    }

    public function form($instance)
    {
        ?>
        <p><b><?php echo esc_html__('dlist theme default search widget.', 'dlist-core') ?></b></p>

        <?php
    }
}

function dlist_widgets_register()
{
    register_widget('dlist_subscribe_widget');
    register_widget('dlist_popular_post_widget');
    register_widget('dlist_latest_post_widget');
    register_widget('dlist_connect_follow_widget');
    register_widget('dlist_search_widget');
}

add_action('widgets_init', 'dlist_widgets_register');
