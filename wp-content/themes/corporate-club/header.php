<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Club
 */

?><?php
	/**
	 * Hook - corporate_club_action_doctype.
	 *
	 * @hooked corporate_club_doctype - 10
	 */
	do_action( 'corporate_club_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - corporate_club_action_head.
	 *
	 * @hooked corporate_club_head - 10
	 */
	do_action( 'corporate_club_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php
	/**
	 * Hook - corporate_club_action_before.
	 *
	 * @hooked corporate_club_page_start - 10
	 * @hooked corporate_club_skip_to_content - 15
	 */
	do_action( 'corporate_club_action_before' );
	?>

	<?php
	  /**
	   * Hook - corporate_club_action_before_header.
	   *
	   * @hooked corporate_club_header_start - 10
	   */
	  do_action( 'corporate_club_action_before_header' );
	?>
		<?php
		/**
		 * Hook - corporate_club_action_header.
		 *
		 * @hooked corporate_club_site_branding - 10
		 */
		do_action( 'corporate_club_action_header' );
		?>
	<?php
	  /**
	   * Hook - corporate_club_action_after_header.
	   *
	   * @hooked corporate_club_header_end - 10
	   */
	  do_action( 'corporate_club_action_after_header' );
	?>

	<?php
	/**
	 * Hook - corporate_club_action_before_content.
	 *
	 * @hooked corporate_club_content_start - 10
	 */
	do_action( 'corporate_club_action_before_content' );
	?>
	<?php
	  /**
	   * Hook - corporate_club_action_content.
	   */
	  do_action( 'corporate_club_action_content' );
