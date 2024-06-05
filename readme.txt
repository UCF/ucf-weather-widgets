=== UCF Weather Widgets ===
Contributors:      webcom
Tags:              block
Tested up to:      6.1
Stable tag:        0.2.0
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Provides a weather widget with three included styles for displaying the current weather conditions.

== Description ==

Provides a weather block and shortcode for displaying current weather conditions. Both the block and shortcode support three styles out of the box:

1. Full: This style will provide a weather icon, currently temperature, wind speed, the forecasted high and low for the day and current humidity.
2. Ribbon: (Under construction) This style will provide a weather icon, current temperature and the forecasted high and low.
3. Compact: (Under construction) This still provides a weather icon and the current temperature.

== Examples ==

The following examples use the shortcode markup, but the same parameters could be passed to the block to achieve the same outcome.

The following provides a full weather widget for the main UCF campus.

```
[ucf-weather latitude="28.602268" longitude="-81.200142" layout="full"]
```

The following provides a compact widget for UCF Downtown.

```
[ucf-weather latitude="28.5465336" longitude="-81.38887," layout="compact"]
```

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/ucf-weather-widgets` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Add the API key for Weatherstem to the Settings > UCF Weather Widgets page.

== Changelog ==

= 0.2.0 =
Enhancements:
* Added setting for enqueuing the stylesheet on sites not using the block editor.

= 0.1.0 =
* Release
