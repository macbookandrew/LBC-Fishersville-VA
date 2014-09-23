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

// replace default header style with customized
function lbc_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="twentythirteen-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 1600px auto;
		}
		@media (max-width: 767px) {
			.site-header {
				background-size: cover;
			}
		}
		@media (max-width: 359px) {
			.site-header {
				background-size: cover;
			}
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

/**
 * Style the header image displayed on the Appearance > Header admin panel.
 *
 * @since Twenty Thirteen 1.0
 */
function lbc_admin_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="twentythirteen-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 1600px auto;
		}
		@media (max-width: 767px) {
			.site-header {
				background-size: cover;
			}
		}
		@media (max-width: 359px) {
			.site-header {
				background-size: cover;
			}
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
// replace parent theme function
function lbc_custom_header_setup() {
	// $args in add_theme_support() in child theme will auto override what defined in parent's
	// see http://core.trac.wordpress.org/browser/tags/3.5/wp-includes/theme.php#L1292
	$args = array(
        'wp-head-callback'       => 'lbc_header_style',
	);
	add_theme_support( 'custom-header', $args );
}
// add it the same way Twenty Thirteen does
add_action( 'after_setup_theme', 'lbc_custom_header_setup' );
