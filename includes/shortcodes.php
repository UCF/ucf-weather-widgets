<?php

if ( ! function_exists( 'sc_ucf_weather_widget' ) && ! function_exists( 'ucf_weather_widget_add_shortcode' ) ) {
	/**
	 * Provides the markup for the ucf-weather shortcode.
	 *
	 * @author Jim Barnes
	 * @since 1.0.0
	 * @param array $atts The shortcode attributes
	 * @param string $content The inner content
	 * @return string
	 */
	function sc_ucf_weather_widget( $atts, $content = '' ) {
		$args = shortcode_atts(array(
			'longitude' => null,
			'latitude'  => null,
			'layout'    => 'full'
		), $atts );

		$data = ucf_weather_widgets_get_data( $args['latitude'], $args['longitude'] );

		return ucf_weather_widgets_display_widget( $data, $args['layout'] );
	}

	/**
	 * Function for registering the ucf-weather shortcode
	 * @author Jim Barnes
	 * @since 1.0.0
	 */
	function ucf_weather_widget_add_shortcode() {
		add_shortcode( 'ucf-weather', 'sc_ucf_weather_widget' );
	}

	add_action( 'init', 'ucf_weather_widget_add_shortcode', 10, 0 );
}
