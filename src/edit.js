/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import {
	Panel,
	PanelBody,
	SelectControl,
	TextControl,
} from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { longitude, latitude, layout } = attributes;

	return (
		<>
			<InspectorControls>
				<Panel>
					<PanelBody
						title={ __(
							'Map Widget Settings',
							'ucf-weather-widgets'
						) }
						icon="admin-plugins"
					>
						<TextControl
							label={ __( 'Latitude', 'ucf-weather-widgets' ) }
							help={ __(
								'The latitude of the area to display weather for.'
							) }
							onChange={ ( latitude ) =>
								setAttributes( { latitude } )
							}
							value={ latitude }
						/>
						<TextControl
							label={ __( 'Longitude', 'ucf-weather-widgets' ) }
							help={ __(
								'The longitude of the area to display weather for.'
							) }
							onChange={ ( longitude ) =>
								setAttributes( { longitude } )
							}
							value={ longitude }
						/>
						<SelectControl
							label={ __( 'Layout', 'ucf-weather-widgets' ) }
							help={ __(
								'The layout to use when displaying the widget.'
							) }
							options={ [
								{
									label: 'Full',
									value: 'full',
								},
								{
									label: 'Ribbon',
									value: 'ribbon',
								},
								{
									label: 'Compact',
									value: 'compact',
								},
							] }
							onChange={ ( layout ) =>
								setAttributes( { layout } )
							}
							value={ layout }
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>
			,
			<div { ...useBlockProps() }>
				<p>Latitude: { latitude }</p>
				<p>Longitude: { longitude }</p>
				<p>Layout: { layout }</p>
			</div>
		</>
	);
}
