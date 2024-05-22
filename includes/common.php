<?php

/**
 * Returns the markup for the current weather data.
 *
 * @author Jim Barnes
 * @since 1.0.0
 * @param object $data The data from the API
 * @return string
 */
function ucf_weather_widgets_common( $data ) {
	$icon_code = $data->iconCode;
	$phrase    = $data->wxPhraseLong;
	$high      = $data->temperatureMax24Hour;
	$low       = $data->temperatureMin24Hour;

	ob_start();
?>
	<div class="weather-info">
		<i class="wi wi-yahoo-<?php echo $icon_code; ?>"></i> <?php echo $phrase; ?>
		<p>High: <?php echo $high; ?></p>
		<p>Low: <?php echo $low; ?></p>
	</div>
<?php
	return ob_get_clean();
}
