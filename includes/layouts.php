<?php
/**
 * Registers the default layouts
 * for the widget
 */

if ( ! function_exists( 'ucf_weather_widgets_display_full' ) ) {
	function ucf_weather_widgets_display_full( $data, $location = null ) {
		// Icon Data
		$icon_code  = $data->iconCode;
		$phrase     = $data->wxPhraseLong;

		// Current conditions data
		$temp       = $data->temperature;
		$feels_like = $data->temperatureFeelsLike;

		// Additional data
		$high     = $data->temperatureMax24Hour;
		$low      = $data->temperatureMin24Hour;
		$humidity = $data->relativeHumidity;

		// Wind Information
		$wind_direction = $data->windDirectionCardinal;
		$wind_speed     = $data->windSpeed;

		ob_start();
	?>
		<div class="weather-info weather-info-full">
			<div class="icon-space">
				<?php if ( $location ) : ?>
				<span class="location"><?php echo $location; ?></span>
				<?php endif; ?>
				<span class="icon"><i class="wi wi-yahoo-<?php echo $icon_code; ?>"></i></span>
				<span class="description"><?php echo $phrase; ?></span>
				<dl class="icon-list">
					<dt><i class="wi wi-strong-wind"></i> <span class="sr-only">Wind Speed</span></dt>
					<dd><?php echo $wind_speed; ?> mph</dd>
					<dt><i class="wi wi-wind wi-from-<?php echo strtolower( $wind_direction ); ?>"></i> <span class="sr-only">Wind Direction</span></dt>
					<dd><?php echo $wind_direction; ?></dd>
				</dl>
			</div>
			<div class="conditions">
				<div class="temperature"><?php echo $temp; ?>&deg;</div>
				<div class="feels-like">Feels like <span class="feels-like-temp"><?php echo $feels_like; ?>&deg;</span></div>
				<dl class="additional-data">
					<dd>Hi/Lo</dd>
					<dt>
						<span class="high"><?php echo $high; ?>&deg;</span>
						<span class="separator">|</span>
						<span class="low"><?php echo $low; ?>&deg;</span>
					</dt>
					<dd>Humidity</dd>
					<dt><?php echo $humidity; ?>%</dt>
					<dd>Wind Direction</dd>
					<dt>
						<i class="wi wi-wind wi-from-<?php echo strtolower( $wind_direction ); ?>"></i> <?php echo $wind_direction; ?>
					</dt>
					<dd>Wind Speed</dd>
					<dt><?php echo $wind_speed; ?> mph</dt>
				</dl>
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
