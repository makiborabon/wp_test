<?php
/**
 * Theme Options.
 *
 * @package Corporate_Club
 */

$default = corporate_club_get_default_theme_options();

// Add theme options panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => esc_html__( 'Header Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => esc_html__( 'Show Site Title', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => esc_html__( 'Show Tagline', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting contact_number.
$wp_customize->add_setting( 'theme_options[contact_number]',
	array(
	'default'           => $default['contact_number'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_number]',
	array(
	'label'    => esc_html__( 'Contact Number', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting contact_email.
$wp_customize->add_setting( 'theme_options[contact_email]',
	array(
	'default'           => $default['contact_email'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control( 'theme_options[contact_email]',
	array(
	'label'    => esc_html__( 'Contact Email', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting contact_address.
$wp_customize->add_setting( 'theme_options[contact_address]',
	array(
	'default'           => $default['contact_address'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[contact_address]',
	array(
	'label'    => esc_html__( 'Contact Address', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
		'default'           => $default['show_social_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
		'label'    => esc_html__( 'Enable Social Icons', 'corporate-club' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[show_search_in_header]',
	array(
		'default'           => $default['show_search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search_in_header]',
	array(
		'label'    => esc_html__( 'Enable Search Form', 'corporate-club' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting quick_links_text.
$wp_customize->add_setting( 'theme_options[quick_links_text]',
	array(
	'default'           => $default['quick_links_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[quick_links_text]',
	array(
	'label'    => esc_html__( 'Quick Links Text', 'corporate-club' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_cart_in_header.
$wp_customize->add_setting( 'theme_options[show_cart_in_header]',
	array(
		'default'           => $default['show_cart_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_cart_in_header]',
	array(
		'label'       => esc_html__( 'Enable Cart Icon', 'corporate-club' ),
		'description' => esc_html__( 'This requires WooCommerce plugin.', 'corporate-club' ),
		'section'     => 'section_header',
		'type'        => 'checkbox',
		'priority'    => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => esc_html__( 'Layout Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => esc_html__( 'Global Layout', 'corporate-club' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corporate_club_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => esc_html__( 'Archive Layout', 'corporate-club' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => corporate_club_get_archive_layout_options(),
	'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => esc_html__( 'Footer Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Copyright Text', 'corporate-club' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting go_to_top_status.
$wp_customize->add_setting( 'theme_options[go_to_top_status]',
	array(
		'default'           => $default['go_to_top_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'corporate_club_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[go_to_top_status]',
	array(
		'label'       => esc_html__( 'Enable Go To Top', 'corporate-club' ),
		'section'     => 'section_footer',
		'type'        => 'checkbox',
		'priority'    => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => esc_html__( 'Blog Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => esc_html__( 'Excerpt Length', 'corporate-club' ),
	'description' => esc_html__( 'in words', 'corporate-club' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);
// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => esc_html__( 'Read More Text', 'corporate-club' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting exclude_categories.
$wp_customize->add_setting( 'theme_options[exclude_categories]',
	array(
	'default'           => $default['exclude_categories'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[exclude_categories]',
	array(
	'label'       => esc_html__( 'Exclude Categories in Blog', 'corporate-club' ),
	'description' => esc_html__( 'Enter category ID to exclude in Blog Page. Separate with comma if more than one.', 'corporate-club' ),
	'section'     => 'section_blog',
	'type'        => 'text',
	'priority'    => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => esc_html__( 'Breadcrumb Options', 'corporate-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'corporate_club_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'       => esc_html__( 'Breadcrumb Type', 'corporate-club' ),
	'section'     => 'section_breadcrumb',
	'type'        => 'select',
	'choices'     => corporate_club_get_breadcrumb_type_options(),
	'priority'    => 100,
	)
);
