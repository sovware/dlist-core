<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

if ( ! class_exists( 'Directorist_Base' ) ) {
	return;
}

$default_types = $settings['default_types'];
$types = $settings['types'] ? implode( ',', $settings['types'] ) : '';
$list_num = $settings['list_num'];
$featured = $settings['featured'];
$popular = $settings['popular'];
$column = $settings['column'];
$autoplay = $settings['autoplay'] ? 'true' : 'false';
$slider_interval = $settings['slider_interval'];

add_filter( 'all_listings_wrapper', 'all_listings_wrapper' );
add_filter( 'all_listings_column', function(){ return ''; } );
?>

<div class="directorist-listing-carousel" data-carousel-items="<?php echo esc_attr( $column ); ?>" data-carousel-loop="false" data-carousel-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-carousel-delay="<?php echo esc_attr( $slider_interval ); ?>">

	<?php echo do_shortcode( '[directorist_all_listing view="grid" header="no" action_before_after_loop="no" show_pagination="no" display_preview_image="yes" listings_per_page="' . esc_attr( $list_num ) . '" directory_type="' . $types . '" featured_only="' . esc_attr( $featured ) . '" popular_only="' . esc_attr( $popular ) . '" default_directory_type="' . $default_types . '"]' ); ?>
	
</div>
