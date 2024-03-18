<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RNB_School_Theme
 */

?>

<article id="students" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>


    <?php the_post_thumbnail(); ?>
    <div class="entry-content">
        <?php



        the_excerpt();

        $terms = get_the_terms( get_the_ID(), 'students-specialty' );



        if ( $terms && ! is_wp_error( $terms ) ) {
        foreach ( $terms as $term ) {
        echo 'Speciality: <a href="' . get_term_link( $term ) . '">' . $term->name . '</a>';
        }

        }

        wp_link_pages(
        array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rnb-school-theme' ),
            'after' => '</div>',
        )
        );
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rnb-school-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->