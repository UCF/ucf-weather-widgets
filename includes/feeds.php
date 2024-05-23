<?php

/**
 * Returns weather data for the provided longitude
 * and latitude.
 *
 * @author Jim Barnes
 * @since 1.0.0
 * @param string $latitude The latitude to retrieve weather for
 * @param string $longitude The longitude to retrieve weather for
 * @return object|null The returned object from the API or null
 */
function ucf_weather_widgets_get_data( $latitude, $longitude ) {
	$defaults = UCF_Weather_Widgets_Config::$default_options;

	if ( !$latitude || !$longitude ) return null;

	$args = array(
		'geocode'  => "$latitude,$longitude",
		'format'   => 'json',
		'language' => 'en-US',
		'units'    => 'e',
		'apiKey'   => get_option( 'ucf_weather_widgets_weatherstem_api_key', $defaults['ucf_weather_widgets_weatherstem_api_key'] )
	);

	$arg_string = http_build_query( $args );

	$base_url = get_option( 'ucf_weather_widgets_weatherstem_base_url', $defaults['ucf_weather_widgets_weatherstem_base_url'] );

	$request_url = "$base_url?$arg_string";

	$response = wp_remote_get(
		$request_url,
		array(
			'timeout' => 5
		)
	);

	if ( is_array( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
		$result = json_decode( wp_remote_retrieve_body( $response ) );
	} else {
		$result = null;
	}

	return $result;
}
