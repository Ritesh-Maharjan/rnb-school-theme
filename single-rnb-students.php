<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RNB_School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()):
		the_post();

		get_template_part('template-parts/content-student-single', get_post_type());

		// Get the post ID
		$post_id = get_the_ID();
		// taxonomy name
		$taxonomy = "students-specialty";

		// Get the terms of the specified taxonomy for the current post
		$terms = get_the_terms($post_id, $taxonomy);

		// if there is taxonmoy terms and we dont get any error
		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				
				$args = array(
					'post_type' => 'rnb-students',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'students-specialty',
							'field' => 'slug',
							'terms' => $term
						),
					),
				);
				$query = new WP_Query($args);

				$total_posts = $query->found_posts;
				echo '<h3>Meet other ' . esc_html__($term->name, 'rnb') . ' students:</h3>';
				// creating our services
				while ($query->have_posts()) {
					$query->the_post();
					?>
					<p> <a href="<?php the_permalink(); ?> "> <?php the_title() ?> </a> </p>
					<?php
				}
				wp_reset_postdata();
				// Add your WP_Query() code here
				// Use $term->slug in your tax_query
				// Use $term->name to organize the posts
			}
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()):
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();