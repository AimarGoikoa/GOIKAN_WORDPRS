<?php
/**
 * Plugin Name: YITH WooCommerce Product Gallery & Image Zoom
 * Plugin URI: https://yithemes.com/themes/plugins/yith-woocommerce-zoom-magnifier/
 * Description: <code><strong>YITH WooCommerce Product Gallery & Image Zoom</strong></code> allows you to add a zoom effect to product images and a thumbnail slider for the product image gallery. <a href="https://yithemes.com/" target="_blank">Get more plugins for your e-commerce shop on <strong>YITH</strong></a>.
 * Version: 2.39.0
 * Author: YITH
 * Author URI: https://yithemes.com/
 * Text Domain: yith-woocommerce-zoom-magnifier
 * Domain Path: /languages/
 * WC requires at least: 9.5
 * WC tested up to: 9.7
 * Requires Plugins: woocommerce
 * 
 * @author YITH <plugins@yithemes.com>
 **/

/*  Copyright 2015-2025 Your Inspiration Themes S.L.U. (email : plugins@yithemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined ( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
    if ( ! function_exists( 'get_plugin_data' ) ) {
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
}

if ( ! function_exists ( 'yith_ywzm_install_woocommerce_admin_notice' ) ) {
    /**
     * WooCommerce is not enabled, the plugin will not be effective
     *
     * @since  1.0.0
     */
    function yith_ywzm_install_woocommerce_admin_notice () {
        ?>
        <div class="error">
            <p><?php _e ( 'YITH WooCommerce Product Gallery & Image Zoom is enabled but not effective. It requires WooCommerce in order to work.', 'yith-woocommerce-zoom-magnifier' ); ?></p>
        </div>
        <?php
    }
}

if ( ! function_exists ( 'yith_ywzm_install_free_admin_notice' ) ) {
    /**
     * Unable to activate the free version while the premium version is active
     *
     * @since  1.0.0
     */
    function yith_ywzm_install_free_admin_notice () {
        ?>
        <div class="error">
            <p><?php _e ( 'You can\'t activate the free version of YITH WooCommerce Product Gallery & Image Zoom while you are using the premium one.', 'yith-woocommerce-zoom-magnifier' ); ?></p>
        </div>
        <?php
    }
}

if ( ! function_exists ( 'yith_plugin_registration_hook' ) ) {
    require_once 'plugin-fw/yit-plugin-registration-hook.php';
}

register_activation_hook ( __FILE__, 'yith_plugin_registration_hook' );

defined( 'YITH_YWZM_FREE' ) || define( 'YITH_YWZM_FREE', '1' );
defined ( 'YITH_YWZM_FREE_INIT' ) || define ( 'YITH_YWZM_FREE_INIT', plugin_basename ( __FILE__ ) );
defined ( 'YITH_YWZM_SLUG' ) || define ( 'YITH_YWZM_SLUG', 'yith-woocommerce-zoom-magnifier' );
defined ( 'YITH_YWZM_VERSION' ) || define ( 'YITH_YWZM_VERSION', '2.39.0' );
defined ( 'YITH_YWZM_SCRIPT_VERSION' ) || define ( 'YITH_YWZM_SCRIPT_VERSION', '2.1.1' );

defined ( 'YITH_YWZM_FILE' ) || define ( 'YITH_YWZM_FILE', __FILE__ );
defined ( 'YITH_YWZM_DIR' ) || define ( 'YITH_YWZM_DIR', plugin_dir_path ( __FILE__ ) );
defined ( 'YITH_YWZM_URL' ) || define ( 'YITH_YWZM_URL', plugins_url ( '/', __FILE__ ) );
defined ( 'YITH_YWZM_ASSETS_URL' ) || define ( 'YITH_YWZM_ASSETS_URL', YITH_YWZM_URL . 'assets' );
defined ( 'YITH_YWZM_TEMPLATE_DIR' ) || define ( 'YITH_YWZM_TEMPLATE_DIR', YITH_YWZM_DIR . 'templates' );
defined ( 'YITH_YWZM_ASSETS_IMAGES_URL' ) || define ( 'YITH_YWZM_ASSETS_IMAGES_URL', YITH_YWZM_ASSETS_URL . '/images/' );
defined ( 'YITH_YWZM_LIB_DIR' ) || define ( 'YITH_YWZM_LIB_DIR', YITH_YWZM_DIR . 'lib/' );

// Plugin Framework Loader.
if ( file_exists( plugin_dir_path( __FILE__ ) . 'plugin-fw/init.php' ) ) {
    require_once plugin_dir_path( __FILE__ ) . 'plugin-fw/init.php';
}   

if ( ! function_exists ( 'yith_ywzm_init' ) ) {
    /**
     * Init the plugin
     *
     * @since  1.0.0
     */
    function yith_ywzm_init () {

        /**
         * Load text domain and start plugin
         */
        if ( function_exists( 'yith_plugin_fw_load_plugin_textdomain' ) ) {
            yith_plugin_fw_load_plugin_textdomain( 'yith-woocommerce-zoom-magnifier', basename( dirname( __FILE__ ) ) . '/languages' );
        }

        add_option ( 'yith_wcmg_slider_direction', apply_filters ( 'yith_wcmg_slider_direction', 'left' ) );

        define ( 'YITH_WCMG', true );
        define ( 'YITH_WCMG_URL', plugin_dir_url ( __FILE__ ) );

        // Load required classes and functions
        require_once ( YITH_YWZM_LIB_DIR . 'class.yith-wcmg-admin.php' );
        require_once ( YITH_YWZM_LIB_DIR . 'class.yith-wcmg-frontend.php' );
        require_once ( YITH_YWZM_LIB_DIR . 'class.yith-woocommerce-zoom-magnifier.php' );
        require_once ( YITH_YWZM_LIB_DIR . 'class.yith-ywzm-plugin-fw-loader.php' );
        require_once ( YITH_YWZM_LIB_DIR . 'functions.yith-ywzm.php' );

        YITH_YWZM_Plugin_FW_Loader::get_instance ();

        // Let's start the game!
        global $yith_wcmg;

        $yith_wcmg = new YITH_WooCommerce_Zoom_Magnifier();
    }
}
add_action ( 'yith_ywzm_init', 'yith_ywzm_init' );

if ( ! function_exists ( 'yith_ywzm_install' ) ) {
    /**
     * install the plugin
     *
     * @since  1.0.0
     */
    function yith_ywzm_install () {

        if ( ! function_exists ( 'WC' ) ) {
            add_action ( 'admin_notices', 'yith_ywzm_install_woocommerce_admin_notice' );
        } elseif ( defined ( 'YITH_YWZM_PREMIUM' ) ) {
            add_action ( 'admin_notices', 'yith_ywzm_install_free_admin_notice' );
            deactivate_plugins ( plugin_basename ( __FILE__ ) );
        } else {
            do_action ( 'yith_ywzm_init' );
        }

    }
}

add_action ( 'plugins_loaded', 'yith_ywzm_install', 11 );
