<?php
/**
 * Theme Customizer.
 *
 * @package Corporate_Club
 */

/**
 * Add Customizer options.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_club_customize_register( $wp_customize ) {

	// Load custom controls.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/control.php';

	// Load custom controls and sections.
	$wp_customize->register_control_type( 'Corporate_Club_Heading_Control' );
	$wp_customize->register_control_type( 'Corporate_Club_Message_Control' );
	$wp_customize->register_control_type( 'Corporate_Club_Dropdown_Taxonomies_Control' );
	$wp_customize->register_control_type( 'Corporate_Club_Dropdown_Sidebars_Control' );
	$wp_customize->register_control_type( 'Corporate_Club_Radio_Image_Control' );
	$wp_customize->register_section_type( 'Corporate_Club_Upsell_Section' );

	// Upsell section.
	$wp_customize->add_section(
		new Corporate_Club_Upsell_Section( $wp_customize, 'custom_theme_upsell',
			array(
				'title'    => esc_html__( 'Corporate Club Pro', 'corporate-club' ),
				'pro_text' => esc_html__( 'Buy Pro', 'corporate-club' ),
				'pro_url'  => 'https://axlethemes.com/wordpress-themes/corporate-club-pro/',
				'priority' => 1,
			)
		)
	);

	// Load helpers.
	require_once trailingslashit( get_template_directory() ) . 'includes/helpers.php';

	// Load customize sanitize.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/sanitize.php';

	// Load customize callback.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/callback.php';

	// Load customize option.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/option.php';

	// Load slider customize option.
	require_once trailingslashit( get_template_directory() ) . 'includes/customizer/slider.php';

	// Modify default customizer options.
	$wp_customize->get_control( 'background_color' )->description = esc_html__( 'Note: Background Color is applicable only if no image is set as Background Image.', 'corporate-club' );
}

add_action( 'customize_register', 'corporate_club_customize_register' );

/**
 * Register Customizer partials.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_club_customizer_partials( WP_Customize_Manager $wp_customize ) {

	// Bail if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
		return;
	}

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Register partial for blogname.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'corporate_club_customize_partial_blogname',
	) );

	// Register partial for blogdescription.
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'corporate_club_customize_partial_blogdescription',
	) );

}

add_action( 'customize_register', 'corporate_club_customizer_partials', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function corporate_club_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function corporate_club_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Register customizer controls scripts.
 *
 * @since 1.0.0
 */
function corporate_club_customize_controls_register_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'corporate-club-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css', array(), '2.0.3' );
	wp_enqueue_script( 'corporate-club-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'jquery', 'customize-controls' ), '2.0.3', true );
}

add_action( 'customize_controls_enqueue_scripts', 'corporate_club_customize_controls_register_scripts', 0 );
