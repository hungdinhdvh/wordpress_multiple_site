<?php
/**
 * Plugin Name: AI WordPress Plugin (internal)
 * Plugin URI: https://ai.fun
 * Description: Internal WordPress plugin for AI
 * Version: 1.1.32
 * Author: AI
 * Author URI: https://ai.fun
 * Text Domain: ai-wordpress-plugin
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Plugin version
define('AI_WORDPRESS_PLUGIN_VERSION', '1.1.32');

/**
 * The code that runs during plugin activation.
 */
function activate_ai_wordpress_plugin() {
    // Activation code here
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_ai_wordpress_plugin() {
    // Deactivation code here
}

register_activation_hook(__FILE__, 'activate_ai_wordpress_plugin');
register_deactivation_hook(__FILE__, 'deactivate_ai_wordpress_plugin');

/**
 * Load the public-facing functionality
 */
require_once plugin_dir_path(__FILE__) . 'public/class-ai-wordpress-plugin-public.php';

/**
 * Initialize the plugin
 */
function run_ai_wordpress_plugin() {
    $plugin_public = new AI_WordPress_Plugin_Public('ai-wordpress-plugin', AI_WORDPRESS_PLUGIN_VERSION);
    
    // Register styles and scripts
    add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_styles'));
    add_action('wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts'));
}
add_action('plugins_loaded', 'run_ai_wordpress_plugin');
