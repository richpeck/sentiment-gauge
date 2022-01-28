/**
 * Editable Block Example
 *
 * https://github.com/modularwp/gutenberg-block-editable-example
 */
( function() {
	var __                = wp.i18n.__; // The __() function for internationalization.
	var createElement     = wp.element.createElement; // The wp.element.createElement() function to create elements.
	var registerBlockType = wp.blocks.registerBlockType; // The registerBlockType() function to register blocks.
	var RichText          = wp.blockEditor.RichText; // For creating editable elements.
	
	// InspectorControls
	var InspectorControls                                                                    = wp.blockEditor.InspectorControls;
	var Fragment                                                                             = wp.element.Fragment;
	var{ TextControl, ToggleControl, Panel, PanelBody, PanelRow, ColorPicker, RangeControl } = wp.components;

	/**
	 * Register block
	 *
	 * @param  {string}   name     Block name.
	 * @param  {Object}   settings Block settings.
	 * @return {?WPBlock}          Block itself, if registered successfully,
	 *                             otherwise "undefined".
	 */
	registerBlockType(
		'sentiment-gauge/block', // Block name. Must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
		{
			title: __( 'Sentiment Gauge' ), // Block title. __() function allows for internationalization.
			icon: 'edit', // Block icon from Dashicons. https://developer.wordpress.org/resource/dashicons/.
			category: 'common', // Block category. Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
			supports: {
            	align: ['left', 'right', 'center']
            },
			attributes: {
			    percent: {
			        type: 'integer',
			        default: '50'
			    },
				title: {
					type: 'string',
					default: "&nbsp;"
				},
				color: {
					type: 'string',
					default: 'red'	
				}
			},

			// Defines the block within the editor.
			edit: function( props ) {
				var title   = props.attributes.title;
				var percent = props.attributes.percent;
				var color   = props.attributes.color;
				var focus   = props.focus;

				function onChangeContent(updatedContent) {
					props.setAttributes({ title: updatedContent });
				}

				return [

            		createElement( Fragment, {},
            			createElement( InspectorControls, {},
            				createElement( PanelBody, { title: 'Settings', initialOpen: true },
            
            					/* Colour */
            					[
            					    createElement( PanelRow, {}, 
            					        createElement('label', {}, 'Pin Colour')
            					    ),
                					createElement( PanelRow, {},
                						createElement( ColorPicker,
                							{
                								onChange: (value) => {
                									props.setAttributes({ color: value });
                								},
                								defaultValue: props.attributes.color
                							}
                						)
                					)
            					],
            
            					/* Range */
            					createElement( PanelRow, {},
            						createElement( RangeControl,
            							{
            							    label: 'Sentiment',
            								onChange: (value) => {
            									props.setAttributes({ percent: value });
            								},
            								initialPosition: props.attributes.percent,
            								min: 0,
            								max: 100
            							}
            						)
            					)
            					
            				)
            			)
            		),

				    createElement(
    					'div',
    					{
    						className: 'gauge',
    						'style': { '--percent': percent, '--color': color }
    					},
    					createElement(
        					'div',
        					{
        						className: 'element',
        						'data-percent': percent,
        					},
        					createElement(
            					RichText,
            					{
            						tagName: 'div',
            						className: 'title',
            						placeholder: 'Add a Title',
            						onChange: onChangeContent,
            						focus: focus,
            						onFocus: props.setFocus
            					}
            				) 
        				)
    				)
				];
			},

			// Defines the saved block.
			save: function( props ) {
				var title   = props.attributes.title;
				var percent = props.attributes.percent;
				var color   = props.attributes.color;

				return createElement(
					'div',
					{
						className: 'gauge',
						'style': { '--percent': `${percent}`, '--color': color }
					},
					createElement(
    					'div',
    					{
    						className: 'element',
    						'data-percent': percent,
    					},
    					createElement(
        					'div',
        					{
        						className: 'title'
        					},
        					title
					    )
    				)
				);
			},
		}
	);
})();