<?php
/**
 * Plugin Name: Panolabo AI Boost
 * Plugin URI: https://panolabollc.com/
 * Description: 既存WordPress運用に「提案型事例」機能を追加。AI系プラグインを使った未来効果を提示する営業支援ツール。
 * Version: 1.0.0
 * Author: Panolabo LLC
 * Author URI: https://panolabollc.com/
 * Text Domain: panolabo-ai-boost
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * License: GPL v2 or later
 * Network: false
 */

// Security check
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('PAB_VERSION', '1.0.0');
define('PAB_PLUGIN_FILE', __FILE__);
define('PAB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PAB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('PAB_INC_DIR', PAB_PLUGIN_DIR . 'inc/');
define('PAB_ASSETS_URL', PAB_PLUGIN_URL . 'assets/');
define('PAB_TEMPLATES_DIR', PAB_PLUGIN_DIR . 'templates/');

/**
 * Main Plugin Class
 */
class PanolaboAiBoost {
    
    /**
     * Instance of this class
     */
    private static $instance = null;
    
    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        add_action('plugins_loaded', array($this, 'pab_init'));
        register_activation_hook(__FILE__, array($this, 'pab_activate'));
        register_deactivation_hook(__FILE__, array($this, 'pab_deactivate'));
    }
    
    /**
     * Initialize plugin
     */
    public function pab_init() {
        // Load text domain
        load_plugin_textdomain('panolabo-ai-boost', false, dirname(plugin_basename(__FILE__)) . '/languages');
        
        // Include required files
        $this->pab_include_files();
        
        // Initialize components
        add_action('init', array($this, 'pab_init_components'));
    }
    
    /**
     * Include required files
     */
    private function pab_include_files() {
        require_once PAB_INC_DIR . 'cpt.php';
        require_once PAB_INC_DIR . 'meta-boxes.php';
        require_once PAB_INC_DIR . 'render.php';
        require_once PAB_INC_DIR . 'schema.php';
        require_once PAB_INC_DIR . 'assets.php';
        
        // Include sample data inserter for admin
        if (is_admin()) {
            require_once PAB_PLUGIN_DIR . 'insert-sample-data.php';
        }
    }
    
    /**
     * Initialize components
     */
    public function pab_init_components() {
        // Initialize CPT
        if (class_exists('PAB_CPT')) {
            new PAB_CPT();
        }
        
        // Initialize Meta Boxes
        if (class_exists('PAB_Meta_Boxes')) {
            new PAB_Meta_Boxes();
        }
        
        // Initialize Render
        if (class_exists('PAB_Render')) {
            new PAB_Render();
        }
        
        // Initialize Schema
        if (class_exists('PAB_Schema')) {
            new PAB_Schema();
        }
        
        // Initialize Assets
        if (class_exists('PAB_Assets')) {
            new PAB_Assets();
        }
    }
    
    /**
     * Activate plugin
     */
    public function pab_activate() {
        // Flush rewrite rules
        $this->pab_init_components();
        flush_rewrite_rules();
    }
    
    /**
     * Deactivate plugin
     */
    public function pab_deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
}

// Initialize plugin
PanolaboAiBoost::get_instance();

/**
 * Helper function to get plugin instance
 */
function pab_get_instance() {
    return PanolaboAiBoost::get_instance();
}