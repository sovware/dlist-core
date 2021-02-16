<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

$style             = $settings['style'];
$text_field        = $settings['text_field'];
$category_field    = $settings['category_field'];
$location_field    = $settings['location_field'];
$search_btn        = $settings['search_btn'];
$text_field_ph     = $settings['text_field_ph'];
$category_field_ph = $settings['category_field_ph'];
$location_field_ph = $settings['location_field_ph'];
$search_btn_ph     = $settings['search_btn_ph'];
$advance           = $settings['advance'];

$require_text                = get_directorist_option( 'require_search_text' ) ? 'required' : '';
$require_cat                 = get_directorist_option( 'require_search_category' ) ? 'required' : '';
$require_loc                 = get_directorist_option( 'require_search_location' ) ? 'required' : '';
$search_location_address     = get_directorist_option( 'search_location_address', 'address' );
$search_placeholder          = $text_field_ph ? $text_field_ph : get_directorist_option( 'search_placeholder', esc_attr_x( 'What are you looking for?', 'placeholder', 'dlist-core' ) );
$search_category_placeholder = $category_field_ph ? $category_field_ph : get_directorist_option( 'search_category_placeholder', esc_html__( 'Select a category', 'dlist-core' ) );
$search_location_placeholder = $location_field_ph ? $location_field_ph : get_directorist_option( 'search_location_placeholder', esc_html__( 'Select a location', 'dlist-core' ) );
$search_listing_text         = $search_btn_ph ? $search_btn_ph : get_directorist_option( 'search_listing_text', esc_html__( 'Search', 'dlist-core' ) );

$query_args = array(
	'parent'             => 0,
	'term_id'            => 0,
	'hide_empty'         => 0,
	'orderby'            => 'name',
	'order'              => 'asc',
	'show_count'         => 0,
	'single_only'        => 0,
	'pad_counts'         => true,
	'immediate_category' => 0,
	'active_term_id'     => 0,
	'ancestors'          => array(),
);

do_action( 'atbdp_before_search_form' ); ?>

<div class="row atbdp-search-form">
	<?php if ( $text_field ) { ?>
		<div class="single_search_field search_query">
			<input class="form-control search_fields" type="text" name="q" <?php echo esc_attr( $require_text ); ?> autocomplete="off" placeholder="<?php echo esc_html( $search_placeholder ); ?>">
		</div>
	<?php } ?>

	<?php if ( $category_field ) { ?>
		<div class="single_search_field search_category">
			<select <?php echo esc_attr( $require_cat ); ?> name="in_cat" class="search_fields form-control" id="at_biz_dir-category">
				<option value=""><?php echo esc_html( $search_category_placeholder ); ?></option>
				<?php echo search_category_location_filter( $query_args, ATBDP_CATEGORY ); ?>
			</select>
		</div>
		<?php
		do_action( 'atbdp_search_listing_after_category_field' );
	}

	if ( $location_field ) {
		if ( 'listing_location' == $search_location_address ) {
			?>
			<div class="single_search_field search_location">
				<select <?php echo esc_attr( $require_loc ); ?> name="in_loc" class="search_fields form-control" id="at_biz_dir-location">
					<option value=""><?php echo esc_html( $search_location_placeholder ); ?></option>
					<?php echo search_category_location_filter( $query_args, ATBDP_LOCATION ); ?>
				</select>
			</div>
			<?php
		} else {
			wp_enqueue_script( 'atbdp-geolocation' );
			$address = ! empty( $_GET['address'] ) ? $_GET['address'] : '';
			?>
			<div class="single_search_field atbdp_map_address_field">
				<div class="atbdp_get_address_field">
					<input type="text" id="address" name="address" autocomplete="off" value="<?php echo esc_attr( $address ); ?>" placeholder="<?php echo esc_html( $search_location_placeholder ); ?>" <?php echo esc_attr( $require_loc ); ?> class="form-control location-name">
					<span class="atbd_get_loc la la-crosshairs"></span>
				</div>
				<?php
				$select_listing_map = get_directorist_option( 'select_listing_map', 'google' );
				if ( 'google' != $select_listing_map ) {
					echo '<div class="address_result"></div>';
				}
				?>

				<input type="hidden" id="cityLat" name="cityLat" value="" />
				<input type="hidden" id="cityLng" name="cityLng" value="" />
			</div>
			<?php
		}
	}
	?>

	<?php if ( ( 'style2' === $style ) || ( $search_btn || $advance ) ) { ?>
		<div class="atbd_submit_btn">
			<?php if ( ( 'style2' === $style ) || $search_btn ) { ?>
				<button type="submit" class="btn_search"><?php echo ( 'style2' !== $style ) ? esc_attr( $search_listing_text ) : '<i class="la la-search"></i>'; ?></button>
			<?php } ?>

			<?php if ( $advance ) { ?>
				<button class="more-filter"><span class="<?php atbdp_icon_type( true ); ?>-filter"></span></button>
			<?php } ?>
		</div>
	<?php } ?>
</div>