<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */
?>

<?php
$order_by   = $settings['order_by'];
$order_list = $settings['order_list'];
$row        = $settings['row'];
$slug       = $settings['slug'] ? implode( ',', $settings['slug'] ) : '';
$number_cat = $settings['number_cat'];
$cat_type   = $settings['cat_type'];
?>

<div class="kc-title-wrap" id="<?php echo esc_attr( $cat_type ); ?>">
	<?php echo do_shortcode( '[directorist_all_categories view="grid" orderby="' . esc_attr( $order_by ) . '" order="' . esc_attr( $order_list ) . '" cat_per_page="' . esc_attr( $number_cat ) . '" columns="' . esc_attr( $row ) . '" slug="' . esc_attr( $slug ) . '"]' ); ?>
</div>
