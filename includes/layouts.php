<?php
/**
 * Registers the default layouts
 * for the widget
 */

if ( ! function_exists( 'ucf_weather_widgets_display_full' ) ) {
	function ucf_weather_widgets_display_full( $data ) {
		$icon_code = $data->iconCode;
		$phrase    = $data->wxPhraseLong;
		$temp      = $data->temperature;
		$high      = $data->temperatureMax24Hour;
		$low       = $data->temperatureMin24Hour;

		ob_start();
	?>
		<div class="weather-info weather-info-full">
			<div class="current-conditions">
				<span class="temperature"><?php echo $temp; ?>&deg;</span>
				<span class="icon"><i class="wi wi-yahoo-<?php echo $icon_code; ?>"></i></span>
				<span class="description"><?php echo $phrase; ?></span>
			</div>
			<div class="forecast">
				<span class="high"><?php echo $high; ?>&deg;</span>
				<span class="separator">|</span>
				<span class="low"><?php echo $low; ?>&deg;</span>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_weather_widgets_display_full', 'ucf_weather_widgets_display_full', 10, 1 );
}

if ( ! function_exists( 'ucf_weather_widgets_display_ribbon' ) ) {
	function ucf_weather_widgets_display_ribbon( $data ) {
		$icon_code = $data->iconCode;
		$temp      = $data->temperature;
		$high      = $data->temperatureMax24Hour;
		$low       = $data->temperatureMin24Hour;

		ob_start();
	?>
		<div class="weather-info weather-info-ribbon">
			<div class="current-conditions">
				<span class="temperature"><?php echo $temp; ?>&deg;</span>
				<span class="icon"><i class="wi wi-yahoo-<?php echo $icon_code; ?>"></i></span>
				<span class="high"><?php echo $high; ?>&deg;</span>
				<span class="separator">|</span>
				<span class="low"><?php echo $low; ?>&deg;</span>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_weather_widgets_display_ribbon', 'ucf_weather_widgets_display_ribbon', 10, 1 );
}

if ( ! function_exists( 'ucf_weather_widgets_display_compact' ) ) {
	function ucf_weather_widgets_display_compact( $data ) {
		$icon_code = $data->iconCode;
		$temp      = $data->temperature;

		ob_start();
	?>
		<div class="weather-info weather-info-compact">
			<div class="current-conditions">
				<span class="temperature"><?php echo $temp; ?>&deg;</span>
				<span class="icon"><i class="wi wi-yahoo-<?php echo $icon_code; ?>"></i></span>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_weather_widgets_display_compact', 'ucf_weather_widgets_display_compact', 10, 1 );
}
