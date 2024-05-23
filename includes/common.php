<?php

/**
 * Returns the markup for the current weather data.
 *
 * @author Jim Barnes
 * @since 1.0.0
 * @param object $data The data from the API
 * @return string
 */
function ucf_weather_widgets_display_widget( $data, $layout = 'full' ) {
	return apply_filters( "ucf_weather_widgets_display_$layout", $data );
}
