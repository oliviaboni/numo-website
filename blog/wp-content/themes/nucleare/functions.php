<?php
/**
 * nucleare functions and definitions
 *
 * @package nucleare
 */

if ( ! function_exists( 'nucleare_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nucleare_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 809; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nucleare, use a find and replace
	 * to change 'nucleare' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nucleare', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nucleare-normal-post' , 809, 9999);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nucleare' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		 'video', 'audio', 'quote', 'link', 'gallery'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nucleare_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );
}
endif; // nucleare_setup
add_action( 'after_setup_theme', 'nucleare_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nucleare_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nucleare' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title"><h2><span>',
		'after_title'   => '</span></h2></div>',
	) );
}
add_action( 'widgets_init', 'nucleare_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nucleare_scripts() {
	wp_enqueue_style( 'nucleare-style', get_stylesheet_uri() );
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'nucleare-googlefonts-heading', $protocol .'://fonts.googleapis.com/css?family=Playfair+Display:400');
	wp_enqueue_style( 'nucleare-googlefonts-text', $protocol .'://fonts.googleapis.com/css?family=Archivo+Narrow:400,700');
	wp_enqueue_style( 'nucleare-fontAwesome', get_template_directory_uri() .'/css/font-awesome.min.css');

	wp_enqueue_script( 'nucleare-custom', get_template_directory_uri() . '/js/jquery.nucleare.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'nucleare-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'nucleare-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nucleare_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Nucleare Dynamic.
 */
require get_template_directory() . '/inc/nucleare-dynamic.php';

/**
* Load the Theme Options Page for social media icons
*/
require get_template_directory() . '/inc/theme-options.php';
