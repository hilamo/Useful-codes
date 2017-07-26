<?php
// remove locale stylesheet (i.e rtl.css), and load it later by myself
function remove_locale_stylesheet() {
    remove_action( 'wp_head', 'locale_stylesheet' );
}
add_action( 'init', 'remove_locale_stylesheet' );
