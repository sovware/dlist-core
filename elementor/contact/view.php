<?php
/**
 * Description.
 *
 * @package WordPress
 * @author  AazzTech
 * @since   1.0
 * @version 1.0
 */

$items   = $settings['items']; ?>

<div class="contact_info_list_wrapper">
	<?php if ($items) { ?>
		<div class="contact_info_list">
			<ul>
				<?php
				foreach ($items as $item) {
					$title    = $item['title'];
					$subtitle = $item['subtitle'];
					$icon     = $item['icon']; ?>
					<li>
						<p><span class="<?php echo esc_attr($icon); ?>"></span></p>
						<p class="contact-details">
							<span class="contact-details__title"><?php echo esc_attr($title); ?></span>
							<span class="contact-details__info"><?php echo esc_attr($subtitle); ?></span>
						</p>
					</li>
				<?php
				}
				wp_reset_postdata(); ?>
			</ul>
		</div>
	<?php
	} ?>
</div>
