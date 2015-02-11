<?php
/**
 * lycans functions and definitions
 *
 * @package lycans
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'lycans_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lycans_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lycans, use a find and replace
	 * to change 'lycans' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lycans', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lycans' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	add_image_size("squarethumbs", 300, 300, 1);
	//
	////
	///
	///
	add_image_size("sliderimage", 800, 400, 1);
	//



	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lycans_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // lycans_setup
add_action( 'after_setup_theme', 'lycans_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function lycans_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'lycans' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'lycans_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lycans_scripts() {
	wp_enqueue_style( 'lycans-bstyle', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
	wp_enqueue_style('responsive-slide', get_template_directory_uri().'/slider/responsiveslides.css');
	wp_enqueue_style('responsive-slide-app', get_template_directory_uri().'/slider/apps.css');
	
	wp_enqueue_style( 'lycans-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lycans-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lycans-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'lycans-responsivejs', get_template_directory_uri() . '/slider/responsiveslides.min.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'lycans-responsiveappjs', get_template_directory_uri() . '/slider/apps.js', array('lycans-responsivejs'), '20130115', true );

	
}
add_action( 'wp_enqueue_scripts', 'lycans_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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


/// load shortcode
require get_template_directory() . '/function/shortcode.php';

/// custom meta box
/// 
if(!class_exists("CMB2")) {
    require get_template_directory() . '/libs/cmb2/init.php';
    require get_template_directory() . '/libs/metaboxes.php';

}

// for shortcode 
add_action("admin_enqueue_scripts","admin_scripts");
function admin_scripts($hook){
    if($hook=="post.php")
    wp_enqueue_script(
        "adminjs",
        get_template_directory_uri()."/js/sidebar.js",
        array("jquery","quicktags"),
        null,
        1);
}


/*
// Register Custom Post Type
function cpt_books() {

	$labels = array(
		'name'                => _x( 'Books', 'Post Type General Name', 'lycans' ),
		'singular_name'       => _x( 'Book', 'Post Type Singular Name', 'lycans' ),
		'menu_name'           => __( 'Books', 'lycans' ),
		'parent_item_colon'   => __( 'Parent Book:', 'lycans' ),
		'all_items'           => __( 'All Books', 'lycans' ),
		'view_item'           => __( 'View Book', 'lycans' ),
		'add_new_item'        => __( 'Add New Book', 'lycans' ),
		'add_new'             => __( 'Add New', 'lycans' ),
		'edit_item'           => __( 'Edit Book', 'lycans' ),
		'update_item'         => __( 'Update Book', 'lycans' ),
		'search_items'        => __( 'Search Book', 'lycans' ),
		'not_found'           => __( 'Not found', 'lycans' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'lycans' ),
	);
	$args = array(
		'label'               => __( 'books', 'lycans' ),
		'description'         => __( 'Books Show', 'lycans' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'			  => get_template_directory_uri(). "/img/books.png",	
	);
	register_post_type( 'books', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cpt_books', 0 );


function add_column($defaults){
	$newc = array(
		'cb' => 'cb',
		'id' => 'ID',
		'title' => 'Title',
		'slug' => 'Slug'
		);

	return $newc;
}

function add_column_content($cmn, $pst){
	if('slug' == $cmn){
		echo basename(get_permalink());
	}elseif('id' == $cmn){
		echo get_the_ID();
	}
}

add_filter("manage_books_posts_columns", "add_column", 10);
add_filter("manage_books_posts_custom_column", "add_column_content", 10, 2);


function getAllPost(){
	$data = array();
	$postarr = get_posts(array('posts_per_page' => -1));
	foreach ($postarr as $post ) : 
	$data[$post->ID] = $post->post_title;
	endforeach;
	return $data;
}

*/
