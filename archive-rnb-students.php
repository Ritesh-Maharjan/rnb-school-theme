<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RNB_School_Theme
 */

get_header();
?>

<main id="primary" class="site-main-students">

    <?php if (have_posts()): ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php post_type_archive_title(); ?>
            </h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header><!-- .page-header -->

        <?php
        $args = array(
            'post_type' => 'rnb-students', 
            'posts_per_page' => -1, 
            'orderby' => 'title', 
            'order' => 'ASC', 
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();

                ?>

                <?php
                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
                get_template_part('template-parts/content-student-page', get_post_type());
            endwhile;

        endif;

        the_posts_navigation();

    else:
        get_template_part('template-parts/content', 'none');
    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();