<?php
/**
 * how to use child textdomain:
 * 1. declare textdomain in function.php
 * 2. In Localization- choose the right parh for the child textdomain directory
 * 3. In Localization- sync files with main theme
 */

/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function my_child_theme_setup() {
	load_child_theme_textdomain( 'my-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );
?>