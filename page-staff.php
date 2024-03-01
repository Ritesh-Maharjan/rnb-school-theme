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
		
    
		<?php
			$terms = get_terms( 
				array(
					'taxonomy' => 'rnb-staff',
				) 
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
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
					$query = new WP_Query($args);
					echo '<section class=""><h2>' . esc_html__($term->name, 'rnb') . '</h2>';
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
									echo the_field('staff');
								}
                                if (get_field('courses')) {
									echo the_field('courses');
								}
                                $link = get_field('link');
                                if( $link ): ?>
                                    <a class="button" href="<?php echo esc_url( $link ); ?>">Instructor Website</a>
                                <?php endif; 
							}
							?>
                            
						</article>
						<?php
					}
					wp_reset_postdata();
					// Add your WP_Query() code here
					// Use $term->slug in your tax_query
					// Use $term->name to organize the posts
				}
			}
			
		?>	

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
