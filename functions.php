<?php
/**
 * RNB School Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RNB_School_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rnb_school_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RNB School Theme, use a find and replace
	 * to change 'rnb-school-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('rnb-school-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'rnb-school-theme'),
			'menu-2' => esc_html__('Secondary', 'rnb-school-theme'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rnb_school_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'rnb_school_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rnb_school_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('rnb_school_theme_content_width', 640);
}
add_action('after_setup_theme', 'rnb_school_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rnb_school_theme_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'rnb-school-theme'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'rnb-school-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'rnb_school_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function rnb_school_theme_scripts()
{
	wp_enqueue_style('rnb-school-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('rnb-school-theme-style', 'rtl', 'replace');

	wp_enqueue_script('rnb-school-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if ( ( is_single() && get_post_type() === 'post' ) || ( is_home() && !is_front_page() ) ) {
	wp_enqueue_style('rnb-aos-style', get_template_directory_uri() . '/css/aos.css', array(), '1.0.0');
	wp_enqueue_script('rnb-aos-script', get_template_directory_uri() . '/js/aos.js', array(), '1.0.0', array('strategy'  => 'defer'));
	wp_enqueue_script('rnb-script', get_template_directory_uri() . '/js/script.js', array('rnb-aos-script'), '1.0.0',array('strategy'  => 'defer'));
	}
	
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' );
}
add_action('wp_enqueue_scripts', 'rnb_school_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/cpt-taxonomy.php';


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Function to change the placeholder text for a specific custom post type
function custom_post_type_title_placeholder($title_placeholder, $post) {
    if ($post->post_type == 'rnb-staff') {
        $title_placeholder = 'Add staff name';
    }
    if ($post->post_type == 'rnb-students') {
        $title_placeholder = 'Add student name';
    }
    return $title_placeholder;
}

add_filter('enter_title_here', 'custom_post_type_title_placeholder', 10, 2);

function rnb_excerpt_length( $length ) {
	 // Check if it's the specific page where you want custom settings
	 if ( !is_home() ) {
        return 20; // Custom excerpt length for the specific page
    } else {
        return 55; // Default excerpt length for other pages
    }
	
}

add_filter('excerpt_length', 'rnb_excerpt_length', 999 );

function rnb_excerpt_more($more) {
	if ( !is_home() ) {
        return '<br> <a href="' . esc_url( get_permalink() ) . '">Read more about the student...</a>'; // Custom "Continue Reading" link
    } else {
        return '[...]'; // Default "Continue Reading" link for other pages
    }
}
add_filter( 'excerpt_more', 'rnb_excerpt_more' );

function my_theme_setup() {
    add_theme_support( 'align-wide' ); // Add support for wide alignment
    add_theme_support( 'alignfull' ); // Add support for full alignment
}
add_action( 'after_setup_theme', 'my_theme_setup' );


function rnb_image_sizes() {
	add_image_size('student-medium', 200, 300, true);

}

add_action('after_setup_theme', 'rnb_image_sizes');