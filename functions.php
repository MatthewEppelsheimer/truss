<?php
/**
 * truss functions and definitions
 *
 * @todo refactor using Genesis' `require_once` pattern to allow child themes freedom to use the framework immediately.
 * @package truss
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'truss_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function truss_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on truss, use a find and replace
	 * to change 'truss' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'truss', get_template_directory() . '/library/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_action( 'init', 'truss_add_editor_style' );
	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses add_editor_style() Links a stylesheet to visual editor
	 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
	 */
	function truss_add_editor_style() {

	    add_editor_style( get_stylesheet_uri() );

	}

	if ( !function_exists('truss_register_nav_menus') ) :
		function truss_register_nav_menus() {

			register_nav_menu( 'primary-navigation', __( 'Primary Menu', 'truss' ) );

		}
		add_action( 'init', 'truss_register_nav_menus' );
	endif;

	// Enable support for Post Formats.
	// @todo
	/*
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery', 'chat', 'audio' ) );
	*/

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'truss_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // truss_setup
add_action( 'after_setup_theme', 'truss_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
if ( !function_exists('truss_widgets_init') ) :
	function truss_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'truss' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	add_action( 'widgets_init', 'truss_widgets_init' );
endif;

/**
 * Enqueue scripts and styles.
 */
if ( !function_exists('truss_scripts') ) :
	function truss_scripts() {
		if (!is_admin()) {
			wp_enqueue_script('jquery');
		}

		// Main Style
		wp_enqueue_style( 'main_style', get_stylesheet_uri() );

		// Dashicons
		wp_enqueue_style( 'dashicons', get_template_directory_uri() . '/library/assets/css/dashicons.css' );

		// Flexnav Scripts
		wp_register_script( 'flexnav', get_template_directory_uri() . '/library/assets/js/flexnav/jquery.flexnav.js', array(), '1.0.0', false );
		wp_enqueue_script( 'flexnav' );

		// Modernizr
		wp_register_script( 'modernizr', get_template_directory_uri() . '/library/assets/js/modernizr/modernizr-2.7.1.js', array(), '2.7.1', false );
		wp_enqueue_script( 'modernizr' );

		// Selectivizr Scripts
		wp_register_script( 'selectivizr', get_template_directory_uri() . '/library/assets/js/selectivizr/selectivizr.js', array(), '1.0.0', false );
		wp_enqueue_script( 'selectivizr' );

		// Hover Intent Scripts
		wp_register_script( 'hoverintent', get_template_directory_uri() . '/library/assets/js/hoverintent/hoverintent.js', array(), '1.0.0', false );
		wp_enqueue_script( 'hoverintent' );


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'truss_scripts' );
endif;

if ( !function_exists('truss_add_flexnav') ) :
	function truss_add_flexnav() { ?>
		<script>
			// Init Flexnav Menu
			jQuery(document).ready(function($){
				   $(".flexnav").flexNav({
				   	'animationSpeed' : 250, // default drop animation speed
					'transitionOpacity': true, // default opacity animation
					'buttonSelector': '.menu-button', // default menu button class
					'hoverIntent': true, // use with hoverIntent plugin
					'hoverIntentTimeout': 350, // hoverIntent default timeout
					'calcItemWidths': false // dynamically calcs top level nav item widths
				});
			});
		</script>
	<?php }
	add_action( 'wp_head', 'truss_add_flexnav' );
endif;

/**
 * Include Truss actions
 */
require_once( 'includes/truss-actions.php' );

/**
 * Include Truss components
 *
 * Truss isolates nearly every component of html output into
 * individual functions hooked to actions, so that child theme
 * developers can surgically modify the contents and order of
 * everything.
 */

require_once( 'includes/truss.php' );
// require_once( 'includes/truss-layout.php' );

require_once( 'includes/truss-components-head.php' );
require_once( 'includes/truss-components-header.php' );

require_once( 'includes/truss-components-main.php' );
require_once( 'includes/truss-components-loop.php' );

require_once( 'includes/truss-components-column-secondary.php' );
require_once( 'includes/truss-components-column-secondary-static.php' );

require_once( 'includes/truss-components-entry.php' );
require_once( 'includes/truss-components-entry-header.php' );
require_once( 'includes/truss-components-entry-header-meta.php' );
require_once( 'includes/truss-components-entry-footer.php' );

require_once( 'includes/truss-components-footer.php');
require_once( 'includes/truss-components-site-credits.php');

/**
 * Include Truss filter functions
 *
 * Pre-defined functions hooked to Truss filters.
 */
require_once( 'includes/truss-filters.php' );

/**
 * Including Theme Hook Alliance (https://github.com/zamoose/themehookalliance).
 */
include( 'library/vendors/tha-theme-hooks/tha-theme-hooks.php' );

/**
 * Themes and Plugins can check for tha_hooks using current_theme_supports( 'tha_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 * 		// Declare support for all hook types
 * 		add_theme_support( 'tha_hooks', array( 'all' ) );
 *
 * 		// Declare support for certain hook types only
 * 		add_theme_support( 'tha_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
// @todo Confirm we really are supporting 'all' of these in actual templaes!
add_theme_support( 'tha_hooks', array(

	/**
	 * As a Theme developer, use the 'all' parameter, to declare support for all
	 * hook types.
	 * Please make sure you then actually reference all the hooks in this file,
	 * Plugin developers depend on it!
	 */
	'all'

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
//	'core'
) );

