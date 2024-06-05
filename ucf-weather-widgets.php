<?php
/**
 * Plugin Name:       UCF Weather Widgets
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ucf-weather-widgets
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'UCF_WEATHER_WIDGETS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'UCF_WEATHER_WIDGETS__PLUGIN_FILE', __FILE__ );
define( 'UCF_WEATHER_WIDGETS__BUILD_URL', plugins_url( 'build', UCF_WEATHER_WIDGETS__PLUGIN_FILE ) );

include_once UCF_WEATHER_WIDGETS__PLUGIN_DIR . 'includes/config.php';
include_once UCF_WEATHER_WIDGETS__PLUGIN_DIR . 'includes/feeds.php';
include_once UCF_WEATHER_WIDGETS__PLUGIN_DIR . 'includes/layouts.php';
include_once UCF_WEATHER_WIDGETS__PLUGIN_DIR . 'includes/common.php';
include_once UCF_WEATHER_WIDGETS__PLUGIN_DIR . 'includes/shortcodes.php';

if ( ! function_exists( 'ucf_weather_widgets_activate' ) ) {
	function ucf_weather_widgets_activate() {
		UCF_Weather_Widgets_Config::add_options();
	}

	register_activation_hook( UCF_WEATHER_WIDGETS__PLUGIN_FILE, 'ucf_weather_widgets_activate' );
}

if ( ! function_exists( 'ucf_weather_widgets_deactivate' ) ) {
	function ucf_weather_widgets_deactivate() {
		UCF_Weather_Widgets_Config::delete_options();
	}

	register_deactivation_hook( UCF_WEATHER_WIDGETS__PLUGIN_FILE, 'ucf_weather_widgets_deactivate' );
}

add_action( 'plugins_loaded', function() {
	add_action( 'admin_menu', array( 'UCF_Weather_Widgets_Config', 'add_options_page' ) );
} );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_ucf_weather_widgets_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_ucf_weather_widgets_block_init' );
