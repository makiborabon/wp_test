<?php
/**
 * Theme Options related to slider.
 *
 * @package Corporate_Club
 */

$default = corporate_club_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_slider_panel',
	array(
	'title'      => esc_html__( 'Featured Slider', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Slider Type Section.
$wp_customize->add_section( 'section_theme_slider_type',
	array(
	'title'      => esc_html__( 'Slider Type', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_slider_panel',
	)
);

// Setting featured_slider_status.
$wp_customize->add_setting( 'theme_options[featured_slider_status]',
	array(
	'default'           => $default['featured_slider_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_status]',
	array(
	'label'    => esc_html__( 'Enable Slider On', 'corporate-club' ),
	'section'  => 'section_theme_slider_type',
	'type'     => 'select',
	'priority' => 100,
	'choices'  => corporate_club_get_featured_slider_content_options(),
	)
);
// Setting featured_slider_type.
$wp_customize->add_setting( 'theme_options[featured_slider_type]',
	array(
	'default'           => $default['featured_slider_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_type]',
	array(
	'label'           => esc_html__( 'Select Slider Type', 'corporate-club' ),
	'section'         => 'section_theme_slider_type',
	'type'            => 'select',
	'priority'        => 100,
	'choices'         => corporate_club_get_featured_slider_type(),
	'active_callback' => 'corporate_club_is_featured_slider_active',
	)
);
// Setting featured_slider_number.
$wp_customize->add_setting( 'theme_options[featured_slider_number]',
	array(
	'default'           => $default['featured_slider_number'],
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'corporate_club_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_number]',
	array(
	'label'           => esc_html__( 'No of Slides', 'corporate-club' ),
	'description'     => esc_html__( 'Enter number between 1 and 5. Save and refresh the page if No of Slides is changed.', 'corporate-club' ),
	'section'         => 'section_theme_slider_type',
	'type'            => 'number',
	'priority'        => 100,
	'active_callback' => 'corporate_club_is_featured_slider_active',
	'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 55px;' ),
	)
);

$featured_slider_number = absint( corporate_club_get_option( 'featured_slider_number' ) );

if ( $featured_slider_number > 0 ) {
	for ( $i = 1; $i <= $featured_slider_number; $i++ ) {
		$wp_customize->add_setting( "theme_options[featured_slider_page_$i]",
			array(
			'default'           => isset( $default[ 'featured_slider_page_' . $i ] ) ? $default[ 'featured_slider_page_' . $i ] : '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'corporate_club_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control( "theme_options[featured_slider_page_$i]",
			array(
			'label'           => esc_html__( 'Featured Page', 'corporate-club' ) . ' - ' . $i,
			'section'         => 'section_theme_slider_type',
			'type'            => 'dropdown-pages',
			'priority'        => 100,
			'active_callback' => 'corporate_club_is_featured_page_slider_active',
			)
		);
	} // End for loop.
}

// Setting featured_slider_read_more_text.
$wp_customize->add_setting( 'theme_options[featured_slider_read_more_text]',
	array(
	'default'           => $default['featured_slider_read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_read_more_text]',
	array(
	'label'           => esc_html__( 'Read More Text', 'corporate-club' ),
	'section'         => 'section_theme_slider_type',
	'type'            => 'text',
	'priority'        => 100,
	'active_callback' => 'corporate_club_is_featured_slider_active',
	)
);

// Slider Options Section.
$wp_customize->add_section( 'section_theme_slider_options',
	array(
	'title'      => esc_html__( 'Slider Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_slider_panel',
	)
);

// Setting featured_slider_transition_effect.
$wp_customize->add_setting( 'theme_options[featured_slider_transition_effect]',
	array(
	'default'           => $default['featured_slider_transition_effect'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_transition_effect]',
	array(
	'label'    => esc_html__( 'Transition Effect', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'select',
	'priority' => 100,
	'choices'  => corporate_club_get_featured_slider_transition_effects(),
	)
);

// Setting featured_slider_transition_delay.
$wp_customize->add_setting( 'theme_options[featured_slider_transition_delay]',
	array(
	'default'           => $default['featured_slider_transition_delay'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_transition_delay]',
	array(
	'label'       => esc_html__( 'Transition Delay', 'corporate-club' ),
	'description' => esc_html__( 'in seconds', 'corporate-club' ),
	'section'     => 'section_theme_slider_options',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' ),
	)
);
// Setting featured_slider_transition_duration.
$wp_customize->add_setting( 'theme_options[featured_slider_transition_duration]',
	array(
	'default'           => $default['featured_slider_transition_duration'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_number_range',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_transition_duration]',
	array(
	'label'       => esc_html__( 'Transition Duration', 'corporate-club' ),
	'description' => esc_html__( 'in seconds', 'corporate-club' ),
	'section'     => 'section_theme_slider_options',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' ),
	)
);
// Setting featured_slider_enable_caption.
$wp_customize->add_setting( 'theme_options[featured_slider_enable_caption]',
	array(
	'default'           => $default['featured_slider_enable_caption'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_enable_caption]',
	array(
	'label'    => esc_html__( 'Enable Caption', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting featured_slider_enable_arrow.
$wp_customize->add_setting( 'theme_options[featured_slider_enable_arrow]',
	array(
	'default'           => $default['featured_slider_enable_arrow'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_enable_arrow]',
	array(
	'label'    => esc_html__( 'Enable Arrow', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting featured_slider_enable_pager.
$wp_customize->add_setting( 'theme_options[featured_slider_enable_pager]',
	array(
	'default'           => $default['featured_slider_enable_pager'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_enable_pager]',
	array(
	'label'    => esc_html__( 'Enable Pager', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting featured_slider_enable_autoplay.
$wp_customize->add_setting( 'theme_options[featured_slider_enable_autoplay]',
	array(
	'default'           => $default['featured_slider_enable_autoplay'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_enable_autoplay]',
	array(
	'label'    => esc_html__( 'Enable Autoplay', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting featured_slider_enable_overlay.
$wp_customize->add_setting( 'theme_options[featured_slider_enable_overlay]',
	array(
	'default'           => $default['featured_slider_enable_overlay'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[featured_slider_enable_overlay]',
	array(
	'label'    => esc_html__( 'Enable Overlay', 'corporate-club' ),
	'section'  => 'section_theme_slider_options',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
