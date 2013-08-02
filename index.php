<?php
/**
 * Bootstrap file for loading the config.php file and init the project.
 *
 * @package Notes
 */

// Check for right php version, that we can use namespace
$correct_php_version = version_compare( phpversion(), '5.3.0', '>=' );
if ( ! $correct_php_version ) {
	echo 'Notes requires <strong>PHP 5.3</strong> or higher.<br>';
	echo 'You are running PHP ' . phpversion();
	exit;
}

// Absolute path to Notes directory
if ( ! defined( 'N_ROOT' ) )
	define( 'N_ROOT', dirname( __FILE__ ) . '/' );

// Include the Core to init Notes
require_once 'lib/package/core.php';

// get function to save data
if ( isset( $_POST['content'] ) ) {
	$content = new \lib\package\Core();
	$content->w( $_POST['content'] );
}
