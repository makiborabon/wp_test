<?php
/**
 * Core functions.
 *
 * @package Corporate_Club
 */

if ( ! function_exists( 'corporate_club_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function corporate_club_get_option( $key ) {

		$corporate_club_default_options = corporate_club_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $corporate_club_default_options[ $key ] ) ) ? $corporate_club_default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $corporate_club_default_options );
		$theme_options = array_merge( $corporate_club_default_options, $theme_options );
		$value = '';

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;

if ( ! function_exists( 'corporate_club_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function corporate_club_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = true;
		$defaults['contact_number']        = '';
		$defaults['contact_email']         = '';
		$defaults['contact_address']       = '';
		$defaults['show_social_in_header'] = false;
		$defaults['show_search_in_header'] = true;
		$defaults['quick_links_text']      = esc_html__( 'Quick Links', 'corporate-club' );
		$defaults['show_cart_in_header']   = true;

		// Layout.
		$defaults['global_layout']  = 'right-sidebar';
		$defaults['archive_layout'] = 'excerpt';

		// Footer.
		$defaults['copyright_text']   = esc_html__( 'Copyright &copy; All rights reserved.', 'corporate-club' );
		$defaults['go_to_top_status'] = true;

		// Blog.
		$defaults['excerpt_length']     = 40;
		$defaults['read_more_text']     = esc_html__( 'Read More', 'corporate-club' );
		$defaults['exclude_categories'] = '';

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'enabled';

		// Slider Options.
		$defaults['featured_slider_status']              = 'disabled';
		$defaults['featured_slider_transition_effect']   = 'fadeout';
		$defaults['featured_slider_transition_delay']    = 3;
		$defaults['featured_slider_transition_duration'] = 1;
		$defaults['featured_slider_enable_caption']      = true;
		$defaults['featured_slider_enable_arrow']        = true;
		$defaults['featured_slider_enable_pager']        = true;
		$defaults['featured_slider_enable_autoplay']     = true;
		$defaults['featured_slider_enable_overlay']      = true;
		$defaults['featured_slider_type']                = 'featured-page';
		$defaults['featured_slider_number']              = 3;
		$defaults['featured_slider_read_more_text']      = esc_html__( 'Read More', 'corporate-club' );

		return apply_filters( 'corporate_club_filter_default_theme_options', $defaults );
	}

endif;
