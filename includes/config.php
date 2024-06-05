<?php

/**
 * Function that handles enqueueing front end
 * assets for the plugin.
 *
 * @author Jim Barnes
 * @since 1.0.0
 */
function ucf_weather_widgets_enqueue_assets() {
	$defaults = UCF_Weather_Widgets_Config::$default_options;
	$plugin_data = get_plugin_data( UCF_WEATHER_WIDGETS__PLUGIN_FILE, false, false );

	wp_enqueue_style(
		'weather-icons',
		'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css',
		null,
		'2.0.12',
		'all'
	);

	wp_enqueue_style(
		'weather-wind-icons',
		'https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons-wind.min.css',
		array( 'weather-icons' ),
		'2.0.12',
		'all'
	);

	$enqueue_styles = filter_var(
		get_option( 'ucf_weather_widgets_enqueue_styles', $defaults['ucf_weather_widgets_enqueue_styles'] ),
		FILTER_VALIDATE_BOOLEAN
	);

	if ( $enqueue_styles ) {
		wp_enqueue_style(
			'weather-styles',
			UCF_WEATHER_WIDGETS__BUILD_URL . '/style-index.css',
			null,
			$plugin_data['Version'],
			'all'
		);
	}
}

add_action( 'wp_enqueue_scripts', 'ucf_weather_widgets_enqueue_assets' );

if ( ! class_exists( 'UCF_Weather_Widgets_Config' ) ) {
	class UCF_Weather_Widgets_Config {
		public static
			$default_options = array(
				'ucf_weather_widgets_weatherstem_base_url' => 'https://data.weatherstem.com/v3/wx/observations/current',
				'ucf_weather_widgets_weatherstem_api_key'  => '',
				'ucf_weather_widgets_cache_expiration'     => 300,
				'ucf_weather_widgets_enqueue_styles'       => false
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
			add_option( 'ucf_weather_widgets_enqueue_styles', $defaults['ucf_weather_widgets_enqueue_styles'] );
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
			delete_option( 'ucf_weather_widgets_enqueue_styles' );
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
			register_setting( 'ucf-weather-widgets-group', 'ucf_weather_widgets_enqueue_styles' );
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
			$ucf_weather_widgets_enqueue_styles = get_option( 'ucf_weather_widgets_enqueue_styles', $defaults['ucf_weather_widgets_enqueue_styles'] );

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
						<tr valign="top">
							<th scope="row">Enqueue Stylesheet (Check when not using block editor)</th>
							<td><label for="ucf_weather_widgets_enqueue_styles"><input class="checkbox" type="checkbox" name="ucf_weather_widgets_enqueue_styles"<?php echo $ucf_weather_widgets_enqueue_styles ? ' checked' : ''; ?>> Enqueue Stylesheet</label></td>
						</tr>
					</table>
					<?php submit_button(); ?>
				</form>
			</div>
<?php
		}
	}
}
