<?php
/**
 * Functions hooked to custom hook.
 *
 * @package Corporate_Club
 */

if ( ! function_exists( 'corporate_club_skip_to_content' ) ) :

	/**
	 * Add skip to content.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_skip_to_content() {
		?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corporate-club' ); ?></a><?php
	}
endif;

add_action( 'corporate_club_action_before', 'corporate_club_skip_to_content', 15 );

if ( ! function_exists( 'corporate_club_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_site_branding() {
		?>
		<div class="site-branding">

			<?php corporate_club_the_custom_logo(); ?>

			<?php $show_title = corporate_club_get_option( 'show_title' ); ?>
			<?php $show_tagline = corporate_club_get_option( 'show_tagline' ); ?>

			<?php if ( true === $show_title || true === $show_tagline ) : ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( true === $show_tagline ) : ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="right-head">

			<?php if ( corporate_club_woocommerce_status() ) : ?>
				<?php $show_cart_in_header = corporate_club_get_option( 'show_cart_in_header' ); ?>
				<?php if ( true === $show_cart_in_header ) : ?>
					<div class="cart-section">
						<div class="shopping-cart-views">
							<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-contents">
								<i class="fas fa-shopping-bag" aria-hidden="true"></i>
								<span class="cart-value"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
							</a>
						</div><!-- .shopping-cart-views -->
					</div><!-- .cart-section -->
				<?php endif; ?>
			<?php endif; ?>

			<?php $show_search_in_header = corporate_club_get_option( 'show_search_in_header' ); ?>
			<?php if ( true === $show_search_in_header ) : ?>
				<div class="header-search-box">
					<a href="#" class="search-icon"><i class="fas fa-search"></i></a>
					<div class="search-box-wrap">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .header-search-box -->
			<?php endif; ?>

		</div><!-- .right-head -->

		<div id="main-nav" class="clear-fix">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="wrap-menu-content">
					<?php
					wp_nav_menu(
						array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'corporate_club_primary_navigation_fallback',
						)
					);
					?>
				</div><!-- .wrap-menu-content -->
			</nav><!-- #site-navigation -->
		</div><!-- #main-nav -->

	<?php
	}

endif;

add_action( 'corporate_club_action_header', 'corporate_club_site_branding' );

if ( ! function_exists( 'corporate_club_mobile_navigation' ) ) :

	/**
	 * Mobile navigation.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_mobile_navigation() {
		?>
		<div class="mobile-nav-wrap">
			<a id="mobile-trigger" href="#mob-menu"><i class="fas fa-list-ul" aria-hidden="true"></i></a>
			<div id="mob-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => '',
					'fallback_cb'    => 'corporate_club_primary_navigation_fallback',
				) );
				?>
			</div><!-- #mob-menu -->
			<?php if ( has_nav_menu( 'top' ) ) : ?>
				<a id="mobile-trigger-quick" href="#mob-menu-quick"><i class="fas fa-list-ul" aria-hidden="true"></i></a>
				<div id="mob-menu-quick">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'top',
						'container'      => '',
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
					?>
				</div><!-- #mob-menu-quick -->
			<?php endif; ?>
		</div><!-- .mobile-nav-wrap -->
		<?php
	}

endif;

add_action( 'corporate_club_action_before', 'corporate_club_mobile_navigation', 20 );

if ( ! function_exists( 'corporate_club_add_top_head_content' ) ) :

	/**
	 * Add top head section.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_top_head_content() {
		// Check if top head content is disabled.
		$status = apply_filters( 'corporate_club_filter_top_head_status', false, 1 );

		if ( true !== $status ) {
			return;
		}
		?>
		<div id="tophead">
			<div class="container">
				<?php if ( has_nav_menu( 'top' ) ) : ?>
					<div class="quick-menu">
						<a href="#" class="quick-menu-icon">
							<?php
							$quick_links_text = corporate_club_get_option( 'quick_links_text' );
							if ( ! empty( $quick_links_text ) ) {
								echo '<span>' . esc_html( $quick_links_text ) . '</span>';
							}
							?>
							<i class="fas fa-bars"></i>
						</a>
						<nav id="header-nav" class="menu-top-menu-container">
							<?php
								wp_nav_menu(
									array(
									'theme_location' => 'top',
									'menu_class'     => 'menu',
									'depth'          => 1,
									'fallback_cb'    => false,
									)
								);
							?>
						</nav>
					</div><!-- .quick-menu -->
				<?php endif; ?>

				<?php corporate_club_render_quick_contact(); ?>

				<?php if ( true === corporate_club_get_option( 'show_social_in_header' ) && has_nav_menu( 'social' ) ) : ?>
					<div id="header-social">
						<?php the_widget( 'Corporate_Club_Social_Widget' ); ?>
					</div><!-- .header-social -->
				<?php endif; ?>
			</div><!-- .container -->
		</div><!-- #tophead -->
		<?php
	}

endif;

add_action( 'corporate_club_action_before_header', 'corporate_club_add_top_head_content', 5 );

if ( ! function_exists( 'corporate_club_check_top_head_status' ) ) :

	/**
	 * Top head status.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $status Active status.
	 * @param int  $layout Header layout.
	 * @return bool Modified status.
	 */
	function corporate_club_check_top_head_status( $status, $layout ) {

		$top_menu_status = ( has_nav_menu( 'top' ) ) ? true : false;
		$social_status = ( ! ( false === has_nav_menu( 'social' ) || false === corporate_club_get_option( 'show_social_in_header' ) ) ) ? true : false;

		$contact_number  = corporate_club_get_option( 'contact_number' );
		$contact_email   = corporate_club_get_option( 'contact_email' );
		$contact_address = corporate_club_get_option( 'contact_address' );

		$address_status = ( ! empty( $contact_number ) || ! empty( $contact_email ) || ! empty( $contact_address ) ) ? true : false;

		if ( 1 === $layout ) {
			if ( true === $top_menu_status || true === $social_status || true === $address_status ) {
				$status = true;
			}
		}

		return $status;

	}

