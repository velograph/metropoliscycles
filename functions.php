<?php
/**
 * Metropolis Cycles functions and definitions
 *
 * @package Metropolis Cycles
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'metropoliscycles_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function metropoliscycles_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Metropolis Cycles, use a find and replace
	 * to change 'Metropolis Cycles' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'metropoliscycles', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'metropoliscycles' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // metropoliscycles_setup
add_action( 'after_setup_theme', 'metropoliscycles_setup' );

// Register Custom Post Type
function bike_types() {

	$labels = array(
		'name'                  => __( 'Bikes', 'Post Type General Name', 'metropoliscycles' ),
		'singular_name'         => __( 'Bike', 'Post Type Singular Name', 'metropoliscycles' ),
		'menu_name'             => __( 'Bikes', 'metropoliscycles' ),
		'name_admin_bar'        => __( 'Bike', 'metropoliscycles' ),
		'archives'              => __( 'Bike Archives', 'metropoliscycles' ),
		'parent_item_colon'     => __( 'Parent Bike:', 'metropoliscycles' ),
		'all_items'             => __( 'All Bikes', 'metropoliscycles' ),
		'add_new_item'          => __( 'Add New Bike', 'metropoliscycles' ),
		'add_new'               => __( 'Add New', 'metropoliscycles' ),
		'new_item'              => __( 'New Bike', 'metropoliscycles' ),
		'edit_item'             => __( 'Edit Bike', 'metropoliscycles' ),
		'update_item'           => __( 'Update Bike', 'metropoliscycles' ),
		'view_item'             => __( 'View Bike', 'metropoliscycles' ),
		'search_items'          => __( 'Search Bikes', 'metropoliscycles' ),
		'not_found'             => __( 'Not found', 'metropoliscycles' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'metropoliscycles' ),
		'featured_image'        => __( 'Featured Image', 'metropoliscycles' ),
		'set_featured_image'    => __( 'Set featured image', 'metropoliscycles' ),
		'remove_featured_image' => __( 'Remove featured image', 'metropoliscycles' ),
		'use_featured_image'    => __( 'Use as featured image', 'metropoliscycles' ),
		'insert_into_item'      => __( 'Insert into item', 'metropoliscycles' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'metropoliscycles' ),
		'items_list'            => __( 'Items list', 'metropoliscycles' ),
		'items_list_navigation' => __( 'Items list navigation', 'metropoliscycles' ),
		'filter_items_list'     => __( 'Filter items list', 'metropoliscycles' ),
	);
	$args = array(
		'label'                 => __( 'Bike', 'metropoliscycles' ),
		'description'           => __( 'Bike Models', 'metropoliscycles' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'bike', $args );

}
add_action( 'init', 'bike_types', 0 );

// Register Custom Taxonomy
function bike_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Bike Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Bike Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Bike Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'bike_cats', array( 'bike' ), $args );

}
add_action( 'init', 'bike_taxonomies', 0 );
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function metropoliscycles_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'metropoliscycles' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'metropoliscycles_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function metropoliscycles_scripts() {
	wp_enqueue_style( 'metropoliscycles-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

    wp_enqueue_script('jquery');

	wp_enqueue_script( 'metropoliscycles-site-scripts', get_template_directory_uri() . '/js/site-scripts.js' );

	wp_enqueue_script( 'metropoliscycles-pictureFill', get_template_directory_uri() . '/js/picturefill.js' );

	wp_enqueue_script( 'metropoliscycles-matchHeight', get_template_directory_uri() . '/js/matchHeight.min.js' );

	wp_enqueue_script( 'metropoliscycles-slick', get_template_directory_uri() . '/js/slick.min.js' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'metropoliscycles_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

add_image_size( 'portal-mobile', '480', '360', 'true' );
add_image_size( 'portal-tablet', '768', '576', 'true' );
add_image_size( 'portal-desktop', '1280', '960', 'true' );
add_image_size( 'portal-retina', '2400', '1800', 'true' );

/**
 * TypeKit Fonts
 */
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/get0vmc.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );
