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

	wp_enqueue_style(
		'weather-wind-icons',
		'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons-wind.min.css',
		array( 'weather-icons' ),
		null,
		'all'
	);
}

add_action( 'wp_enqueue_scripts', 'ucf_weather_widgets_enqueue_assets' );

if ( ! class_exists( 'UCF_Weather_Widgets_Config' ) ) {
	class UCF_Weather_Widgets_Config {
		public static
			$default_options = array(
				'ucf_weather_widgets_weatherstem_base_url' => 'https://data.weatherstem.com/v3/wx/observations/current',
				'ucf_weather_widgets_weatherstem_api_key'  => '',
				'ucf_weather_widgets_cache_expiration'     => 300
			);

		/**
		 * Adds options on plugin activation
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function add_options() {
			$defaults = self::$default_options;

			add_option( 'ucf_weather_widgets_weatherstem_base_url', $defaults['ucf_weather_widgets_weatherstem_base_url'] );
			add_option( 'ucf_weather_widgets_weatherstem_api_key', $defaults['ucf_weather_widgets_weatherstem_api_key'] );
			add_option( 'ucf_weather_widgets_cache_expiration', $defaults['ucf_weather_widgets_cache_expiration'] );
		}

		/**
		 * Deletes options on plugin deactivation
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function delete_options() {
			delete_option( 'ucf_weather_widgets_weatherstem_base_url' );
			delete_option( 'ucf_weather_widgets_weatherstem_api_key' );
			delete_option( 'ucf_weather_widgets_cache_expiration' );
		}

		/**
		 * Creates the options page for weather settings
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function add_options_page() {
			add_options_page(
				'UCF Weather Widgets',
				'UCF Weather Widgets',
				'manage_options',
				'ucf_weather_widgets_settings',
				array(
					'UCF_Weather_Widgets_Config',
					'add_settings_page'
				)
			);

			add_action( 'admin_init', array( 'UCF_Weather_Widgets_Config', 'register_settings' ) );
		}

		/**
		 * Registers the various settings for the plugin
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'ucf-weather-widgets-group', 'ucf_weather_widgets_weatherstem_base_url' );
			register_setting( 'ucf-weather-widgets-group', 'ucf_weather_widgets_weatherstem_api_key' );
			register_setting( 'ucf-weather-widgets-group', 'ucf_weather_widgets_cache_expiration' );
		}

		/**
		 * Adds the settings page itself.
		 * @author Jim Barnes
		 * @since 1.0.0
		 */
		public static function add_settings_page() {
			$defaults = self::$default_options;
			$ucf_weather_widgets_weatherstem_base_url = get_option( 'ucf_weather_widgets_weatherstem_base_url', $defaults['ucf_weather_widgets_weatherstem_base_url'] );
			$ucf_weather_widgets_weatherstem_api_key = get_option( 'ucf_weather_widgets_weatherstem_api_key', $defaults['ucf_weather_widgets_weatherstem_api_key'] );
			$ucf_weather_widgets_cache_expiration = get_option( 'ucf_weather_widgets_cache_expiration', $defaults['ucf_weather_widgets_cache_expiration'] );

?>
			<div class="wrap">
				<h1>UCF News Settings</h1>
				<form method="post" action="options.php">
					<?php settings_fields( 'ucf-weather-widgets-group' ); ?>
					<?php do_settings_sections( 'ucf-weather-widgets-group' ); ?>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Weatherstem Base API URL</th>
							<td><input class="large-text" type="text" name="ucf_weather_widgets_weatherstem_base_url" value="<?php echo esc_attr( $ucf_weather_widgets_weatherstem_base_url ); ?>"></td>
						</tr>
						<tr valign="top">
							<th scope="row">Weatherstem API Key</th>
							<td><input class="large-text" type="text" name="ucf_weather_widgets_weatherstem_api_key" value="<?php echo esc_attr( $ucf_weather_widgets_weatherstem_api_key ); ?>"></td>
						</tr>
						<tr valign="top">
							<th scope="row">Feed Cache Expiration (In Seconds)</th>
							<td><input class="large-text" type="number" name="ucf_weather_widgets_cache_expiration" value="<?php echo esc_attr( $ucf_weather_widgets_cache_expiration );?>"></td>
						</tr>
					</table>
					<?php submit_button(); ?>
				</form>
			</div>
<?php
		}
	}
}