endif;

add_filter( 'corporate_club_filter_top_head_status', 'corporate_club_check_top_head_status', 10, 2 );

if ( ! function_exists( 'corporate_club_footer_copyright' ) ) :

	/**
	 * Footer copyright.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'corporate_club_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = corporate_club_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'corporate_club_filter_copyright_text', $copyright_text );
	?>

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<?php
		$footer_menu_content = wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footer-navigation',
			'depth'          => 1,
			'fallback_cb'    => false,
		) );
		?>
	<?php endif; ?>
	<?php if ( ! empty( $copyright_text ) ) : ?>
		<div class="copyright">
			<?php echo wp_kses_post( $copyright_text ); ?>
		</div>
	<?php endif; ?>
	<div class="site-info">
		<?php echo esc_html__( 'Corporate Club by', 'corporate-club' ) . ' <a target="_blank" rel="nofollow" href="https://axlethemes.com/">Axle Themes</a>'; ?>
	</div><!-- .site-info -->
	<?php
	}

endif;

add_action( 'corporate_club_action_footer', 'corporate_club_footer_copyright', 10 );

if ( ! function_exists( 'corporate_club_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_sidebar() {

		global $post;

		$global_layout = corporate_club_get_option( 'global_layout' );
		$global_layout = apply_filters( 'corporate_club_filter_theme_global_layout', $global_layout );

		// Check if single template.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'corporate_club_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}

	}

endif;

add_action( 'corporate_club_action_sidebar', 'corporate_club_add_sidebar' );

if ( ! function_exists( 'corporate_club_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_custom_posts_navigation() {

		the_posts_pagination();

	}

endif;

add_action( 'corporate_club_action_posts_navigation', 'corporate_club_custom_posts_navigation' );

if ( ! function_exists( 'corporate_club_add_image_in_single_display' ) ) :

	/**
	 * Add image in single template.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_image_in_single_display() {

		if ( has_post_thumbnail() ) {
			$args = array(
				'class' => 'corporate-club-post-thumb aligncenter',
			);
			the_post_thumbnail( 'large', $args );
		}

	}

endif;

add_action( 'corporate_club_single_image', 'corporate_club_add_image_in_single_display' );

if ( ! function_exists( 'corporate_club_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_footer_goto_top() {
		$go_to_top_status = corporate_club_get_option( 'go_to_top_status' );
		if ( true === $go_to_top_status ) {
			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fas fa-angle-up"></i></a>';
		}
	}

endif;

add_action( 'corporate_club_action_after', 'corporate_club_footer_goto_top', 20 );

if ( ! function_exists( 'corporate_club_add_front_page_widget_area' ) ) :

	/**
	 * Add front page widget area.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_front_page_widget_area() {

		if ( is_page_template( 'templates/front.php' ) ) {
			if ( is_active_sidebar( 'sidebar-front-page-widget-area' ) ) {
				echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
				dynamic_sidebar( 'sidebar-front-page-widget-area' );
				echo '</div><!-- #sidebar-front-page-widget-area -->';
			} else {
				if ( current_user_can( 'edit_theme_options' ) ) {
					echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
					corporate_club_message_front_page_widget_area();
					echo '</div><!-- #sidebar-front-page-widget-area -->';
				}
			}
		}

	}
endif;

add_action( 'corporate_club_action_before_content', 'corporate_club_add_front_page_widget_area', 7 );

if ( ! function_exists( 'corporate_club_add_footer_widgets' ) ) :

	/**
	 * Add footer widgets.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_footer_widgets() {

		get_template_part( 'template-parts/footer-widgets' );

	}
endif;

add_action( 'corporate_club_action_before_footer', 'corporate_club_add_footer_widgets', 5 );

if ( ! function_exists( 'corporate_club_add_custom_header' ) ) :

	/**
	 * Add custom header.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_custom_header() {

		if ( is_front_page() || is_home() || is_page_template( 'templates/front.php' ) || is_page_template('elementor_header_footer')  ) {
			return;
		}

		$image = get_header_image();
		$extra_style = '';
		if ( ! empty( $image ) ) {
			$extra_style .= 'style="background-image:url(\'' . esc_url( $image ) . '\');"';
		}
		?>
		<div id="custom-header" <?php echo $extra_style; ?>>
			<div class="custom-header-wrapper">
				<div class="container">
					<?php do_action( 'corporate_club_action_custom_header_title' ); ?>
					<?php do_action( 'corporate_club_add_breadcrumb' ); ?>
				</div><!-- .container -->
			</div><!-- .custom-header-content -->
		</div><!-- #custom-header -->
		<?php
	}

endif;

add_action( 'corporate_club_action_before_content', 'corporate_club_add_custom_header', 6 );

if ( ! function_exists( 'corporate_club_add_title_in_custom_header' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_title_in_custom_header() {

		echo '<h1 class="page-title">';

		if ( is_home() ) {
			echo esc_html( corporate_club_get_option( 'blog_page_title' ) );
		} elseif ( is_singular() ) {
			echo single_post_title( '', false );
		} elseif ( is_archive() ) {
			the_archive_title();
		} elseif ( is_search() ) {
			printf( esc_html__( 'Search Results for: %s', 'corporate-club' ),  get_search_query() );
		} elseif ( is_404() ) {
			esc_html_e( '404 Error', 'corporate-club' );
		}

		echo '</h1>';

	}

endif;

add_action( 'corporate_club_action_custom_header_title', 'corporate_club_add_title_in_custom_header' );

if ( ! function_exists( 'corporate_club_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function corporate_club_add_breadcrumb() {

		// Bail if home page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo'<div id="breadcrumb">';
		corporate_club_breadcrumb();
		echo '</div>';

	}

endif;

add_action( 'corporate_club_add_breadcrumb', 'corporate_club_add_breadcrumb', 10 );

//=============================================================
// Body open hook
//=============================================================
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Body open hook.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}