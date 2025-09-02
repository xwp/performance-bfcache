<?php
/**
 * Permissions Policy updates to increase support for BFCACHE.
 *
 * @package performance-bfcache
 */

/**
 * Add Permissions-Policy header to block unload events for anonymous users.
 *
 * This header is only added when the admin bar is not present, like for visitors,
 * to improve BFCACHE compatibility without impacting admin functionality.
 */
function performance_bfcache_add_permissions_policy_header() {
	// Only add the header if the admin bar is not showing (anonymous users)
	if ( ! is_admin_bar_showing() ) {
		header( 'Permissions-Policy: unload=()' );
	}
}

// Add the Permissions-Policy header for page requests.
add_action( 'wp_headers', 'performance_bfcache_add_permissions_policy_header' );
