<?php
/**
 * Plugin Name: Testowanie WordPressa
 * Version: 0.0.1
 *
 * @package TestingWordPress
 * @since 0.0.1
 */

namespace TestingWordPress;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin directories constants
 */
define( 'TW_PLUGIN_FILE', __FILE__ );
define( 'TW_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'TW_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );

global $testing_wordpress;

/**
 * Autoload classes
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Initialize plugin
 */
$testing_wordpress = Plugin::get_instance();

/**
 * Register plugin activation hook
 */
register_activation_hook(
	TW_PLUGIN_FILE,
	array(
		$testing_wordpress,
		'on_plugin_activation',
	)
);

/**
 * Register plugin deactivation hook
 */
register_deactivation_hook(
	TW_PLUGIN_FILE,
	array(
		$testing_wordpress,
		'on_plugin_deactivation',
	)
);
