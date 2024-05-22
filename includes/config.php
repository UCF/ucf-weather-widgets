<?php

/**
 * Function that handles enqueueing front end
 * assets for the plugin.
 *
 * @author Jim Barnes
 * @since 1.0.0
 */
function ucf_weather_widgets_enqueue_assets() {
	wp_enqueue_style(
		'weather-icons',
		'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css',
		null,
		null,
		'all'
	);
}

add_action( 'wp_enqueue_scripts', 'ucf_weather_widgets_enqueue_assets' );
