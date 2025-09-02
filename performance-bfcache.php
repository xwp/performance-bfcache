<?php
/**
 * Plugin Name: Performance BFCache
 * Plugin URI: https://github.com/xwp/performance-bfcache
 * Description: Disables support for unload by setting the permissions-policy header.
 * Version: 1.0
 * Author: XWP
 * Author URI: https://xwp.co
 * License: GPLv2+
 * Text Domain: performance-bfcache
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Initialize the plugin.
 */
function performance_bfcache_init() {

	// Sets the permissions-policy response header to block the unload event from being added.
	require_once plugin_dir_path( __FILE__ ) . 'includes/permissions-policy.php';
}
add_action( 'plugins_loaded', 'performance_bfcache_init' );
