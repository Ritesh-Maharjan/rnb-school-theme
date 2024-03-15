<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>
<main id="primary" class="site-main">


	<h2>
		<?php the_title() ?>
	</h2>

	<?php


	get_template_part('template-parts/content', 'page');


	$terms = get_terms(
		array(
			'taxonomy' => 'rnb-staff',
			'hide_empty' => false,
		)
	);
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$args = array(
				'post_type' => 'rnb-staff',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'rnb-staff',
						'field' => 'slug',
						'terms' => $term
					),
				),
			);

			?>
			<section class="staff-container">
				<?php
				$query = new WP_Query($args);
				echo '<h2>' . esc_html__($term->name, 'rnb') . '</h2>';


				// creating our services
				while ($query->have_posts()) {
					$query->the_post();
					?>

					<article id="<?php echo get_the_ID(); ?>">
						<h2>
							<?php the_title(); ?>
						</h2>
						<?php
						// ACF form validation
						if (function_exists('get_field')) {
							if (get_field('staff')) {
								?>
								<p>
									<?php the_field('staff') ?>
								</p>
								<?php
							}
							if (get_field('courses')) {
								?>
								<span>
									<?php the_field('courses') ?>
								</span>
								<br />
								<?php
							}

							$link = get_field('url');
							if ($link): ?>
								<a class="button" href="<?php echo esc_url($link); ?>">Instructor Website</a>
							<?php endif;
						}
						?>

					</article>
					<?php
				}
				wp_reset_postdata();
				?>

			</section>
			<?php

			// Add your WP_Query() code here
			// Use $term->slug in your tax_query
			// Use $term->name to organize the posts
		}
	}

	?>

</main><!-- #primary -->

<?php
get_footer();
