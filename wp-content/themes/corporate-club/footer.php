<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Club
 */

	/**
	 * Hook - corporate_club_action_after_content.
	 *
	 * @hooked corporate_club_content_end - 10
	 */
	do_action( 'corporate_club_action_after_content' );
?>

	<?php
	/**
	 * Hook - corporate_club_action_before_footer.
	 *
	 * @hooked corporate_club_add_footer_widgets - 5
	 * @hooked corporate_club_footer_start - 10
	 */
	do_action( 'corporate_club_action_before_footer' );
	?>
	<?php
	  /**
	   * Hook - corporate_club_action_footer.
	   *
	   * @hooked corporate_club_footer_copyright - 10
	   */
	  do_action( 'corporate_club_action_footer' );
	?>
	<?php
	/**
	 * Hook - corporate_club_action_after_footer.
	 *
	 * @hooked corporate_club_footer_end - 10
	 */
	do_action( 'corporate_club_action_after_footer' );
	?>

<?php
	/**
	 * Hook - corporate_club_action_after.
	 *
	 * @hooked corporate_club_page_end - 10
	 * @hooked corporate_club_footer_goto_top - 20
	 */
	do_action( 'corporate_club_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
