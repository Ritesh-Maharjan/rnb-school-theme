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


	<article id="<?php echo get_the_ID(); ?>">
		<h2>
			<?php the_title(); ?>
		</h2>
		<?php
		// ACF form validation
		if (function_exists('get_field')) {
			if (get_field('schedule')) {
				$schedule_items = get_field('schedule');
				?>

				<table>
					<tr>
						<th>Date</th>
						<th>Course</th>
						<th>instructor</th>
					</tr>

					<?php
					foreach ($schedule_items as $schedule_item) {
						// Access individual fields within each repeater row
						$date = $schedule_item['date'];
						$course = $schedule_item['course'];
						$instructor = $schedule_item['instructor'];
						?>
						<tr>
							<td>
								<?php echo $date ?>
							</td>
							<td>
								<?php echo $course ?>
							</td>
							<td>
								<?php echo $instructor ?>
							</td>
						</tr>
						<?php
					}
					?>
				</table>
				<?php

			}
		}
		?>

	</article>

</main><!-- #primary -->

<?php
get_footer();
