<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Corporate_Club
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Hook - corporate_club_single_image.
	 *
	 * @hooked corporate_club_add_image_in_single_display - 10
	 */
	do_action( 'corporate_club_single_image' );
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php corporate_club_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-club' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php corporate_club_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

