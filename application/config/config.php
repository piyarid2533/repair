<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['site_domain'] = 'localhost/repair/';
$config["site_name"] = "http://localhost/repair/index.php/";
$config['site_protocol'] = '';
$config['index_page'] = 'index.php';
$config['url_suffix'] = '';
$config['internal_cache'] = FALSE;
$config['internal_cache_path'] = APPPATH.'cache/';
$config['internal_cache_encrypt'] = FALSE;
$config['internal_cache_key'] = 'foobar-changeme';
$config['output_compression'] = FALSE;
$config['global_xss_filtering'] = TRUE;
$config['enable_hooks'] = FALSE;
$config['log_threshold'] = 1;
$config['log_directory'] = APPPATH.'logs';
$config['display_errors'] = TRUE;
$config['render_stats'] = TRUE;
$config['extension_prefix'] = 'MY_';

$config['modules'] = array
(
	// MODPATH.'auth',      // Authentication
	// MODPATH.'kodoc',     // Self-generating documentation
	// MODPATH.'gmaps',     // Google Maps integration
	// MODPATH.'archive',   // Archive utility
	// MODPATH.'payment',   // Online payments
	// MODPATH.'unit_test', // Unit testing
);
