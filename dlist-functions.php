<?php
/*
Plugin Name: dList Core
Plugin URI: https://aazztech.com/product/category/themes/wordpress/dlist/
Description: Core plugin of dlist.
Author: AazzTech
Author URI: https://aazzztech.com
Domain Path: /languages
Text Domain: dlist-core
Version: 1.8
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dlist_core_textdomain() {
	$plugin_rel_path = dirname( plugin_basename( __FILE__ ) ) . '/languages';
	load_plugin_textdomain( 'dlist-core', false, $plugin_rel_path );
}

add_action( 'plugins_loaded', 'dlist_core_textdomain' );

require_once plugin_dir_path( __FILE__ ) . 'inc/custom-style.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/custom-widgets.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/directorist-functions.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/demo-importer.php';
require_once plugin_dir_path( __FILE__ ) . 'elementor/dlist-elementor.php';

/**
 * Enqueue scripts and styles.
 */
function dlist_core_scripts() {
	wp_enqueue_script( 'typed', plugin_dir_url( __FILE__ ) . 'assets/js/typed.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'dlist-core-main', plugin_dir_url( __FILE__ ) . 'assets/js/main.js', array( 'jquery' ), null, true );

	wp_localize_script(
		'vb_reg_script',
		'vb_reg_vars',
		array(
			'vb_ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}

add_action( 'wp_enqueue_scripts', 'dlist_core_scripts', 100 );

/* Add header image meta box in single listing header area */

function dlist_image_uploader_field( $name, $value = '' ) {
	$image      = ' button">Upload image';
	$image_size = 'full';
	$display    = 'none';

	if ( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
		$image   = '"><img src="' . $image_attributes[0] . '" style="max-width:100%;display:block;" />';
		$display = 'inline-block';
	}

	return '<div>
				<a href="#" class="dlist_upload_image_button' . $image . '</a>
				<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
				<a href="#" class="dlist_remove_image_button" style="display:inline-block;display:' . $display . '">' . esc_html__( 'Remove image', 'dlist-core' ) . '</a>
				<p>' . __( 'upload listing header image <i style="color: #fa8b0c;">[1920*500]</i>', 'dlist-core' ) . '</p>
			</div>';
}

add_action( 'admin_menu', 'dlist_meta_box_add' );

function dlist_meta_box_add() {
	add_meta_box( 'dlistdiv', esc_html__( 'Header Image', 'dlist-core' ), 'dlist_print_box', array( 'at_biz_dir', 'product' ), 'side', 'default' );
}

function dlist_print_box( $post ) {
	$meta_key = 'second_featured_img';
	echo dlist_image_uploader_field( $meta_key, get_post_meta( $post->ID, $meta_key, true ) );
}

add_action( 'save_post', 'dlist_save' );

function dlist_save( $post_id ) {
	$new_meta_value = ( isset( $_POST['second_featured_img'] ) ? sanitize_html_class( $_POST['second_featured_img'] ) : '' );

	update_post_meta( $post_id, 'second_featured_img', $new_meta_value );

	return $post_id;
}

/* Page header control option */

function dlist_add_meta_box() {
	add_meta_box( 'dlist_menu', esc_html__( 'Page Options', 'dlist-core' ), 'dlist_meta_box_callback', 'page', 'side', 'default' );
}

add_action( 'add_meta_boxes', 'dlist_add_meta_box' );

function dlist_meta_box_callback( $post ) {
	wp_nonce_field( 'dlist_meta_box', 'dlist_meta_box_nonce' );
	$value          = get_post_meta( $post->ID, 'menu_style', true );
	$value_checked  = empty( $value ) ? 'checked' : '';
	$banner         = get_post_meta( $post->ID, 'banner_style', true );
	$banner_checked = empty( $banner ) ? 'checked' : '';
	$style          = get_post_meta( $post->ID, 'style', true );
	$style_checked  = empty( $style ) ? 'checked' : '';
	$type           = get_post_meta( $post->ID, 'menu_type', true );
	$type_checked   = empty( $type ) ? 'checked' : ''; ?>

	<p><label for="wdm_new_field"><b><?php _e( 'Menu Type', 'dlist-core' ); ?></b></label></p>
	<input id="wdm_new_field" type="radio" name="type" value="sticky"
	<?php checked( $type, 'sticky' ); echo esc_attr( $type_checked ); ?>>
	<?php _e( 'Sticky Menu', 'dlist-core' ); ?> <br>
	<input id="wdm_new_field" type="radio" name="type" value="fixed" <?php checked( $type, 'fixed' ); ?>>
	<?php _e( 'Fixed Menu', 'dlist-core' ); ?><br><br>

	<p><label for="wdm_new_field"> <b><?php esc_html_e( 'Menu Area', 'dlist-core' ); ?></b> </label></p>
	<input type="radio" name="menu_styles" value="menu2" <?php checked( $value, 'menu2' ); echo esc_attr( $value_checked ); ?>>
	<?php esc_html_e( 'Light Background', 'dlist-core' ); ?><br>
	<input type="radio" name="menu_styles" value="menu3" <?php checked( $value, 'menu3' ); ?>>
	<?php esc_html_e( 'Dark Background', 'dlist-core' ); ?><br><br>

	<p><label for="wdm_new_field"><b><?php esc_html_e( 'Menu Style', 'dlist-core' ); ?></b></label></p>
	<input id="wdm_new_field" type="radio" name="style" value="style1" <?php checked( $style, 'style1' ); echo esc_attr( $style_checked ); ?>>
	<?php esc_html_e( 'Full wide', 'dlist-core' ); ?> <br>
	<input id="wdm_new_field" type="radio" name="style" value="style2" <?php checked( $style, 'style2' ); ?>>
	<?php esc_html_e( 'Menu box', 'dlist-core' ); ?> <br><br>

	<p><label for="wdm_new_field"> <b><?php esc_html_e( 'Breadcrumb Area', 'dlist-core' ); ?></b> </label></p>
	<input type="radio" name="banner_options" value="search" <?php checked( $banner, 'search' ); ?>>
	<?php esc_html_e( 'Search Form', 'dlist-core' ); ?><br>
	<input type="radio" name="banner_options" value="breadcrumb" <?php checked( $banner, 'breadcrumb' ); echo esc_attr( $banner_checked ); ?>>
	<?php esc_html_e( 'Breadcrumb', 'dlist-core' ); ?> <br>
	<input type="radio" name="banner_options" value="banner_off" <?php checked( $banner, 'banner_off' ); ?>>
	<?php esc_html_e( 'Hide', 'dlist-core' ); ?>

	<?php
}


function dlist_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['dlist_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['dlist_meta_box_nonce'], 'dlist_meta_box' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$new_meta_value        = ( isset( $_POST['menu_styles'] ) ? sanitize_html_class( $_POST['menu_styles'] ) : '' );
	$style				   = ( isset( $_POST['style'] ) ? sanitize_html_class( $_POST['style'] ) : '' );
	$type                  = ( isset( $_POST['type'] ) ? sanitize_html_class( $_POST['type'] ) : '' );
	$banner_new_meta_value = ( isset( $_POST['banner_options'] ) ? sanitize_html_class( $_POST['banner_options'] ) : '' );

	update_post_meta( $post_id, 'menu_style', $new_meta_value );
	update_post_meta( $post_id, 'style', $style );
	update_post_meta( $post_id, 'menu_type', $type );
	update_post_meta( $post_id, 'banner_style', $banner_new_meta_value );
}

add_action( 'save_post', 'dlist_save_meta_box_data' );


/* Single listing header control option */
function dlist_single_add_meta_box() {
	add_meta_box( 'dlist_single_menu', esc_html__( 'Header Options', 'dlist-core' ), 'dlist_single_meta_box_callback', array( 'at_biz_dir', 'product', 'post' ), 'side', 'default' );
}

add_action( 'add_meta_boxes', 'dlist_single_add_meta_box' );

function dlist_single_meta_box_callback( $post ) {
	wp_nonce_field( 'dlist_single_meta_box', 'dlist_single_meta_box_nonce' );
	$post_id       = isset( $_GET['post'] ) ? (int) $_GET['post'] : '';
	$value         = get_post_meta( $post_id, 'menu_style', true );
	$type          = get_post_meta( $post->ID, 'menu_type', true );
	$type_checked  = empty( $type ) ? 'checked' : '';
	$style         = get_post_meta( $post->ID, 'style', true );
	$style_checked = empty( $style ) ? 'checked' : '';?>

	<p><label for="wdm_new_field"><b><?php _e( 'Menu Type', 'dlist-core' ); ?></b></label></p>
	<input id="wdm_new_field" type="radio" name="type" value="sticky"
	<?php checked( $type, 'sticky' ); echo esc_attr( $type_checked ); ?>>
	<?php _e( 'Sticky Menu', 'dlist-core' ); ?> <br>
	<input id="wdm_new_field" type="radio" name="type" value="fixed" <?php checked( $type, 'fixed' ); ?>>
	<?php _e( 'Fixed Menu', 'dlist-core' ); ?> <br>

	<p><label for="dlist_new_field"><b><?php _e( 'Menu Area', 'dlist-core' ); ?></b></label></p>
	<input id="dlist_new_field" type="radio" name="menu_styles" value="menu2" <?php checked( $value, 'menu2' ); ?> checked>
	<?php _e( 'Light Background', 'dlist-core' ); ?><br>
	<input id="dlist_new_field" type="radio" name="menu_styles" value="menu3" <?php checked( $value, 'menu3' ); ?>>
	<?php _e( 'Dark Background', 'dlist-core' ); ?><br>

	<p><label for="wdm_new_field"><b><?php esc_html_e( 'Menu Style', 'dlist-core' ); ?></b></label></p>
	<input id="wdm_new_field" type="radio" name="style" value="style1" <?php checked( $style, 'style1' ); echo esc_attr( $style_checked ); ?>>
	<?php esc_html_e( 'Full wide', 'dlist-core' ); ?> <br>
	<input id="wdm_new_field" type="radio" name="style" value="style2" <?php checked( $style, 'style2' ); ?>>
	<?php esc_html_e( 'Menu box', 'dlist-core' ); ?> <br><br>

	<?php
}

function dlist_single_save_meta_box_data( $post_id ) {
	if ( ! isset( $_POST['dlist_single_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['dlist_single_meta_box_nonce'], 'dlist_single_meta_box' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$new_meta_value = ( isset( $_POST['menu_styles'] ) ? sanitize_html_class( $_POST['menu_styles'] ) : '' );
	$type           = ( isset( $_POST['type'] ) ? sanitize_html_class( $_POST['type'] ) : '' );
	$style          = ( isset( $_POST['style'] ) ? sanitize_html_class( $_POST['style'] ) : '' );

	update_post_meta( $post_id, 'menu_style', $new_meta_value );
	update_post_meta( $post_id, 'menu_type', $type );
	update_post_meta( $post_id, 'style', $style );
}

add_action( 'save_post', 'dlist_single_save_meta_box_data' );


/* Footer style */

function dlist_footer_style() {
	add_meta_box( 'dlist_footer_style', esc_html__( 'Footer Options', 'dlist-core' ), 'dlist_footer_style_callback', array( 'at_biz_dir', 'product', 'post', 'page' ), 'side', 'default' );
}

add_action( 'add_meta_boxes', 'dlist_footer_style' );

function dlist_footer_style_callback( $post ) {
	wp_nonce_field( 'dlist_footer_meta_box', 'dlist_footer_meta_box_nonce' );
	$post_id = isset( $_GET['post'] ) ? (int) $_GET['post'] : '';
	$value   = get_post_meta( $post_id, 'footer_style', true );	?>

	<p><label for="dlist_new_field"> <b><?php esc_html_e( 'Footer Area', 'dlist-core' ); ?></b> </label></p>
	<input type="radio" name="footer_styles" value="footer-light" <?php checked( $value, 'footer-light' ); ?> checked>
	<?php esc_html_e( 'Light Background', 'dlist-core' ); ?><br>
	<input type="radio" name="footer_styles" value="footer-three" <?php checked( $value, 'footer-three' ); ?>>
	<?php esc_html_e( 'Dark Background', 'dlist-core' ); ?> <br>
	<input type="radio" name="footer_styles" value="footer-hide" <?php checked( $value, 'footer-hide' ); ?>>
	<?php esc_html_e( 'Hide Widgets', 'dlist-core' ); ?> <br>

	<?php
}

function dlist_footer_style_control( $post_id ) {
	if ( ! isset( $_POST['dlist_footer_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['dlist_footer_meta_box_nonce'], 'dlist_footer_meta_box' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$new_meta_value = ( isset( $_POST['footer_styles'] ) ? sanitize_html_class( $_POST['footer_styles'] ) : '' );

	update_post_meta( $post_id, 'footer_style', $new_meta_value );
}

add_action( 'save_post', 'dlist_footer_style_control' );

/**
 * New User registration
 */
function vb_reg_new_user() {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vb_new_user' ) ) {
		die( 'Ooops, something went wrong, please try again later.' );
	}

	// Post values
	$username         = $_POST['user'];
	$email            = $_POST['mail'];
	$pass             = $_POST['pass'];
	$privacy_policy   = isset( $_POST['privacy_policy'] ) ? esc_attr( $_POST['privacy_policy'] ) : '';
	$require_password = class_exists( 'Directorist_Base' ) ? get_directorist_option( 'require_password_reg', 1 ) : '';
	$policy           = get_directorist_option( 'registration_privacy', 1 );
	$terms            = get_directorist_option( 'regi_terms_condition', 1 );
	if ( $require_password && ! $pass ) {
		wp_send_json( __( 'Password field is empty!', 'dlist-core' ) );
		die();
	}
	if ( $policy || $terms ) {
		if ( ! $privacy_policy ) {
			wp_send_json( __( 'Make sure all the required fields are not empty!', 'dlist-core' ) );
			die();
		}
	}

	/**
	 * IMPORTANT: You should make server side validation here!
	 */
	$generated_pass = wp_generate_password( 12, false );
	$password       = ! empty( $pass ) ? $pass : $generated_pass;
	$userdata       = array(
		'user_login' => $username,
		'user_email' => $email,
		'user_pass'  => $password,
	);
	$user_id        = wp_insert_user( $userdata );
	if ( ! is_wp_error( $user_id ) ) {
		update_user_meta( $user_id, '_atbdp_generated_password', $password );
		wp_new_user_notification($user_id, null, 'admin');
		ATBDP()->email->custom_wp_new_user_notification_email($user_id);
		echo '1';
	} else {
		echo $user_id->get_error_message();
	}

	die();
}

add_action( 'wp_ajax_register_user', 'vb_reg_new_user' );
add_action( 'wp_ajax_nopriv_register_user', 'vb_reg_new_user' );

/* Login & Register Configuration */

if ( ! function_exists( 'dlist_post_navigation' ) ) {
	function dlist_post_navigation() {
		$categories_list = get_the_category_list( esc_html__( ', ', 'dlist-core' ) );
		?>

		<div class="post-pagination">

			<div class="prev-post">
				<span><?php esc_html_e( 'Next Post:', 'dlist-core' ); ?></span>
				<?php echo sprintf( '<a href="%s" class="title">%s</a>', esc_url( get_the_permalink( get_next_post() ) ), get_the_title( get_next_post() ) ); ?>
				<p>
					<span><?php echo dlist_time_link(); ?></span>
					<?php
					esc_html_e( '- In', 'dlist-core' );
					echo $categories_list ? $categories_list : '';
					?>
				</p>
			</div>

			<div class="next-post">
				<span><?php esc_html_e( 'Previous Post:', 'dlist-core' ); ?></span>
				<?php echo sprintf( '<a href="%s" class="title">%s</a>', esc_url( get_the_permalink( get_previous_post() ) ), get_the_title( get_previous_post() ) ); ?>

				<p>
					<span><?php echo dlist_time_link(); ?></span>
					<?php
					esc_html_e( '- In', 'dlist-core' );
					echo $categories_list ? $categories_list : '';
					?>
				</p>
			</div>

		</div>
		<?php
	}
}


if ( ! function_exists( 'dlist_related_post' ) ) {
	function dlist_related_post() {
		$categories = array();
		foreach ( get_the_category( get_the_ID() ) as $category ) {
			$categories[] = $category->term_id;
		};
		wp_reset_postdata();

		$args          = array(
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => 1,
			'tax_query'           => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $categories,
					'operator' => 'IN',
				),
			),
		);
		$related_posts = new WP_Query( $args );

		if ( count( $related_posts->posts ) != 0 ) {
			?>
			<div class="related-post m-top-60">
				<div class="related-post--title text-center"><h3><?php esc_html_e( 'Related Posts', 'dlist-core' ); ?></h3></div>
				<div class="row">
					<?php
					if ( $related_posts->have_posts() ) {
						while ( $related_posts->have_posts() ) {
							$related_posts->the_post();
							?>
							<div class="col-lg-4 col-sm-6">
								<div class="single-post">
									<?php the_post_thumbnail( 'dlist_related_blog' ); ?>
									<?php the_title( sprintf( '<h6><a href="%s">', get_the_permalink() ), '</a></h6>' ); ?>
									<p>
										<span><?php echo dlist_time_link(); ?></span>
										<?php esc_html_e( 'in ', 'dlist-core' ); echo get_the_category_list( esc_html__( ', ', 'dlist-core' ) ); ?>
									</p>
								</div>
							</div>
							<?php
						}
						wp_reset_query();
					}
					?>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
	}
}

if ( ! function_exists( 'dlist_share_post' ) ) {
	function dlist_share_post() {
		?>
		<div class="social-share d-flex align-items-center">
			<span class="m-right-15"> <?php esc_html_e( 'Share Post:', 'dlist-core' ); ?> </span>
			<ul class="social-share list-unstyled">
				<li>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'dlist-core' ); ?>">
						<i class="fab fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo htmlspecialchars( urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ); ?>" target="_blank" title="<?php esc_html_e( 'Tweet', 'dlist-core' ); ?>">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank" title="<?php esc_html_e( 'LinkedIn', 'dlist-core' ); ?>">
						<i class="fab fa-linkedin-in"></i>
					</a>
				</li>
			</ul>
		</div>
		<?php
	}
}

/* Author Social Profile */
function dlist_author_social_icon( $social ) {
	$social['twitter']     = esc_html__( 'Twitter Username', 'dlist-core' );
	$social['google_plus'] = esc_html__( 'Google plus profile', 'dlist-core' );
	$social['facebook']    = esc_html__( 'Facebook Profile', 'dlist-core' );
	$social['linkedin']    = esc_html__( 'Linkedin Profile', 'dlist-core' );
	return $social;
}

add_filter( 'user_contactmethods', 'dlist_author_social_icon' );

function dlist_author_social() {
	global $post;
	$facebook    = get_user_meta( $post->post_author, 'facebook', true );
	$twitter     = get_user_meta( $post->post_author, 'twitter', true );
	$linkedin    = get_user_meta( $post->post_author, 'linkedin', true );
	$google_plus = get_user_meta( $post->post_author, 'google_plus', true );

	if ( $facebook || $twitter || $linkedin || $google_plus ) {
		?>
		<ul class="list-unstyled social-basic">
			<?php
			if ( $facebook ) {
				?>
				<li><a href="<?php echo esc_url( $facebook ); ?>"><i class="fab fa-facebook"></i></a></li>
				<?php
			}
			if ( $twitter ) {
				?>
				<li><a href="<?php echo esc_url( $twitter ); ?>"><i class="fab fa-twitter"></i></a></li>
				<?php
			}
			if ( $linkedin ) {
				?>
				<li><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fab fa-linkedin-in"></i></a></li>
				<?php
			}
			if ( $google_plus ) {
				?>
				<li><a href="<?php echo esc_url( $google_plus ); ?>"><i class="fab fa-google-plus-g"></i></a></li>
				<?php
			}
			?>
		</ul>
		<?php
	}
}

function dlist_post_cats() {
	$categories_list = get_the_category_list( esc_html__( ', ', 'dlist-core' ) );
	if ( $categories_list ) {
		echo ( '<li>' . esc_html__( 'in', 'dlist-core' ) . ' ' . $categories_list . '</li>' );
	}
}

function dlist_post_tags() {
	if ( get_the_tags() ) {
		?>
		<div class="tags"><?php the_tags( '<ul class="d-flex list-unstyled"><li>', '</li><li>', '</li></ul>' ); ?></div>
		<?php
	}
}

function mail_desc() {
	$desc = __( '<strong>Login <a href="https://mailchimp.com" target="_blank">Mailchimp</a> > Profile > Audience > Create  Audience / select existing audience</strong><br> Then go to <strong>Signup forms > Embedded forms </strong> and scroll down then you will found <strong>Copy/paste onto your site</strong> textarea including some text. Copy the form action URL and paste it here. <b style="color: green;">[For more details follow theme docs: <a href="http://directorist.com/docs/page-builder/" target="_blank">Page Builder</a>]</b>', 'dlist' );
	return $desc;
}


function az_template( $template, $settings ) {
	$az_dir = plugin_dir_path( __FILE__ );
	$file   = $az_dir . $template . '.php';
	ob_start();
	include $file;
	echo ob_get_clean();
}

// blog post estimated reading time.
function reading_time( $content = '' ) {
	$clean_content = strip_shortcodes( $content );
	$clean_content = strip_tags( $clean_content );
	$word_count    = str_word_count( $clean_content );
	$time          = ceil( $word_count / 250 );
	return $time;
}