<?php

function u3a_townsville_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
        
        //Add a class telling us if the sidebar is in use.
        if ( is_active_sidebar( 'sidebar-1 ') ) {
            $classes[] = 'has-sidebar';
        } else {
            $classes[] = 'no-sidebar';
        }

	return $classes;
}
add_filter( 'body_class', 'u3a_townsville_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function u3a_townsville_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'u3a_townsville_pingback_header' );
