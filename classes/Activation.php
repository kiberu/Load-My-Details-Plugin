<?php
/**
 * Functionality that runs on activation of the plugin
 * @author Sharif Kiberu <kiberusharif@gmail.com>
 * 
 */

if ( ! class_exists( 'LMD_Activation' ) ) {

    /**
     * Holds functionality that should run immediately when the plugin is activated
     * @version 1.0.0
     */
    class LMD_Activation {

        /**
         * Class constructor
         * Includes required files upon instatiation
         */
        public function __construct() {
            $this->includes();
        }

        /**
         * Add notification if woocommerce is not installed and activated
         *
         * @return void
         */
        public function check_if_woocommerce_installed() {
            if ( ! class_exists( 'WooCommerce' ) ) {
                $notifications = new LMD_Notifications();
                add_action( 'admin_notices', array( $notifications, 'the_woocommerce_is_required_notice' ) );
            } 
        }

        /**
         * Calls the required files that hold the notification templates
         *
         * @return void
         */
        public function includes() {
            require_once( LMD_PATH . 'classes/Notifications.php' );
        }
    }    
} 
