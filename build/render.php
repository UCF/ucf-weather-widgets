<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$longitude = $attributes['longitude'] ?? null;
$latitude = $attributes['latitude'] ?? null;
$layout = $attributes['layout'] ?? 'full';

$data = null;

if ( $longitude && $latitude ) {
	$data = ucf_weather_widgets_get_data( $latitude, $longitude );
}

?>
<?php if ( $data ) : ?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php echo ucf_weather_widgets_display_widget( $data, $layout ); ?>
</div>
<?php endif; ?>
