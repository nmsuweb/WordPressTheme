<?php


// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'NMSU', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'NMSU') . get_query_var('paged');
    }
} // end get_page_number


// Register widgetized areas
function theme_widgets_init() {
    // Area 1
    register_sidebar( array (
    'name' => 'Primary Widget Area',
    'id' => 'primary_widget_area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
 
    // Area 2
    register_sidebar( array (
    'name' => 'Secondary Widget Area',
    'id' => 'secondary_widget_area', 
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

	  register_sidebar( array (
    'name' => 'Footer Widget 1',
    'id' => 'footer_widget_1',
    'before_widget' => '<div class="footer-column widget-area">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array (
    'name' => 'Footer Widget 2',
    'id' => 'footer_widget_2',
    'before_widget' => '<div class="footer-column widget-area">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array (
    'name' => 'Footer Widget 3',
    'id' => 'footer_widget_3',
    'before_widget' => '<div class="footer-column widget-area">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array (
    'name' => 'Header Widget',
    'id' => 'header_widget',
    'before_widget' => '<div class="header-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
} // end theme_widgets_init
 
add_action( 'init', 'theme_widgets_init' );

$preset_widgets = array (
    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
    'secondary_widget_area'  => array( 'links', 'meta' )
);
if ( isset( $_GET['activated'] ) ) {
    update_option( 'sidebars_widgets', $preset_widgets );
}
// update_option( 'sidebars_widgets', NULL );

// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;
 
  $widgetcolums = wp_get_sidebars_widgets();
          
  if ($widgetcolums[$index]) return true;
   
    return false;
} // end is_sidebar_active


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Horizontal-Menu' ),
      'extra-menu' => __( 'Vertical-Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//Initialize the update checker.
require 'theme-updates/theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'nmsu_testing',
    'http://saem.nmsu.edu/theme_updates/updatefile.json'
);


//Theme options panel

function setup_theme_admin_menus() {
    add_submenu_page('themes.php',
        'Front Page Elements', 'Template Options', 'manage_options',
        'front-page-elements', 'theme_front_page_settings');
}
// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");

function theme_front_page_settings() {
    echo "Hello, world!";
}

?>
