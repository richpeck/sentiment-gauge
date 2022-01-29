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
				},
				max_width: {
					type: 'number',
					default: '100'
				},
				font_color: {
					type: 'string',
					default: 'inherit'
				},
				border_color: {
					type: 'string',
					default: '#333'
				},
				background_color: {
					type: 'string',
					default: 'white'
				},
				margin: {
					type: 'number',
					default: '0'
				}
			},

			// Defines the block within the editor.
			edit: function( props ) {
				var title    		  = props.attributes.title;
				var percent  		  = props.attributes.percent;
				var color    		  = props.attributes.color;
				var margin   		  = props.attributes.margin;				
				var background_color  = props.attributes.background_color;	
				var border_color      = props.attributes.border_color; 
				var font_color        = props.attributes.font_color; 
				var max_width    	  = props.attributes.max_width;
				var focus    	  	  = props.focus;

				return [
					
            		createElement( Fragment, {},
            			createElement( InspectorControls, {},
            				createElement( PanelBody, { title: 'Settings', initialOpen: true },
            
            					/* Pin Colour */
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
                								defaultValue: props.attributes.font_color
                							}
                						)
                					)
            					],
										  
            					/* Background Colour */
            					[
            					    createElement( PanelRow, {}, 
            					        createElement('label', {}, 'Background Colour')
            					    ),
                					createElement( PanelRow, {},
                						createElement( ColorPicker,
                							{
                								onChange: (value) => {
                									props.setAttributes({ background_color: value });
                								},
                								defaultValue: props.attributes.background_color
                							}
                						)
                					)
            					],
										  
            					/* Font Colour */
            					[
            					    createElement( PanelRow, {}, 
            					        createElement('label', {}, 'Font Colour')
            					    ),
                					createElement( PanelRow, {},
                						createElement( ColorPicker,
                							{
                								onChange: (value) => {
                									props.setAttributes({ font_color: value });
                								},
                								defaultValue: props.attributes.font_color
                							}
                						)
                					)
            					],
										  
            					/* Border Colour */
            					[
            					    createElement( PanelRow, {}, 
            					        createElement('label', {}, 'Border Colour')
            					    ),
                					createElement( PanelRow, {},
                						createElement( ColorPicker,
                							{
                								onChange: (value) => {
                									props.setAttributes({ border_color: value });
                								},
                								defaultValue: props.attributes.border_color
                							}
                						)
                					)
            					],
            
            					/* Sentiment */
            					createElement( PanelRow, {},
            						createElement( RangeControl,
            							{
            							    label: 'Sentiment (Pin Value)',
            								onChange: (value) => {
            									props.setAttributes({ percent: value });
            								},
            								initialPosition: props.attributes.percent,
            								min: 0,
            								max: 100
            							}
            						)
            					),
										  
            					/* Max Width */
            					createElement( PanelRow, {},
            						createElement( RangeControl,
            							{
            							    label: 'Max Width (%)',
            								onChange: (value) => {
            									props.setAttributes({ max_width: value });
            								},
            								initialPosition: props.attributes.max_width,
            								min: 0,
            								max: 100
            							}
            						)
            					),
										  
            					/* Margin */
            					createElement( PanelRow, {},
            						createElement( RangeControl,
            							{
            							    label: 'Margin (px)',
            								onChange: (value) => {
            									props.setAttributes({ margin: value });
            								},
            								initialPosition: props.attributes.margin,
            								min: 0,
            								max: 100
            							}
            						)
            					),
										  
            				)
            			)
            		),

				    createElement(
    					'div',
    					{
    						className: 'gauge',
    						'style': { '--percent': `${percent}`, '--color': `${color}`, '--margin': `${margin}px`, '--background-color': `${background_color}`, '--border-color': `${border_color}`, '--font-color': `${font_color}`, '--max-width': `${max_width}%` }
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
            						onChange: (value) => {
										props.setAttributes({ title: value });
									},
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
				var title   		  = props.attributes.title;
				var percent 		  = props.attributes.percent;
				var color   		  = props.attributes.color;
				var margin   		  = props.attributes.margin;				
				var background_color  = props.attributes.background_color;	
				var border_color      = props.attributes.border_color; 
				var font_color        = props.attributes.font_color; 
				var max_width    	  = props.attributes.max_width;

				return createElement(
					'div',
					{
						className: 'gauge',
						'style': { '--percent': `${percent}`, '--color': `${color}`, '--margin': `${margin}px`, '--background-color': `${background_color}`, '--border-color': `${border_color}`, '--font-color': `${font_color}`, '--max-width': `${max_width}%` }
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