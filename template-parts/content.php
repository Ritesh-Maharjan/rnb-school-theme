<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RNB_School_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()):
			the_title('<h1 class="entry-title">', '</h1>');
		else:
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()):
			?>
			<div class="entry-meta">
				<?php
				rnb_school_theme_posted_on();
				rnb_school_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php rnb_school_theme_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		// if its a single post then show every content
		if (is_single()) {
			the_content();
		} else {
			the_excerpt();
		}
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'rnb-school-theme'),
				'after' => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php rnb_school_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->