<?php
/**
 * Plugin recommendation.
 *
 * @package Corporate_Club
 */

// Load TGM library.
require_once trailingslashit( get_template_directory() ) . 'vendors/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'corporate_club_register_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_register_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Contact Form 7', 'corporate-club' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce (For e-commerce)', 'corporate-club' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'corporate-club' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		$config = array();

		tgmpa( $plugins, $config );

	}

endif;

add_action( 'tgmpa_register', 'corporate_club_register_recommended_plugins' );
