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
$layout     = $settings['layout'];
$number_loc = $settings['number_loc'];
$order_by   = $settings['order_by'];
$order_list = $settings['order_list'];
$row        = $settings['row'];
$slug       = $settings['slug'] ? implode( ',', $settings['slug'] ) : '';

echo do_shortcode( '[directorist_all_locations view="' . esc_attr( $layout ) . '" orderby="' . esc_attr( $order_by ) . '" order="' . esc_attr( $order_list ) . '" loc_per_page="' . $number_loc . '" columns="' . esc_attr( $row ) . '" slug="' . esc_attr( $slug ) . '"]' );
