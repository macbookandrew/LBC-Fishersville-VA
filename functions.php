<?php

include('functions-branding.php');
include('functions-church.php');

/* deregister Bitter and Open Sans webfonts, replace with EB Garamond and Open Sans */
function deregister_default_fonts() {
    wp_deregister_style( 'twentythirteen-fonts' );
    wp_register_style( 'lbc-webfonts', '//fonts.googleapis.com/css?family=EB+Garamond' );
    wp_enqueue_style( 'lbc-webfonts' );
}
add_action( 'wp_enqueue_scripts', 'deregister_default_fonts', 100 );
