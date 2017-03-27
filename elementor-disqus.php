<?php
/**
 * Plugin Name: Elementor Disqus Widget
 * Description: Elementor widget to show disqus on your pages.
 * Plugin URI:  https://www.powertic.com.br/
 * Version:     0.2.0
 * Author:      Powertic
 * Author URI:  https://www.powertic.com/br/
 * Text Domain: elementor-disqus
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function elementor_disqus_load() {
	// Load localization file
	load_plugin_textdomain( 'elementor-disqus' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'elementor_disqus_fail_load' );
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'elementor_disqus_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'elementor_disqus_load' );


add_action( 'elementor/init',[ $this, 'elementor_loaded']);

function elementor_loaded(){
\Elementor\Plugin::instance()->elements_manager->add_category(
'powertic-elements',
[
'title' => 'Powertic',
'icon' => 'fa fa-plug'
],
1
);
}


/////////// PLUGIN UPDATE CHECKER ***********************
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/powerticmkt/elementor-disqus-widget/',
    __FILE__,
    'elementor-disqus'
);
$myUpdateChecker->setBranch('master');
/////////// **********************************************
