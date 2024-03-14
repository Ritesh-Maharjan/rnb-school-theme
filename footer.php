<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RNB_School_Theme
 */

?>

<footer id="colophon" class="site-footer">

	<div class="photo-container">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/iconmonstr-school-16-240.png" alt="Image 1">
	</div>
	<div class="site-info">
		<h2>Credits</h2>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Created by: %1$s %2$s.'), '', '<a href="http://riteshmaharjan.com/school">Ritesh, Nikko, Baagi</a>');
		?>
		<p>
			Photo Courtesy of <a href="https://www.shopify.com/stock-photos" target="_blank">Burst.</a>
		</p>
	</div><!-- .site-info -->

	<nav class="footer-nav">
		<h2>Links</h2>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-2',
				'menu_id' => 'secondary-menu',
			)
		);
		?>
	</nav>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>