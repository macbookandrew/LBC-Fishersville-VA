<?php

include('functions-branding.php');
include('functions-church.php');

/* deregister Bitter and Open Sans webfonts */
function deregister_default_fonts() {
    wp_deregister_style( 'twentythirteen-fonts' );
}
add_action( 'wp_enqueue_scripts', 'deregister_default_fonts', 100 );
