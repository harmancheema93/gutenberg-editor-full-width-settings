<?php 

/**
	 Plugin Name: Page Editor Full Width
	 Plugin URI: http://wordpress.org/plugins/hello-dolly/
	Description: This Plugin Provide option in customizer to change Page Editor to full width.
	Author: Harmandeep Singh
	Version: 1.0
	Author URI: https://github.com/harmancheema93
 */

if(!function_exists('hsc_page_editor_setting_register')){
	function hsc_page_editor_setting_register( $wp_customize ) {
		$wp_customize->add_section( 'page_editor' , array(
		    'title'      => __('page Editor Setting'),
		    'priority'   => 50,
		) );
		$wp_customize->add_setting(
		    'editor_width',
		    array(
		        'default' 	=> 'no',
		        "transport" => "refresh",
		    ));

		$wp_customize->add_control('editor_width', array(
            'label'   		=> __('Show Full Width'),
            'section' 		=> 'page_editor',
            'type'    		=> 'radio',
			'description' 	=> __( 'Choose an option to change page Editor width.' ),
		  	'choices' 		=> array(
			   'no' 	=> __( 'No' ),
			   'yes' 	=> __( 'Yes' ),
			),
        ));

	}
}
add_action( 'customize_register', 'hsc_page_editor_setting_register' );

add_action('admin_head', 'hsc_editor_width_page');

function hsc_editor_width_page() {
	if(get_theme_mod('editor_width') == 'yes'){
	  echo '<style>
	    body.page-editor-page .editor-post-title__block, body.page-editor-page .editor-default-block-appender, body.page-editor-page .editor-block-list__block {
			max-width: none !important;
		}
	    .block-editor__container .wp-block {
	        max-width: none !important;
	    }
	  </style>';
	}
}