/**
 * Including Kirki Advanced Theme Customizer (https://github.com/aristath/kirki).
 */
// @todo
/*
include_once( dirname( __FILE__ ) . '/library/vendors/kirki/kirki.php' );
*/

/**
 * WP Customizer
 */
require get_template_directory() . '/library/vendors/wp-customizer/customizer.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/library/vendors/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/vendors/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/vendors/extras.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/vendors/jetpack.php';

/**
 * Including TGM Plugin Activation
 *
 * If there is a `required-plugins.php` file in the child theme's root, load its dependencies, then load it.
 *
 * Child themers: to implement this, just include a `required-plugins.php` file in your child theme root.
 *
 */

if ( file_exists( get_stylesheet_directory() . '/required-plugins.php' ) ) {
	require_once( get_template_directory() . '/library/vendors/tgm-plugin-activation/class-tgm-plugin-activation.php' );
	require_once( get_stylesheet_directory() . '/required-plugins.php' );
	add_action( 'tgmpa_register', 'truss_child_register_required_plugins' );
}

/**
 * Custom Hooks and Filters
 */
if ( !function_exists('truss_add_breadcrumbs') ) :
	function truss_add_breadcrumbs() {
		if ( !is_front_page() ) {
			if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(); }
		}
	}
	add_action( 'tha_content_top', 'truss_add_breadcrumbs' );
endif;

if ( !function_exists('truss_optional_scripts') ) :
	function truss_optional_scripts() {
		// Font Awesome
		if( get_theme_mod( 'add_fontawesome_icons' ) == '') {

		 } else {
		 	echo '<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">';
		 }
		 // Genericons
		 if( get_theme_mod( 'truss_add_genericon_icons' ) == '') {

		 } else {
		 	echo '<link href=" '.get_template_directory_uri().'/library/assets/css/genericons.css" rel="stylesheet">';
		 }

		 // Link Color
		 if( get_theme_mod( 'truss_add_link_color' ) == '') {

		 } else { ?>
			<style type="text/css">
				a { color: <?php echo get_theme_mod( 'truss_add_link_color' ); ?>; }
			</style>
		<?php }


	}
	add_action( 'wp_head', 'truss_optional_scripts' );
endif;

if ( !function_exists('truss_mobile_styles') ) :
	function truss_mobile_styles() {
		$value = get_theme_mod( 'truss_mobile_hide_arrow' );

		 if( get_theme_mod( 'truss_mobile_hide_arrow' ) == 0 ) { ?>
			<style>
				.menu-button i.navicon {
					display: none;
				}
			</style>
		<?php  } else {

		 }
	}
	add_action('wp_head', 'truss_mobile_styles' );
endif;

add_action( 'tha_head_bottom', 'truss_add_selectivizr' );
function truss_add_selectivizr() { ?>
	<!--[if (gte IE 6)&(lte IE 8)]>
  		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/selectivizr/selectivizr-min.js"></script>
  		<noscript><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" /></noscript>
	<![endif]-->
<?php }
