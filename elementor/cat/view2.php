<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

$i          = 1;
$order_by   = $settings['order_by'];
$order_list = $settings['order_list'];
$number_cat = $settings['number_cat'];
$slug       = 'slug' === $order_by ? $settings['slug'] : '';
$args       = array(
	'slug'          => $slug,
	'orderby'       => $order_by,
	'order'         => $order_list,
	'parent'        => 0,
	'number'        => $number_cat,
	'hide_empty'    => true,
	'taxonomy'      => ATBDP_CATEGORY,
	'no_found_rows' => true,
);
$categories = get_categories( $args );
?>

<?php if ( $categories ) { ?>
	<div class="category-slider owl-carousel">
		<?php
		foreach ( $categories as $cat ) {
			$link      = is_directorist() ? \ATBDP_Permalink::atbdp_get_category_page( (object) $cat ) : '';
			$icon      = get_cat_icon( $cat->term_id );
			$cat_count = dlist_all_categories_after_category_name( '', $cat );
			$bg_color  = ' color-' . $i;
			?>

			<div class="category-slider__single">
				<?php directorist_icon( $icon, true, 'category-icon ' . $bg_color ); ?>
					<a href="<?php echo esc_url( $link ); ?>" class="stretched-link">
						<?php echo esc_attr( $cat->name ); ?>
					</a>
				<?php echo wp_kses_post( $cat_count ); ?>
			</div>

			<?php
			$i++;
			$i = $i > 6 ? $i = 1 : $i;
		}
		?>
	</div>
	<?php
} else {
	?>
	<div class="alert alert-warning w-100" role="alert"><?php _e( 'No location found!', 'dlist-core' ); ?></div>
	<?php
}
